<?php
$user = AuthComponent::user('id');
?>

レッスンを追加する<br />
<br />
<form method="post" action="http://liveself.me/search/item-make.php">
タイトル<br />
<input type="text" name="title" style="width:200px"><br />
<br />
内容<br />
<input type="text" name="content" style="width:200px"><br />
<br />
価格<br />
<input type="text" name="price" style="width:200px"><br />
<br />
目的<br />
<select name="purpose">
<option value="weight">痩せたい</option> <option value="train">鍛えたい</option> <option value="stress">ストレス発散したい</option> <option value="exercise">健康を維持したい</option><br />
</select>
<br />
参加上限数<br />
<input type="text" name="limit" style="width:200px"><br />
<br />
住所<br />
<input type="text" name="adress" style="width:200px"><br />
<br />
<input type="hidden" name="whom" value="<?php echo $user ?>"><br />
<br />
<input type="submit" value="作成">
</form>