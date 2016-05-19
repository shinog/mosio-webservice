function ajaxPostFunc(<?php echo $param1; ?>, <?php echo $param2; ?>){
	$.post("favorite-map.php", {input1:<?php echo $param1; ?>, input2:<?php echo $param2; ?>}, function(json){alert("パラメータを2つPOSTしました");});
}
