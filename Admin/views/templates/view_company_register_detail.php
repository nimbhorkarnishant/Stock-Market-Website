<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<nav class="navbar navbar-light bg-light">
	  <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: 'Big Shoulders Text', cursive;  font-weight: bold; color:#fff; font-size: 1rem; ">Stock Market Junkies</a>
	  <div class="title">
		<ul>
      <li><a href="?act=home" style="color:#FFF">Visit website</a></li>
      <li >
        <a id="link" href="?act=admin_pannel">Admin Home</a>
      </li>
			<li><a href="?act=logout" id="link">Logout</a></li>
			<li><a href=""><img src="wt_project/user/views/media/website_images/Profile.svg"></a></li>
		</ul>
	  </div>
	</nav>
  <?php
  if (isset($_SESSION['company_register_upadte_massage'])) {
    echo '<div class="alert alert-success alert-dismissible" style="margin-top:30px;width:70%;margin-left:200px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    echo $_SESSION['company_register_upadte_massage'];
    echo "</div>";
  }
    ?>
  <a href="?act=add_new_company_detail" style="float:right;margin-right:5px;color:darkgreen;"><img src="wt_project/user/views/media/website_images/add_user.svg" width="70px;" height="50px;" style="margin-left: 15vw;"> Add Company</a>


	<main>
		<div class="container">
			<div class="row">
				<div class="card" style="margin-top: 5vh;">
				  <div class="card-header" style="color: #fac239;font-family: 'Oswald', sans-serif;
	text-transform: uppercase;
	font-weight: bold; width: 60vw; padding:2px; background-color: #34495E  ; font-size: 1.2rem; ">
				    Edit Company Details
				  </div>

				  <div class="card-body">
            <form class="" action="?act=update_company_register_detail" method="post">

				  	<div class="input-group mb-3">
  					  <div class="input-group-prepend">
  					    <span class="input-group-text" id="basic-addon1">Comapany ID</span>
  					  </div>
					    <input type="text" class="form-control" name="company_id" value='<?php echo $company_registers_details[1] ?>' aria-describedby="basic-addon1">
					  </div>
					  <div class="input-group mb-3">
					    <div class="input-group-prepend">
					      <span class="input-group-text" id="basic-addon1"> Registers Name</span>
					    </div>
					   <input type="text" class="form-control" name="register_name" value='<?php echo $company_registers_details[2] ?>' aria-describedby="basic-addon1">
					  </div>
					  <div class="input-group mb-3 ">
					    <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Registers Address</span>
					  </div>
					   <input type="text" class="form-control" name="register_address" value='<?php echo $company_registers_details[3] ?>' aria-describedby="basic-addon1">
					  </div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Registers City</span>
            </div>
            <input type="text" class="form-control" name="register_city" value='<?php echo $company_registers_details[4] ?>' aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Register State</span>
            </div>
            <input type="text" class="form-control" name="register_state" value='<?php echo $company_registers_details[5] ?>' aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Registers Telno</span>
          </div>
          <input type="text" class="form-control" name="register_telno" value='<?php echo $company_registers_details[6] ?>' aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Registers Fax No</span>
          </div>
          <input type="text" class="form-control" name="register_faxno" value='<?php echo $company_registers_details[7] ?>' aria-describedby="basic-addon1">
          </div>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Registers Email</span>
          </div>
          <input type="text" class="form-control" name="register_email" value='<?php echo $company_registers_details[8] ?>' aria-describedby="basic-addon1">
        </div>
  			<div class="input-group mb-3">
  			  <div class="input-group-prepend">
  			    <span class="input-group-text" id="basic-addon1">Registers Internet</span>
  			  </div>
  			  <input type="text" class="form-control" name="register_internet" value='<?php echo $company_registers_details[9] ?>' aria-describedby="basic-addon1">
  			</div>
        <button class="btn btn-success" style="float: left;margin-bottom:20px;" type="submit" class="btn btn-primary" name="registers_id" value='<?php echo $company_registers_details[0] ?>'>
          Update and Save Details
        </button>
        </form>
          <form class="" action="?act=delete_comapny_register_detail" method="post">
          <button type="submit" class="btn btn-danger" name="register_id"  style="float: right;margin-bottom:20px;" value='<?php echo $company_registers_details[0] ?>'>
            Delete Details
          </button>
          </form>
				  </div>
				</div>
			</div>
		</div>
	</main>


	<footer>
		<div class="container">
			<p style="text-align: center; color: #fff; font-size: 1rem; padding-top: 0.2rem;">&copy; 2019 StockMarketJunkies.com<p>
		</div>
	</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
