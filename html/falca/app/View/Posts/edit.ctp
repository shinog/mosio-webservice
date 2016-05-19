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
			'id' => 'form',
			'inputDefaults' => array(
				'label' => array('class' => 'label bold'),
				'div' => array('class' => 'field'),
			),
		));
    		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('name', array('class' => 'text'));
		echo $this->Form->input('title', array('class' => 'text'));
		echo $this->Form->input('body', array('class' => 'textarea', 'rows' => '20', 'label' => false));
	?>
		<div>
			<p>投稿する際に入力したパスワードを入れてボタンをクリックしてください。</p>
			<div class="field-submit clearfix">
				<span class="passfont">pass</span>
				<?php
					echo $this->Form->password('edit_password', array('label' => false, 'div' => false));
					echo $this->Form->submit('編集する', array(
						'div' => false,
						'class' => 'button middle blue',
						'style' => 'float:right;'
					));
				?>
			</div>
		</div>
	<?php echo $this->Form->end(); ?>
</header>
