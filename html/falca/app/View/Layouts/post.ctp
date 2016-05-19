<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>SAMPLE BBS</title>
	<?php
		echo $this->Html->css('application');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<!--[if IE]><?php echo $this->Html->script('html5'); ?><![endif]-->

</head>
<body>
	<?php echo $this->fetch('content'); ?>

	<footer>
		<a href="http://heteml.jp" alt="レンタルサーバーヘテムル" target="_blank">
			<span style="vertical-align:middle;">Hosted by</span>&nbsp;&nbsp;
			<?php echo $this->Html->image('logo.gif', array('alt' => 'レンタルサーバーへテムル', 'style' => 'vertical-align:middle;')); ?>
		</a>
	</footer>
</body>
</html>
