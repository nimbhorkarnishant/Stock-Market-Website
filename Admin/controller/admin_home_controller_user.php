<?php
//session_start();
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
    case 'user_information':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $user_detail=$user_information->user_detail();
      //echo $user_detail;
      require 'wt_project/Admin/views/templates/user_detail.php';
      break;

    case 'filter_by_user_type':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $user_detail=$user_information->sort_by($act);
      //echo $user_detail;
      require 'wt_project/Admin/views/templates/user_detail.php';
      break;

    case 'filter_by_email':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $user_detail=$user_information->sort_by($act);
      //echo $user_detail;
      require 'wt_project/Admin/views/templates/user_detail.php';
      break;

    case 'view_user_detail':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $user_detail=$user_information->view_detail();
      //echo $user_detail;
      require 'wt_project/Admin/views/templates/view_user_detail.php';
      break;

    case 'edit_user_detail':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $user_detail=$user_information->view_detail();
      //echo $user_detail;
      require 'wt_project/Admin/views/templates/update_user_detail.php';
      break;

    case 'update_user_detail':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $update_message=$user_information->update_user_detail();
      $user_detail=$user_information->view_detail();
      echo $user_detail;
      $_SESSION['message']=$update_message;
      header("Location: http://localhost/?act=view_user_detail");
      break;

    case 'delete_user_detail':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $delete_message=$user_information->delete_user_detail();
      $_SESSION['delete_add_message']=$delete_message;
      header("Location: http://localhost/?act=user_information");
      break;

    case 'add_new_user':
      require 'wt_project/Admin/views/templates/add_new_user_form.php';
      break;

    case 'Adding_new_user':
      require 'wt_project/Admin/model/admin_home.php';
      $user_information=new user_infromation($conn);
      $user_detail=$user_information->add_new_user();
      $_SESSION['delete_add_message']=$user_detail;
      header("Location: http://localhost/?act=user_information");
      break;

    default:
        echo "Sorry!!! something Went wrong!!!!";
}
?>
