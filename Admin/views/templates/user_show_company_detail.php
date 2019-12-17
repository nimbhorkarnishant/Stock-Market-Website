<!DOCTYPE html>
<html>
<head>
	<title>Stock Market</title>
	<link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Jomolhari|ZCOOL+XiaoWei&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="wt_project/Admin/views/media/css/user_show_company_detail.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div class="bgimg" style="background-image: url(wt_project/user/views/media/website_images/bg.jpg);">
		<nav class="navbar navbar-expand-md navbar-dark navbar-custom p-0">
			<div class="container">
				<a href="" class="navbar-brand text-light">STOCK MARKET</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="collapsenavbar">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a href="?act=home" class="nav-link text-white">Visit website</a>
						</li>
						<li class="nav-item">
							<a  class="nav-link text-white" href="?act=logout">Logout</a>
						</li>
						<li class="nav-item">
	            <i class="fa fa-user" aria-hidden="true">
	              <a href="" class="nav-link text-white"><?php echo $_SESSION['user_type'] ?></a>
	            </i>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="box">
		<div class="container text-center text-white headerset">
			<h2><?php echo $view_company_detail[1]?></h2>
			<h1></h1>
		</div>
	</div>
	<div class="container-fluid">
	<div class="card">
		<div class="card-body1 text-center">
			<h1 class="card-title"><?php echo $view_company_detail[1] ?></h1>
  		</div>
  	</div>
  	</div>
  		<div class="card">
  			<div class="card-header">

  			</div>

				<?php
			  $API_KEY = "LBI8NKNNNBU35N9H";
			  $ch = curl_init();
			  curl_setopt($ch, CURLOPT_URL,('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$_SESSION['company_code'].'&apikey='. $API_KEY));
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			  $server_output = curl_exec ($ch);
			  curl_close ($ch);
			  $result = json_decode($server_output,true);
			  $d1=$result['Time Series (Daily)'];
			  $dates=$d1['2019-11-13'];
				$change=($dates['2. high']-$dates['3. low'])/100;

			   ?>

  			<table border="0" align="center">
        <tr>
        	<td><b>NASDAQ<span style="color: lime"> LIVE</span></b></td>

          <td></td>
          <td></td>
          <td rowspan="2"><span style="color: #3898D3;font-size: 30px;"><b><?php echo $dates['1. open']; ?></b></span></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td><span style="color: grey;font-size: 13px;"><?php date_default_timezone_set('Asia/Kolkata');
echo $date = date('Y-m-d');?> </span> </td>
          <td></td>
          <td></td>
          <td><span style="color: #3898D3;font-size: 20px;"><b><?php echo number_format((float)$change,4,'.','') ?></b></span></td>
          <td></td>
          <td></td>
          <td></td>
          <td><span style="color: grey;font-size: 13px;">Volume</span></td>
          <td><b><?php echo $dates['5. volume'];?></b></td>
        </tr>
      </table>
  		</div>



  		<div class="container-fluid">
  	<div class="card">
  		<div class="card-body1 text-center">
  			<h2 class="card-title">Charts</h2>
  		</div>
  	</div>
  	</div>


  		<div class="card">
  			<div class="card-header"></div>
  		</div>
			<?php require 'wt_project/Admin/views/templates/view_company_stock_graph.php' ?>
			<?php require 'wt_project/user/views/templates/stock_api_price.php' ?>


	<div class="card">
		<div class="card-body ">
			<h3 class="card-title text-center">Valuation</h3>
			<h5>Standalone</h5>
			<div class="container-fluid">
				<table class="table table-dark table-hover">
					<tr>
						<td>Market Cap (Rs Cr.)</td>
		      			<th><?php echo $view_company_valuation_detail[2] ?></th>
				        <td>Market Lot</td>
				        <th><?php  echo $view_company_valuation_detail[5] ?></th>
				        <td>Price/Book</td>
				        <th><?php echo $view_company_valuation_detail[9] ?></th>
		    		</tr>
    				<tr>
				      	<td>P/E</td>
				      	<th><?php echo $view_company_valuation_detail[3] ?></th>
				      	<td>Industry P/E</td>
				      	<th><?php echo $view_company_valuation_detail[6] ?></th>
				      	<td>Dividend Yield.(%)</td>
				      	<th><?php echo $view_company_valuation_detail[10] ?></th>
    				</tr>
				    <tr>
				      	<td>Book Value (Rs)</td>
				      	<th><?php echo $view_company_valuation_detail[3] ?></th>
				      	<td>EPS (TTM)</td>
				      	<th><?php echo $view_company_valuation_detail[7] ?></th>
				      	<td>Face Value (RS)</td>
				      	<th><?php echo  $view_company_valuation_detail[11] ?></th>
				    </tr>
				    <tr>
				      	<td>Dividend (%)</td>
				      	<th><?php echo $view_company_valuation_detail[4] ?></th>
				      	<td>P/C</td>
				      	<th><?php echo $view_company_valuation_detail[8] ?></th>
				      	<td>Deliverables (%)</td>
				      	<th><?php echo $view_company_valuation_detail[12] ?></th>
				    </tr>
				</table>
			</div>
		</div>
	</div>


	<div class="card">
		<div class="card-body ">
			<h3 class="card-title text-center"><b>FINANCIALS</b></h3>
			<h4>Income Statement</h4>
			<h5><b>Standalone</b></h5>
			<div class="container-fluid">
				<table class="table table-dark table-hover">
					<tr>
						<th></th>
		      			<th>Sep 2019	</th>
				        <th>Jun 2019</th>
				        <th>Mar 2019</th>
				        <th>Dec 2018</th>
				        <th>Sep 2018</th>
		    		</tr>
            <?php for ($i=0; $i <count($view_company_finanacial_detail) ; $i++) {
              echo '<tr>
  				      	<td>'.$view_company_finanacial_detail[$i]["finance_field"].'</td>
  				      	<td>'.$view_company_finanacial_detail[$i]["quarter1"].'</td>
  				      	<td>'.$view_company_finanacial_detail[$i]["quarter2"].'</td>
  				      	<td>'.$view_company_finanacial_detail[$i]["quarter3"].'</td>
  				      	<td>'.$view_company_finanacial_detail[$i]["quarter4"].'</td>
  				      	<td>'.$view_company_finanacial_detail[$i]["quarter5"].'</td>
      				</tr>';
            }
            ?>
				</table>
			</div>
		</div>
	</div>

	<!---<div class="container-fluid">
	<div class="card text-center">
    <div class="card-body1"><h2>SHARE HOLDING PATTERN & MUTUAL FUND HOLDING</h2></div>
  </div>
</div>
  <div class="card">
		<div class="card-body ">
<div class="container-fluid">

  <table border="1" class="table table-dark">
  <tr>
    <th>Standalone</th>
    <th>August 2019</th>
    <th>June 2019</th>
    <th>December 2018</th>
    <th>September 2018</th>
  </tr>
  <tr>
    <th>Promoters</th>
    <th>17.97 </th>
    <th>19.78</th>
    <th>19.82</th>
    <th>19.91</th>
  </tr>
  <tr>
    <td>Pledged</td>
    <td>40.78</td>
    <td>3.64</td>
    <td>3.64  </td>
    <td>3.63</td>
  </tr>
  <tr>
    <th>FII/FPI</th>
    <th>31.73</th>
    <th>33.69 </th>
    <th>36.15</th>
    <th>39.5 </th>
  </tr>
  <tr>
    <th>Total DII</th>
    <th>27.65</th>
    <th>26.07 </th>
    <th>27.76</th>
    <th>29.4</th>
  </tr>
  <tr>
    <td>Fin.Insts</td>
    <td>0.44</td>
    <td>0.32  </td>
    <td>0.18</td>
    <td>0.19  </td>
  </tr>
  <tr>
    <td>Insurance Co</td>
    <td>9.04</td>
    <td>10.08</td>
    <td>11.04</td>
    <td>12.04</td>
  </tr>
  <tr>
    <td>MF</td>
    <td>9.29</td>
    <td>6.59 </td>
    <td>10.16</td>
    <td>10.55</td>
  </tr>
  <tr>
    <td>Others DIIs</td>
    <td>8.88</td>
    <td>9.08</td>
    <td>6.38  </td>
    <td>6.62  </td>
  </tr>
  <tr>
    <th>Others</th>
    <th>22.64</th>
    <th>20.46 </th>
    <th>16.27</th>
    <th>11.19</th>
  </tr>
  <tr>
    <td>Total</td>
    <td>99.99</td>
    <td>100 </td>
    <td>100 </td>
    <td>100 </td>
  </tr>
</table>
</div>
</div>
</div>
-->

<div class="card">
		<div class="card-body ">
			<h4 class="" style=""><b><center>COMPANY INFORMATION</center></b></h4>
      <hr>
      <h4 class="" style=""><b><center><ul>Company Overview</ul></center></b></h4>
      <p style="color:darkgreen; font-size:18px;"><?php echo $view_company_detail[10] ?></p>
      <hr>
			<div class="container-fluid">
				<table class="table table-dark table-hover">
					<tr>
						<th>Address</th>
		      			<td style="color:#FFF"><?php echo $view_company_detail[2] ?></td>
				        <th>Name</th>
				        <td><?php echo $view_company_register_detail[2] ?></td>
				        <th>Name</th>
				        <th>Designation</th>
		    		</tr>
    				<tr>
				      	<th>City</th>
				      	<td><?php echo $view_company_detail[3] ?></td>
				      	<th>Address</th>
				      	<td></td>
                <th>
                <?php for ($i=0; $i <count($view_company_management_detail) ; $i++) {
                  echo $view_company_management_detail[$i]["name"];
                  echo " ";
                  echo $view_company_management_detail[$i]["designation"];
                  echo "<br><hr>";
                } ?>

              </th>
    				</tr>
				    <tr>
				      	<th>State</th>
				      	<td><?php echo $view_company_detail[4] ?></td>
				      	<th>City</th>
				      	<td><?php echo $view_company_register_detail[4] ?></td>

				    </tr>
				    <tr>
				      	<th>Pin Code</th>
				      	<td><?php echo $view_company_detail[5] ?></td>
				      	<th>State</th>
				      	<td><?php echo $view_company_register_detail[5] ?></td>

				    </tr>
				    <tr>
				    	<th>Tel. No.</th>
				    	<td><?php echo $view_company_detail[6] ?></td>
				    	<th>Tel. No.</th>
				    	<td><?php echo $view_company_register_detail[6] ?></td>

				    </tr>
				    <tr>
				    	<th>Fax No.</th>
				    	<td><?php echo $view_company_detail[7] ?></td>
				    	<th>Fax No.</th>
				    	<td><?php echo $view_company_register_detail[7] ?></td>

				    </tr>
				    <tr>
				    	<th>Email</th>
				    	<td><?php echo $view_company_detail[8] ?></td>
				    	<th>Email</th>
				    	<td><?php echo $view_company_register_detail[8] ?></td>
				    </tr>
				    <tr>
				    	<th>Internet</th>
				    	<td><?php echo $view_company_detail[9] ?></td>
				    	<th>Internet</th>
				    	<td><?php echo $view_company_register_detail[9] ?></td>
				    </tr>
				</table>
			</div>
		</div>
	</div>
<footer>
  <div class="footer-copyright text-center py-3">© 2019 StockMarketJunkies.com</div>


</footer>
</div>
</body>
</html>
