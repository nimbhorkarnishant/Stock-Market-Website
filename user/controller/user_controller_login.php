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

    case 'login':
		//	echo "this is login";
			require 'wt_project/user/views/templates/login.php';
			break;

    case 'validating_user':
      //echo "ev";
      require 'wt_project/user/model/user_login_model.php';

      $login_validate=new user_login($conn);
      $output_message=$login_validate->login_validation();
      //define('user_id','user_id');
      $_SESSION['message']=$output_message;
      header("Location: http://localhost/");
      exit;


      break;

    case 'logout':
      require 'wt_project/user/model/user_login_model.php';

      $logout_view=new user_login($conn);
      $logout_message=$logout_view->logout();
      #$message="You logout Succefully!!";
      header("Location: http://localhost/");
      break;

    case 'forgot_password':
      require 'wt_project/user/views/templates/forgot_password.php';
      break;

    case 'sending_email':
      require 'wt_project/user/model/user_login_model.php';
      $forgot_object=new user_login($conn);
      $forgot_password=$forgot_object->forgot_password();
      echo $forgot_password;
      break;

    case 'reset_password':
      require 'wt_project/user/views/templates/reset_password.php';
      break;

    case 'password_reset_done':
      require 'wt_project/user/model/user_login_model.php';
      $reset_object=new user_login($conn);
      $reset_password=$reset_object->reset_password();
      echo $reset_password.'<br>';
      echo "<b>click here to"." ".'<a href="?act=login">login</a>';
      break;

    case 'adding_favourite_stock':
      require 'wt_project/user/model/user_login_model.php';
      $object=new user_login($conn);
      $reset_password=$object->adding_favourite_stock();
      $_SESSION['favourite_add_message']=$reset_password;
      header("Location: http://localhost/");
      break;

    default:
        echo "Sorry!!! something Went wrong!!!!";
}
?>
