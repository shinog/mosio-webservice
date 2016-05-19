<header>
	<h1>
		<?php echo $this->Html->link('SAMPLE BBS',
			array('controller' => 'posts', 'action' => 'index')); ?>
	</h1>

	<?php if (isset($errors)) {
		echo '<section class="message pink"><p>Error.</p><ul>';
		foreach ($errors as $error) {
			echo '<li>'.$error.'</li>';
		}
		echo '</ul></section>';
	} ?>

	<?php
		echo $this->Form->create('Post', array(
			'action' => 'add',
			'id' => 'form',
			'inputDefaults' => array(
				'label' => array('class' => 'label bold'),
				'div' => array('class' => 'field'),
				'error' => false,
			),
		));
		echo $this->Form->input('name', array('class' => 'text'));
		echo $this->Form->input('title', array('class' => 'text'));
		echo $this->Form->input('body', array('class' => 'textarea', 'rows' => '20', 'label' => false));
	?>
		<div>
			<p>パスワードは編集と削除の際に使用しますので必ず入力してください。</p>
			<div class="field-submit clearfix">
				<span class="passfont">pass</span>
				<?php
					echo $this->Form->input('password', array('label' => false, 'div' => false));
					echo $this->Form->submit('投稿する', array(
						'div' => false,
						'class' => 'button middle blue',
						'style' => 'float:right;'
					));
				?>
			</div>
		</div>
	<?php echo $this->Form->end(); ?>
</header>

<?php foreach ($posts as $post): ?>
<article>
	<section>
		<h2><?php echo Sanitize::html($post['Post']['title']); ?></h2>
		<p class="author">
			<span class="bold"><?php echo Sanitize::html($post['Post']['name']); ?></span>&nbsp;&nbsp;&nbsp;
			<time><?php echo $post['Post']['created']; ?></time>
		</p>
		<p><?php echo nl2br(Sanitize::html($post['Post']['body'])) ?></p>
		<p class="tools">
			<?php echo $this->Html->link('Edit',
				array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']),
				array('class' => 'button blue small')); ?>
			<?php echo $this->Html->link('Delete',
				array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']),
				array('class' => 'button pink small')); ?>
		</p>
	</section>
</article>
<?php endforeach; ?>
<?php unset($post); ?>
