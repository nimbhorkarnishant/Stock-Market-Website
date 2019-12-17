
<!DOCTYPE html>
<html>
<head>
	<title>Stock Market</title>
	<meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Jomolhari|Oswald|ZCOOL+XiaoWei&display=swap" rel="stylesheet">
</head>
<style>
/*font-family: 'Jomolhari', serif;
font-family: 'Big Shoulders Text', cursive;
font-family: 'ZCOOL XiaoWei', serif;*/

	body{
	margin: 0;
	padding: 0;

}
nav{
	display: flex;
	background: #6a3093;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #6a3093, #6a3093);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #6a3093, #6a3093); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
footer{
  display: flex;
  background-color: #573d7a;

  position: fixed;
  height: 50px;
  bottom: 0px;
  left: 0px;
  right: 0px;
  margin-bottom: -19px;
}

nav .logo{
	margin-left: 1rem;
	font-family: 'Lobster', cursive;
	font-size: 3rem;
	position: absolute;
	top: -2rem;
	color: #fff;
}
nav div{

	height: 9vh;
	margin-top: -1rem;

}
footer div{
  height: 10vh;


}
nav div ul{
	margin-left: 53rem;
	padding-top: 1rem;
  margin-top: 0.7rem;

}
nav div ul li{
	display: inline;
	margin-left: 2rem;



}
nav div ul li #link{
	text-decoration: none;
	color: #fac239;
	font-size: 1rem;
	border:3px #fac239 solid;
	padding: 4px;
	border-radius: 10px;
	font-family: 'Oswald', sans-serif;
	text-transform: uppercase;
	font-weight: bold;
}
nav div ul li #link:hover{
	background-color: #fac239;
  color: #000;
  text-decoration: none;
}

