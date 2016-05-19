<h2><?php echo h($user['User']['name']); ?></h2>

<p><img src="http://liveself.me/falca/app/webroot/files/user/photo/<?php echo h($user['User']['photo_dir']); ?>/<?php echo h($user['User']['photo']); ?>" alt="サンプル"></p>

<h4>性別</h4>
<p><?php echo h($user['User']['sex']); ?></p>

<h4>得意分野</h4>
<p><?php echo h($user['User']['merit']); ?></p>

<h4>経歴</h4>
<p><?php echo h($user['User']['career']); ?></p>


