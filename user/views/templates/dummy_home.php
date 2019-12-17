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
nav div ul li a{
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
nav div ul li a:hover{
	background-color: #fac239;
  color: #000;
  text-decoration: none;
}
.news {
     display: none;
}
.post {
  display: block;
}
</style>
<body>
	<nav class="navbar navbar-light bg-light">
	  <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: 'Big Shoulders Text', cursive;  font-weight: bold; color:#fff; font-size: 1rem; ">Stock Market </a>
	  <div class="title">
		<ul>
			<li><a href="?act=login">Log In</a></li>
			<li><a href="?act=signup">Sign Up</a></li>
		</ul>
	  </div>
	</nav>
  <div class="alert alert-success alert-dismissible" style="margin-top:30px;width:70%;margin-left:200px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
      }
			elseif (isset($_SESSION['no_login_message'])) {
				echo "<p style="."color:"."red". ">".$_SESSION['no_login_message']."</p>";
			}
			elseif (isset($_SESSION['message_not_login_admin_home'])) {
				echo "<p style="."color:"."red". ">".$_SESSION['message_not_login_admin_home']."</p>";
			}
      else {
        echo "<p style="."color:"."red". ">"."You are not logged in !!!"."</p>";
      }
      ?>
    </div>

	<aside style="background-color: #e1e1e3;">
		<div class="card" style="width: 22rem; float: right;">
		  <div id="chartContainer" class="card-img-top" style="height: 300px; width: 100%;"></div>
		  <div class="card-body">
		    <h5 class="card-title" style="font-family: 'ZCOOL XiaoWei', serif; text-transform: uppercase; font-weight: bold; font-size: 1.4rem; color:#6a3093; ">Market Action</h5>
		    <p class="card-text" style="font-size: 35px;">11,908.15<p style="color: #f00; font-size: 20px;">(-0.86%)</p></p>
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
							<tr>
								<th scope="row">Microsoft</th>
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
								<th scope="row">Alphabet Inc</th>
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
								<th scope="row">Facebook</th>
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

            </tbody>
          </table>
        </li>
		  </ul>
		</div>
	</aside>
	<main>
		<div class="card w-72 m-2" class="news" id="newsshow" style="height: 39vh;
  background: url('wt_project/user/views/media/website_images/news.png') /*no-repeat center center fixed*/;
  background-size: cover;
  overflow: hidden;
  filter: blur(8px);
 ">
		</div>
		 <div class="card-body" style="position: absolute;top: 25%;">
		    <h5 class="card-title" style="color: #fff;font-family: 'Jomolhari', serif;font-size: 34px;">Business News</h5>
		    <p class="card-text" style="color: #fff;font-family: 'Big Shoulders Text', cursive;font-size: 20px; background-color: #000; padding: 5px;">Get the latest stock news from the best news sources.</p>
		    <!--<button id="getpost" class="btn btn-outline" style="font-family: 'Oswald', sans-serif ;
  text-transform: uppercase; background-color: #fac239; ">Log In</button>--->

		  </div>
	<div class="post" id="postshow"></div>
	</main>
  <section style="margin-top: 20vh;margin-left:0vw;">
    <ul class="list-group list-group-horizontal-xl">
      <li class="list-group-item">
        <div class="card" style="width: 18rem;">
          <img src="wt_project/user/views/media/website_images/News.svg" class="card-img-top" style=" margin-top: 1rem; height:15vh; width:22vw;">
          <div class="card-body">
            <h3 style="font-family: 'Oswald', sans-serif;
  text-transform: uppercase;
  font-weight: bold;">News</h3>
            <p class="card-text">Content from reputable news sources such as: CNBC, Zacks, Bloomberg, ET and many more.</p>
          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card" style="width: 18rem;">
          <img src="wt_project/user/views/media/website_images/Analysis.svg" class="card-img-top" style=" margin-top: 1rem; height:15vh; width:22vw;">
          <div class="card-body">
            <h3 style="font-family: 'Oswald', sans-serif;
  text-transform: uppercase;
  font-weight: bold;">Stock Latest Price</h3>
            <p class="card-text">Realtime and historical data on stocks, forex (FX), and digital/crypto currencies.</p>
          </div>
        </div>
      </li>
      <li class="list-group-item">
        <div class="card" style="width: 18rem;">
          <img src="wt_project/user/views/media/website_images/Company.svg" class="card-img-top" style=" margin-top: 1rem; height:15vh; width:22vw;">
          <div class="card-body">
            <h3 style="font-family: 'Oswald', sans-serif;
  text-transform: uppercase;
  font-weight: bold;">Company Info</h3>
            <p class="card-text">Take the ambiguity out of the analysis! providing all finacial company data.</p>
          </div>
        </div>
      </li>
    </ul>
  </section>
	<footer style="margin-top:60px;">
		<div class="container">
			<p style="text-align: center; color: #fff; font-size: 1rem; padding-top: 0.2rem;">&copy; 2019 StockMarketJunkies.com<p>
		</div>
	</footer>
  <script>
  /*  var portfolioDiv = document.getElementById('newsshow');
    var resultsDiv = document.getElementById('postshow');

    var portfolioBtn = document.getElementById('getpost');


    portfolioBtn.onclick = function() {
        resultsDiv.setAttribute('class', 'news');
        portfolioDiv.setAttribute('class', 'post');
    };*/
    window.onload = function () {

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title:{
      text: "Nifty 50"
    },
    axisY: {
      title: "Stock Price",
      valueFormatString: "#0,,."

    },
    data: [{
      type: "splineArea",
      color: "rgba(54,158,173,.7)",
      markerSize: 5,
      xValueFormatString: "YYYY",
      yValueFormatString: "#,##0",
      dataPoints: [
        { x: new Date(2000, 0), y: 3289 },
        { x: new Date(2001, 0),  y :2563},
        { x: new Date(2002, 0), y: 2009 },
        { x: new Date(2003, 0), y: 2840 },
        { x: new Date(2004, 0), y: 2396 },
        { x: new Date(2005, 0), y: 1613 },
        { x: new Date(2006, 0), y: 2821 },
        { x: new Date(2007, 0), y: 2000 },
        { x: new Date(2008, 0), y: 1397 },
        { x: new Date(2009, 0), y: 2506 },
        { x: new Date(2010, 0), y: 2798 },
        { x: new Date(2011, 0), y: 3386 },
        { x: new Date(2012, 0), y: 6704},
        { x: new Date(2013, 0), y: 6026 },
        { x: new Date(2014, 0), y: 2394 },
        { x: new Date(2015, 0), y: 1872 },
        { x: new Date(2016, 0), y: 2140 }
      ]
    }]
    });
  chart.render();

};


  </script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
