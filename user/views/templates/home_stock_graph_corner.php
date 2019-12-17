<?php
	    $API_KEY = "LBI8NKNNNBU35N9H";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=DJI&apikey=". $API_KEY));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		$result = json_decode($server_output,true);

		$d1 = $result['Time Series (Daily)'];
		$dates = array('2019-11-13','2019-11-12','2019-11-11','2019-11-08','2019-11-07','2019-11-06','2019-11-05','2019-11-04','2019-11-01');

?>
<!DOCTYPE HTML>

<html>
<head>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Company Avg.Volume by Year"
	},
	axisY: {
		title: "Volume in Cr ",
		valueFormatString: "#0,,.",
		suffix: "Cr",
		prefix: ""
	},

	data: [{
		type: "splineArea",
		color: "rgba(54,158,173,.7)",
		markerSize: 12,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0##",
		dataPoints: [

			{ x: new Date(2011,0), y: <?php echo $d1[$dates[0]]['5. volume']?> },
			{ x: new Date(2012,0), y: <?php echo $d1[$dates[1]]['5. volume']?> },
			{ x: new Date(2013,0), y: <?php echo $d1[$dates[2]]['5. volume']?> },
			{ x: new Date(2014,0), y: <?php echo $d1[$dates[3]]['5. volume']?> },
			{ x: new Date(2015,0), y: <?php echo $d1[$dates[4]]['5. volume']?> },
			{ x: new Date(2016,0), y: <?php echo $d1[$dates[5]]['5. volume']?> },
			{ x: new Date(2017,0), y: <?php echo $d1[$dates[6]]['5. volume']?> },
			{ x: new Date(2018,0), y: <?php echo $d1[$dates[7]]['5. volume']?> },
			{ x: new Date(2019,0), y: <?php echo $d1[$dates[8]]['5. volume']?> }

		]

	}]
	});
chart.render();

}
</script>
</head>
<body>

<div id="chartContainer" style="height: 300px; width: 40%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
