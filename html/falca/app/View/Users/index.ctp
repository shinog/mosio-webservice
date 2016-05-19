<h1>マイページ</h1>

<?php
$id = AuthComponent::user('id');
echo $id;

echo($this->Html->link('[ログアウト]', '/users/logout'));