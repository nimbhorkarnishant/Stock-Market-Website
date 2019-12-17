<?php
ini_set('memory_limit','500M');
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

if (!isset($_SESSION)) {
  session_start();
}

$act=$_GET["act"]?? 'home';
//echo $act;
if ($act=="show_company_detail") {
  $code=$_GET['code'];
  $_SESSION["company_code"]=$code;
  //echo $_SESSION["company_code"];
 }




//echo "index-->";
//echo $act.'-->';
switch ($act) {
    case "home":
        //$message="nishant";
        if (isset($_SESSION['user_id']) and isset($_SESSION['user_type'])) {
          require 'wt_project/user/model/user_login_model.php';
          $login_validate=new user_login($conn);
          $result_new=$login_validate->display_favourite_stock();
          //echo $_SESSION['user_id'];
          require 'wt_project/user/views/templates/home.php';
        }
        else {
          require 'wt_project/user/views/templates/dummy_home.php';
        }

        break;


		case "login":
      //echo "login";
      require 'user/controller/user_controller_login.php';
			break;
    case "validating_user":
      require 'user/controller/user_controller_login.php';
      break;

    case "logout":
      require 'user/controller/user_controller_login.php';
      break;

    case "signup":
      require 'wt_project/user/controller/user_controller_signup.php';
      break;

    case 'admin':
      require 'wt_project/Admin/controller/admin_home.php';
      break;

    case 'registering_user':
      require 'wt_project/user/controller/user_controller_signup.php';
      break;
    case 'otp_validation':
      require 'wt_project/user/controller/user_controller_signup.php';
      break;

    case 'forgot_password':
      require 'user/controller/user_controller_login.php';
      break;

    case 'sending_email':
      require 'user/controller/user_controller_login.php';
      break;

    case 'reset_password':
      require 'user/controller/user_controller_login.php';
      break;

    case 'password_reset_done':
      require 'user/controller/user_controller_login.php';
      break;

    case 'admin_pannel':
      if (isset($_SESSION['user_id'])) {
        require 'wt_project/Admin/views/templates/admin_home.php';

      }
      else {
        $_SESSION['message_not_login_admin_home']="Sorry For this feature login is required!!";
      }
      break;

    case 'user_information':
      require 'Admin/controller/admin_home_controller_user.php';
      break;

    case 'filter_by_user_type':
      require 'Admin/controller/admin_home_controller_user.php';
      break;

    case 'filter_by_email':
      require 'Admin/controller/admin_home_controller_user.php';
      break;

    case 'view_user_detail':
      require 'Admin/controller/admin_home_controller_user.php';
      break;
    case 'edit_user_detail':
      require 'Admin/controller/admin_home_controller_user.php';
      break;
    case 'update_user_detail':
      require 'Admin/controller/admin_home_controller_user.php';
      break;

    case 'delete_user_detail':
      require 'Admin/controller/admin_home_controller_user.php';
      break;

    case 'add_new_user':
      require 'Admin/controller/admin_home_controller_user.php';
      break;
    case 'Adding_new_user':
      require 'Admin/controller/admin_home_controller_user.php';
      break;

    case 'company_informations':
      require 'Admin/controller/admin_company_information_controller.php';
      break;

    case 'filter_by_company_name':
      require 'Admin/controller/admin_company_information_controller.php';
      break;

    case 'filter_by_company_email':
      require 'Admin/controller/admin_company_information_controller.php';
      break;

    case 'view_company_detail':
      require 'Admin/controller/admin_company_information_controller.php';
      break;
    case 'edit_company_detail':
      require 'Admin/controller/admin_company_information_controller.php';
      break;

    case 'update_company_detail':
      require 'Admin/controller/admin_company_information_controller.php';
      break;

    case 'delete_comapny_detail':
      require 'Admin/controller/admin_company_information_controller.php';
      break;

    case 'add_new_company_detail':
      require 'Admin/views/templates/add_company_all_detail_home.php';
      break;

    case 'Adding_company_detail':
      require 'Admin/controller/admin_company_information_controller.php';
      break;

    case 'company_registers_information':
      require 'Admin/controller/admin_company_information_register_controller.php';
      break;

    case 'filter_by_company_id':
      require 'Admin/controller/admin_company_information_register_controller.php';
      break;
    case 'filter_by_register_email':
      require 'Admin/controller/admin_company_information_register_controller.php';
      break;

    case 'edit_company_register_detail':
      require 'Admin/controller/admin_company_information_register_controller.php';
      break;

    case 'update_company_register_detail':
      require 'Admin/controller/admin_company_information_register_controller.php';
      break;

    case 'delete_comapny_register_detail':
      require 'Admin/controller/admin_company_information_register_controller.php';
      break;

    case 'add_new_company_register_detail':
      require 'Admin/views/templates/add_company_all_detail_home.php';
      break;
    case 'Adding_company_register_detail':
      require 'Admin/controller/admin_company_information_register_controller.php';
      break;

    case 'company_management_information':
      require 'Admin/controller/admin_company_information_management_controller.php';
      break;

    case 'filter_by_company_Id':
      require 'Admin/controller/admin_company_information_management_controller.php';
      break;

    case 'edit_company_management_detail':
      require 'Admin/controller/admin_company_information_management_controller.php';
      break;

    case 'update_company_management_detail':
      require 'Admin/controller/admin_company_information_management_controller.php';
      break;
    case 'delete_comapny_management_detail':
      require 'Admin/controller/admin_company_information_management_controller.php';
      break;

    case 'add_new_company_management_detail':
      require 'Admin/views/templates/add_company_all_detail_home.php';
      break;

    case 'Adding_company_management_detail':
      require 'Admin/controller/admin_company_information_management_controller.php';
      break;

    case 'company_valuation_stanadalone_information':
      require 'Admin/controller/admin_company_valuation_standalone_controller.php';
      break;

    case 'view_company_valuation_detail':
      require 'Admin/controller/admin_company_valuation_standalone_controller.php';
      break;

    case 'update_comapny_valuation_detail':
      require 'Admin/controller/admin_company_valuation_standalone_controller.php';
      break;

    case 'delete_comapny_valuation_detail':
      require 'Admin/controller/admin_company_valuation_standalone_controller.php';
      break;

    case 'add_company_valuation_detail':
      require 'Admin/views/templates/add_company_all_detail_home.php';
      break;
    case 'adding_company_valuation_detail':
      require 'Admin/controller/admin_company_valuation_standalone_controller.php';
      break;

    case 'filter_by_company_valuation_id':
      require 'Admin/controller/admin_company_valuation_standalone_controller.php';
      break;

    case 'company_Financial_information':
      require 'Admin/controller/admin_company_financial_standlone_controller.php';
      break;

    case 'filter_by_company_finanace_id':
      require 'Admin/controller/admin_company_financial_standlone_controller.php';
      break;

    case 'view_company_finanacial_detail':
      require 'Admin/controller/admin_company_financial_standlone_controller.php';
      break;

    case 'update_comapny_financial_detail':
      require 'Admin/controller/admin_company_financial_standlone_controller.php';
      break;

    case 'delete_company_financial_detail':
      require 'Admin/controller/admin_company_financial_standlone_controller.php';
      break;

    case 'add_company_financial_detail':
      require 'Admin/views/templates/add_company_all_detail_home.php';
      break;

    case 'adding_company_financial_detail':
      require 'Admin/controller/admin_company_financial_standlone_controller.php';
      break;

    case 'add_company_detail_home':
      require 'Admin/controller/show_company_detail_controller.php';
      break;


    case 'show_company_detail':
      require 'Admin/controller/show_company_detail_controller.php';
      break;

    case 'show_user_history_information':
      require 'Admin/controller/show_company_detail_controller.php';
      break;
    case 'show_company_basic_information_history':
      require 'Admin/controller/show_company_detail_controller.php';
      break;

    case 'show_company_register_information_history':
      require 'Admin/controller/show_company_detail_controller.php';
      break;

    case 'show_company_management_information_history':
      require 'Admin/controller/show_company_detail_controller.php';
      break;

    case 'show_company_valuation_information_history':
      require 'Admin/controller/show_company_detail_controller.php';
      break;

    case 'show_company_financial_information_history':
      require 'Admin/controller/show_company_detail_controller.php';
      break;

    case 'adding_favourite_stock':
      require 'wt_project/user/controller/user_controller_login.php';
      break;

    default:
        echo "mi";
        echo "Sorry!!! something Went wrong!!!!";
}
?>
