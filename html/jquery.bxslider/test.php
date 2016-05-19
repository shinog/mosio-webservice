<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>mosio</title>

<link href="http://liveself.me/raty-2.7.0/demo/stylesheets/labs.css" media="screen" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://liveself.me/raty-2.7.0/lib/jquery.raty.css">
<script src="http://liveself.me/raty-2.7.0/vendor/jquery.js"></script><script src="http://liveself.me/raty-2.7.0/lib/jquery.raty.js"></script>
<script src="http://liveself.me/raty-2.7.0/demo/javascripts/labs.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
$('#star').raty( {
readOnly: true,   //閲覧者によるスコアの変更不可
score: function() {
return $(this).attr('data-score');
},
.fn.raty.defaults.path:  'http://liveself.me/raty-2.7.0/lib/images' //サーバ上のRaty画像のパス
});
});
</script>

</head>
<body>

<?php 
$fun = 4;
?>

<div id="star" data-score="<?php echo $fun; ?>"></div>

</body>
</html>