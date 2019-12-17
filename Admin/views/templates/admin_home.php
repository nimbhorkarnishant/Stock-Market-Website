<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Jomolhari|ZCOOL+XiaoWei&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="wt_project/Admin/views/media/css/admin_home.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Admin Panel</title>

</head>
<body>
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

	<div class="card">
		<div class="card-body0 text-center text-dark">
			<h1 class="card-title"><b>Admin Panel</b></h1>
	  	</div>
	</div>
	<div class="container-fluid">
		<div class="card">
			<div class="card-body1 text-center">
				<h4 class="card-title"><b>Authentication and Autherization </b></h4>
		  	</div>
		</div>
	</div>

	<div class="container-fluid">
		<table class="table">
			<tr>
				<th>Groups</th>
				<td><button type="button" class="btn btn-danger " style="margin-left:550px;"><i class="fa fa-plus" aria-hidden="true"></i>Add</button></td>
      			<td><button type="button" class="btn btn-success" style="margin-left:-400px;"><i class="fa fa-edit"></i>Change</button></td>
    		</tr>
        <?php
          if (!isset($_SESSION)) {
            session_start();
          }
          $user_type='';
          $user_type=$_SESSION['user_type'];
          if ($user_type=="superadmin") {
          echo'  <tr>
     		    	<th><a href="?act=user_information" style="text-decoration:none;">User Information</a></th>
    				<td><button type="button" class="btn btn-danger" style="margin-left:550px;"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_new_user" style="text-decoration: none;color:#FFF;">Add</a></button></td>
          			<td><button type="button" class="btn btn-success" style="margin-left:-400px;"><i class="fa fa-edit"></i><a href="?act=user_information" style="text-decoration:none;color:#FFF;">Change</a></button></td>
        		</tr>';
						echo'  <tr>
	     		    	<th><a href="?act=show_user_history_information" style="text-decoration:none;">User Information History</a></th>
	    				<td><button type="button" class="btn btn-danger" style="margin-left:550px;"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_new_user" style="text-decoration: none;color:#FFF;">Add</a></button></td>
	          			<td><button type="button" class="btn btn-success" style="margin-left:-400px;"><i class="fa fa-edit"></i><a href="?act=show_user_history_information" style="text-decoration:none;color:#FFF;">Change</a></button></td>
	        		</tr>';
          }
          ?>
    	</table>
    </div>
    </div>
    <div class="container-fluid">
	  	<div class="card">
			<div class="card-body1 text-center ">
				<h4 class="card-title"><b>Company Information </b></h4>
		  	</div>
		</div>
		<table class="table">
			<tr>
				<th><a href="?act=company_informations" style="text-decoration: none">Company Basic Information</a></th>
      			<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true" ></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
      			<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=company_informations" style="text-decoration: none;color:#FFF;">Change</a></button></td>
    		</tr>
    		<tr>
    			<th><a href="?act=company_registers_information" style="text-decoration:none;">Company registers Information</a></th>
      			<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
      			<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=company_registers_information" style="text-decoration:none;color:#FFF;">Change</a></button></td>
    		</tr>
    		<tr>
    			<th><a href="?act=company_management_information" style="text-decoration: none">Company Management Information</a></th>
      			<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
      			<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=company_management_information" style="text-decoration: none;color:#FFF;">Change</a></button></td>
    		</tr>
    		<tr>
    			<th><a href="?act=company_Financial_information" style="text-decoration: none">Company Financial Information</a></th>
      			<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
      			<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=company_Financial_information" style="text-decoration: none;color:#FFF;">Change</a></button></td>
    		</tr>
    		<tr>
    			<th><a href="?act=company_valuation_stanadalone_information" style="text-decoration: none">Company Valuation Information</a></th>
      		    <td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
      			<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=company_valuation_stanadalone_information" style="text-decoration: none;color:#FFF;">Change</a></button></td>
   			</tr>
		</table>
	</div>
	<div class="container-fluid">
		<div class="card">
		<div class="card-body1 text-center ">
			<h4 class="card-title"><b>Company Information History </b></h4>
			</div>
	</div>
	<table class="table">
		<tr>
			<th><a href="?act=show_company_basic_information_history" style="text-decoration: none">Company Basic Information History</a></th>
					<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true" ></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
					<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=show_company_basic_information_history" style="text-decoration: none;color:#FFF;">Change</a></button></td>
			</tr>
			<tr>
				<th><a href="?act=show_company_register_information_history" style="text-decoration:none;">Company registers Information History</a></th>
					<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
					<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=show_company_register_information_history" style="text-decoration:none;color:#FFF;">Change</a></button></td>
			</tr>
			<tr>
				<th><a href="?act=show_company_management_information_history" style="text-decoration: none">Company Management Information History</a></th>
					<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
					<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=show_company_management_information_history" style="text-decoration: none;color:#FFF;">Change</a></button></td>
			</tr>
			<tr>
				<th><a href="?act=show_company_financial_information_history" style="text-decoration: none">Company Financial Information History</a></th>
					<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
					<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=show_company_financial_information_history" style="text-decoration: none;color:#FFF;">Change</a></button></td>
			</tr>
			<tr>
				<th><a href="?act=show_company_valuation_information_history" style="text-decoration: none">Company Valuation Information History</a></th>
						<td><button type="button" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i><a href="?act=add_company_detail_home" style="text-decoration: none;color:#FFF;">Add</a></button></td>
					<td><button type="button" class="btn btn-success"><i class="fa fa-edit"></i><a href="?act=show_company_valuation_information_history" style="text-decoration: none;color:#FFF;">Change</a></button></td>
			</tr>
	</table>
</div>





<footer style="margin-top:20px;">
  <div class="footer-copyright text-center py-3">© 2019 StockMarketJunkies.com</div>


</footer>

</body>
</html>
