<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" src="./jquery-1.7.2.min.js"></script>
		
		<script type="text/javascript" src="./ex.js"></script>

<link href="./test.css" rel="stylesheet">


		<title>mosio-test</title>
	</head>
	
	<body>

<?php
$param1= 10;
$param2= 35;
?>

<script type="text/javascript">
function ajaxPostFunc($param1, $param2){
	$.post("http://www.mosio.me/else/favorite-map.php", {input1:$param1, input2:$param2}, function(json){alert("パラメータを2つPOSTしました");});
}

</script>


<a class="button-fav" onClick="ajaxPostFunc('<?php echo $param1; ?>', '<?php echo $param2; ?>');">favorite</a>

		<form>
			<INPUT type="button" value="submit" onClick="ajaxPostFunc('<?php echo $param1; ?>', '<?php echo $param2; ?>');">
		</form>

<div id="button-fav">
<div>
	<p><a class="button-fav" onClick="ajaxPostFunc('<?php echo $param1; ?>', '<?php echo $param2; ?>');"><img src="http://shinog.heteml.jp/liveself.me/design/common/img/heart-before.png" alt="????" ></a></p>
</div>
</div>

<p class="img-fav"><a class="button-fav" onClick="ajaxPostFunc('<?php echo $param1; ?>', '<?php echo $param2; ?>');"><img src="http://shinog.heteml.jp/liveself.me/design/common/img/heart-before.png" alt="????" ></a></p>

	</body>
</html>