</style>
<body>
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
  <?php
      $user_type='';
      if (isset($_SESSION['user_type']) and isset($_SESSION['user_id'])) {
        $user_type=$_SESSION['user_type'];
      }
      else {
        $user_type='';
      }
      if ($user_type=='user') {
        echo '<nav class="navbar navbar-light bg-light">
          <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: "Big Shoulders Text", cursive;  font-weight: bold; color:#FFF; font-size: 1rem; ">Stock Market Junkies</a>
          <div class="title">
          <ul>
            <li><a href=""><img src="wt_project/user/views/media/website_images/Profile.svg"></a></li>
            <li><a href="?act=logout" id="link">Logout</a></li>
          </ul>
          </div>
        </nav>';
        //echo $_SESSION['user_id'];
        //echo $_SESSION['message'];
      }
      elseif ($user_type=='admin') {
        echo '<nav class="navbar navbar-light bg-light">
      	  <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: "Big Shoulders Text", cursive;  font-weight: bold; color:#fff; font-size: 1rem; ">Stock Market Junkies</a>
      	  <div class="title">
      		<ul>
      			<li><a href="?act=admin_pannel" id="link">Admin </a></li>
      			<li><a href="?act=admin_pannel"><img src="wt_project/user/views/media/website_images/Profile.svg"></a></li>
            <li><a href="?act=logout" id="link">Logout</a></li>
          </ul>
      	  </div>
      	</nav>';
        //echo $_SESSION['user_id'];
        //echo $_SESSION['message'];

      }
      elseif ($user_type=='superadmin') {
        echo '<nav class="navbar navbar-light bg-light">
          <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: "Big Shoulders Text", cursive;  font-weight: bold; color:#fff; font-size: 1rem; ">Stock Market Junkies</a>
          <div class="title">
          <ul>
            <li><a href="?act=admin_pannel" id="link">Admin </a></li>
            <li><a href="?act=admin_pannel"><img src="wt_project/user/views/media/website_images/Profile.svg"></a></li>
            <li><a href="?act=logout" id="link">Logout</a></li>
          </ul>
          </div>
        </nav>';
      }
      /*else {
        echo '<a class="active" href="">Home</a>';
        echo '<a href="#about">About</a>';
        echo '<a  href="?act=login">Login</a>';
        echo '<a href="?act=signup">Sign up</a>';
        if (isset($_SESSION['message'])){
          echo $_SESSION['message'];
        }

      }*/
    ?>
		<?php
			if (isset($_SESSION['show_user_data_message'])) {
				echo'
				<div class="alert alert-success alert-dismissible" style="margin-top:30px;width:70%;margin-left:200px;">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
					echo $_SESSION['show_user_data_message'];
					echo '</div>';
	      }
			elseif (isset($_SESSION['favourite_add_message'])) {
				echo'
				<div class="alert alert-success alert-dismissible" style="margin-top:30px;width:70%;margin-left:200px;">
			      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
					echo $_SESSION['favourite_add_message'];
					echo '</div>';
			}
			?>
			<?php require 'wt_project/user/views/templates/search_stock.php' ?>
	<section class="container-fluid">
		<div class="row">
			<div id="post" onload="getpost()" class="col-md-8"></div>

		<aside class="col-md-4">
		<div  class="card" style="width: 21rem; float: right;">
		  <div id="chartContainer" class="card-img-top" style="height: 300px; width: 100%;">
			</div>
		  <div class="card-body">
		    <h5 class="card-title" style="font-family: 'ZCOOL XiaoWei', serif; text-transform: uppercase; font-weight: bold; font-size: 1.4rem; color:#6a3093; ">Market Action</h5>
		    <p class="card-text" style="font-size: 35px;"><?php echo $d1[$dates[0]]['2. high']?><p style="color: #f00; font-size: 20px;">(-0.86%)</p></p>
		  </div>
		  <ul class="list-group list-group-flush">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Company Name</th>
                <th scope="col">Price</th>
                <th scope="col">Change</th>
              </tr>
            </thead>
            <tbody>
							<?php
							if ($result_new->num_rows > 0) {
								while($row = $result_new->fetch_assoc()) {
									//echo $row["company_name"];
									//echo $row["company_code"];
								echo '<tr>
											<th scope="row">';
								echo '<a href='.'/?act=show_company_detail&code='.$row["company_code"].'>'.$row["company_name"].'</a>
											</th>';
											$API_KEY = "LBI8NKNNNBU35N9H";
											$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL,("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=".$row['company_code'].'&apikey='. $API_KEY));
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
											$server_output_msft = curl_exec ($ch);
											curl_close ($ch);
											$result_msft = json_decode($server_output_msft,true);
											$index='Global Quote';
											$d_msft = $result_msft[$index];

											echo  "<td>". $d_msft['03. high']."</td>
										 <td style='color: #f00';>". $d_msft['10. change percent']."</td>";

									echo '</tr>';

								}
							}
						?>
								<tr>
	                <th scope="row"><a href="?act=show_company_detail&code=MSFT">Microsoft</a></th>
									<?php
										$API_KEY = "LBI8NKNNNBU35N9H";
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_URL,("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=MSFT&apikey=". $API_KEY));
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										$server_output_msft = curl_exec ($ch);
										curl_close ($ch);
										$result_msft = json_decode($server_output_msft,true);
										$index='Global Quote';
		                $d_msft = $result_msft[$index];
		                echo  "<td>". $d_msft['03. high']."</td>
		                <td style='color: #f00';>". $d_msft['10. change percent']."</td>";
		                ?>
	              </tr>
	              <tr>
	                <th scope="row"><a href="?act=show_company_detail&code=GOOGL">Alphabet Inc</a></th>
									<?php
										$API_KEY = "LBI8NKNNNBU35N9H";
										$ch1 = curl_init();
										curl_setopt($ch1, CURLOPT_URL,("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=GOOGL&apikey=".$API_KEY));
										curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
										$server_output_googl = curl_exec ($ch1);
										curl_close ($ch1);
										$result_googl = json_decode($server_output_googl,true);
										$index='Global Quote';
 									  $d_googl = $result_googl[$index];
 									  echo  "<td>". $d_googl['03. high']."</td>
 									  <td style='color: #f00';>". $d_googl['10. change percent']."</td>";
									?>
	              </tr>
	              <tr>
	                <th scope="row"><a href="?act=show_company_detail&code=FB">Facebook</a></th>
	                <?php
									$API_KEY = "LBI8NKNNNBU35N9H";

									$ch2 = curl_init();
									curl_setopt($ch2, CURLOPT_URL,("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=FB&apikey=". $API_KEY));
									 curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
									$server_output_fb = curl_exec ($ch2);
									curl_close ($ch2);
									$result_fb = json_decode($server_output_fb,true);
									$index='Global Quote';
									$d_fb = $result_fb[$index];
									echo  "<td>". $d_fb['03. high']."</td>
									<td style='color: #f00';>". $d_fb['10. change percent']."</td>";
									?>

	              </tr>
	             <!-- <tr>
	                <th scope="row"><a href="?act=show_company_detail&code=AAPL">Apple Inc</a></th>
	                <?php
								/*	$API_KEY = "LBI8NKNNNBU35N9H";
									$ch3 = curl_init();
	                curl_setopt($ch3, CURLOPT_URL,("https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=AAPL&interval=5min&apikey=". $API_KEY));
	                 curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
	                $server_output_appl = curl_exec ($ch3);
	                curl_close ($ch3);
	                $result_appl = json_decode($server_output_appl,true);
									$index='Time Series (5min)';
									$d_appl = $result_appl[$index];
	                $d4 = $d_appl['2019-11-19 16:00:00'];
	                $re3=($d4['2. high']-$d4['3. low'])/100 ;
	                echo  "<td>". $d4['4. close']."</td>
	                <td style='color: #f00';>".number_format((float)$re3, 4, '.', '')."</td>";*/
									 ?>
	              </tr>-->
							</tbody>
          </table>
        </li>
		  </ul>
		</div>
	</aside>
		</div>


	</section>



	<footer style="margin-top:30px;">
		<div class="container">
			<p style="text-align: center; color: #fff; font-size: 1rem; padding-top: 0.2rem;">&copy; 2019 StockMarketJunkies.com<p>
		</div>
	</footer>
	<script type="text/javascript" src="wt_project/user/views/media/js/main.js"></script>


  <script>

  function getchart () {

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
  <script type="text/javascript" src="wt_project/user/views/media/js/main.js"></script>

  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
