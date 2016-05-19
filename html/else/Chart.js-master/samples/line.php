<!doctype html>
<html>
	<head>
		<title>Line Chart</title>
		<script src="../Chart.js"></script>
	</head>
	<body>
		<div style="width:80%">
			<div>
				<canvas id="canvas" height="150" width="600"></canvas>
			</div>
		</div>

<?php
$today = date("m月d日");
$yesterday = date("m月d日", strtotime('-1 day'));
$three = date("m月d日", strtotime('-2 day'));
$four = date("m月d日", strtotime('-3 day'));
$five = date("m月d日", strtotime('-4 day'));
$six = date("m月d日", strtotime('-5 day'));
$seven = date("m月d日", strtotime('-6 day'));
?>

	<script>
	var today = "<?php echo $today; ?>";
	var yesterday = "<?php echo $yesterday; ?>";
	var three = "<?php echo $three; ?>";
	var four = "<?php echo $four; ?>";
	var five = "<?php echo $five; ?>";
	var six = "<?php echo $six; ?>";
	var seven = "<?php echo $seven; ?>";
	
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : [seven,six,five,four,three,yesterday,today],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
	</body>
</html>
