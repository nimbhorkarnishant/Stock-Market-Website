<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wt_project";

// Create connection

$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


switch ($act) {

    case 'signup':
		//	echo "this is login";
			require 'wt_project/user/views/templates/signup.php';
			break;

    case 'registering_user':
      require 'wt_project/user/model/user_signup_model.php';
      $registering_user=new user_signup($conn);
      $output_message=$registering_user->registering_user();
      $_SESSION['otp_message']=$output_message;
      break;

    case 'otp_validation':
      require 'wt_project/user/model/user_signup_model.php';
      $otp_validate=new user_signup($conn);
      $output_message=$otp_validate->otp_validation();
      $_SESSION['register_message_user']=$output_message;
      header("Location: http://localhost/?act=signup");
      break;

    default:
        echo "you";
        echo "Sorry!!! something Went wrong!!!!";
}
?>
