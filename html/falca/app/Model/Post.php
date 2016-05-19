<?php

class Post extends AppModel {
    public $validate = array(
        'name' => array(
            array('rule' => 'notEmpty', 'message' => '名前を入力してください。'),
            array(
                'rule' => array('maxLength', 255),
                'message' => '名前は255文字以内で入力してください。',
            ),
        ),
        'title' => array(
            array('rule' => 'notEmpty', 'message' => 'タイトルを入力してください。'),
            array(
                'rule' => array('maxLength', 255),
                'message' => 'タイトルは255文字以内で入力してください。',
            ),
        ),
        'body' => array(
            array('rule' => 'notEmpty', 'message' => '本文を入力してください。'),
        ),
        'password' => array(
            array('rule' => 'notEmpty', 'message' => 'パスワードを入力してください。'),
            array('rule' => 'alphaNumeric', 'message' => 'パスワードは半角英数字で入力してください。'),
            array(
                'rule' => array('maxLength', 32),
                'message' => 'パスワードは32文字以内で入力してください。',
            ),
        ),
    );

    public function beforeSave($options = array()) {
        if (empty($this->data['Post']['id'])) {
            Configure::load('hash', 'default');
            $this->data['Post']['password'] = hash_hmac('sha256', $this->data['Post']['password'], Configure::read('Hash.salt'));
        }
        return true;
    }
}
