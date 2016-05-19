<?php

App::uses('Sanitize', 'Utility');
App::uses('ConnectionManager', 'Model');

class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $layout = 'post';
	public $sql = <<<EOT
CREATE TABLE IF NOT EXISTS posts (
  id int(10) unsigned NOT NULL auto_increment,
  name varchar(255) NOT NULL,
  title varchar(255) NOT NULL,
  body text NOT NULL,
  password varchar(255) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
EOT;

	public function index() {
		$db = ConnectionManager::getDataSource('default');
		$db->rawQuery($this->sql);

		$this->set('posts', $this->Post->find('all', array(
			'order' => array('Post.id DESC'),
		)));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('投稿が完了しました。', 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$errors = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->Post->validationErrors));
			}
		}

		$this->set('posts', $this->Post->find('all', array(
			'order' => array('Post.id DESC'),
		)));
		$this->set('errors', (isset($errors)) ? $errors : null);
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Post->id = $id;
			if ($this->_checkPassword($post, $this->request->data['Post']['edit_password'])) {
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash('編集が完了しました。', 'flash_success');
					$this->redirect(array('action' => 'index'));
				} else {
					$errors = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->Post->validationErrors));
				}
			} else {
				$errors = array('パスワードが違います。');
			}
		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}
		$this->set('errors', (isset($errors)) ? $errors : null);
	}

	public function delete($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}

		if ($this->request->is('post') || $this->request->is('delete')) {
			if ($this->_checkPassword($post, $this->request->data['Post']['delete_password']) && $this->Post->delete($id)) {
				$this->Session->setFlash('削除が完了しました。', 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('パスワードが違います。', 'flash_error');
			}
		}

		$this->request->data = $post;
	}

	protected function _checkPassword($post, $password) {
		Configure::load('hash', 'default');
		return $post['Post']['password'] ==  hash_hmac('sha256', $password, Configure::read('Hash.salt'));
	}
}
