
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Login Form</title>

	<title>SignUp Form</title>
</head>
<script type="text/javascript">
	function validateForm() {
	  var fullname = document.forms["form"]["fname"].value;
	  var username = document.forms["form"]["uname"].value;
	  var password = document.forms["form"]["password"].value;
	  var c_password = document.forms["form"]["c_password"].value;
	  var email = document.forms["form"]["email"].value;
	  var contact = document.forms["form"]["contact"].value;
	  if (fullname == "" || username == "" || password == "" || c_password == "" || email == "" || contact == "") {
		alert("All fields should be filled ");
		return false;
	  }
	  else
	  {
        alert("Thanks " + " " + username + " " + " you are successfully registered!!")
      }
	}
	function checkpass(){
	  var password = document.forms["form"]["password"].value;
	  var c_password = document.forms["form"]["password2"].value;
	  if (password != c_password) {
		alert("Password does not match ");
		return false;
	  }
	  else
	  {
        alert("password match!You can proceed ")
      }
	}


</script>
<style>

body{
	margin: 0;
	padding: 0;
	 background-position: center;
  	background-repeat: no-repeat;
  background-size: cover;
  font-family: 'jomolhari serif';

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
h1 {
  font-size: 3em;
  text-align: center;
  color: #6a3093;
  font-weight: 100;
  letter-spacing: 4px;
  font-family: 'jomolhari sans-serif';
}
.outset{
  width: 35%;
  margin: 0em auto;
  box-shadow: 5px 5px 5px 5px grey;
  background-color: transparent;
  background-color: rgba(0, 0, 0, 0.30);
}
.inner {
  padding: 3em;
}
input[type="text"], input[type="email"], input[type="password"] {
  color: #fff;
  width: 95%;
  border: none;
  border-radius:5px;
  padding: 0.8em;
  background:#f0f0f0;
  color: black;
  font-family: 'jomolhari sans-serif';
}
input.email, input.text.w3lpass ,button ,input.text{
  margin: 2em 0;
}
input[type="submit"] {
  color: #fff;
  float:center;
  background: #00e68a;
  border: 1px solid #00e68a;
  border-radius:5px;
  padding: 0.9em;
  width: 100%;
  letter-spacing: 4px;
}
input[type="submit"]:hover {
  color: #00e68a;
  background: #fff;
  border: 1px solid #fff;
  font-weight:100;
}
div.outset {
	background-color: transparent;
	background-color: rgba(0,0,0,0);}

.inner p {
  font-size: 1.5em;
  color: black;
  text-align: center;
  letter-spacing: 1px;
  font-weight: 300;
}
.inner p a {
  color: gray;
  font-weight: 400;
}
.inner p a:hover {
  color: #00e68a;
}
button {
  background-color: #6a3093;
  float:left;
  width: 15px;
  margin-right: 2px;
  font-size:1.5em;
  font-family: jomolhari sans-serif;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border-radius: 10px;
  width: 50%;
  letter-spacing: 1px;

}
button:hover {
  background-color: #B660CD;
  color: white;
}
.btn btn-primary center-block {
  float:center;
}
</style>
<body>
	<nav class="navbar navbar-light bg-light">
	  <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: 'Big Shoulders Text', cursive;  font-weight: bold; color:#fff; font-size: 1rem; ">Stock Market Junkies</a>
	  <div class="title" style="margin-left:40%;margin-top:1%">
		<ul>
      <li>
        <a id="link" href="?act=login" style="">Login</a>
      </li>
			<li><a href="?act=signup" id="link">SignUp</a></li>
		</ul>
	  </div>
	</nav>
	<?php
		if (isset($_SESSION['otp_message'])) {
			echo'
			<div class="alert alert-success alert-dismissible" style="margin-top:30px;width:70%;margin-left:200px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				echo $_SESSION['otp_message'];
				echo '</div>';
			}
		?>
	<div class="wrapper">
	<br><br>
		<h1><b>Sign Up</b></h1>
		<div class="outset" height="100%;">
			<div class="inner">
				<form method="post" name="form" onsubmit="validateForm()" action="?act=registering_user">
					<div class="input-group input-group-lg">
					  <span class="input-group-addon">
						<span class="glyphicon glyphicon-menu-hamburger"></span>
					  </span>
					  <input class="form-control" type="text" name="first_name" id="fname" placeholder="Enter First Name" required>
					</div>
					<br>
          <div class="input-group input-group-lg">
					  <span class="input-group-addon">
						<span class="glyphicon glyphicon-menu-hamburger"></span>
					  </span>
					  <input class="form-control" type="text" name="last_name" id="fname" placeholder="Enter Last Name" required>
					</div>
					<br>
          <div class="input-group input-group-lg">
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-envelope"></span>
            </span>
            <input class="form-control" type="email" name="email" placeholder="Enter Email address" required>
          </div>
          <br>
					<div class="input-group input-group-lg">
					  <span class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
					  </span>
					  <input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
					</div>
					<br>
					<div class="input-group input-group-lg">
					  <span class="input-group-addon">
						<span class="glyphicon glyphicon-ok"></span>
					  </span>
					  <input class="form-control" id="c_password" name="password2" type="password" placeholder="Confirm Password" onchange="checkpass()">
					</div>
					<br>
					<center><button type="submit"style="margin:100px" >Sign Up</button></center>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<p style="text-align: center; color: #fff; font-size: 1rem; padding-top: 0.2rem;">&copy; 2019 StockMarketJunkies.com<p>
		</div>
	</footer>
</body>
</html>
