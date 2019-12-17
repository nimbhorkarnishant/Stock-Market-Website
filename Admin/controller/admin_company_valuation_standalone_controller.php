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

    case 'company_valuation_stanadalone_information':
      require 'wt_project/Admin/model/admin_company_valuation_standalone.php';
      $company_information=new company_valuation_standalone($conn);
      $company_valuation_detail=$company_information->company_valuation_standalone_information();
      //echo $company_detail;
			require 'wt_project/Admin/views/templates/company_valuation_standalone.php';
			break;

    case 'filter_by_company_valuation_id':
      require 'wt_project/Admin/model/admin_company_valuation_standalone.php';
      $company_information=new company_valuation_standalone($conn);
      $company_valuation_detail=$company_information->search_by($act);
      //echo $company_detail;
      require 'wt_project/Admin/views/templates/company_valuation_standalone.php';
      break;



    case 'view_company_valuation_detail':
      require 'wt_project/Admin/model/admin_company_valuation_standalone.php';
      $company_information=new company_valuation_standalone($conn);
      $company_valuation_detail=$company_information->view_company_valuation_detail();
      //echo $company_detail;
      require 'wt_project/Admin/views/templates/view_company_valuation_standalone_detail.php';
      break;


    case 'update_comapny_valuation_detail':
      require 'wt_project/Admin/model/admin_company_valuation_standalone.php';
      $company_information=new company_valuation_standalone($conn);
      $company_valuation_detail_update_message=$company_information->update_company_valuation_detail();
    //  $company_valuation_detail=$company_information->view_company_valuation_detail();
      //echo $company_detail;
      $_SESSION['company_valuation_detail_update_message']=$company_valuation_detail_update_message;
      header("Location: http://localhost/?act=view_company_valuation_detail");
      break;

    case 'delete_comapny_valuation_detail':
      require 'wt_project/Admin/model/admin_company_valuation_standalone.php';
      $company_information=new company_valuation_standalone($conn);
      $company_valuation_detail_del_add_message=$company_information->delete_company_valuation_detail();
      $_SESSION['company_valuation_detail_update_message']=$company_valuation_detail_del_add_message;
      header("Location: http://localhost/?act=company_valuation_stanadalone_information");
      break;

    //case 'add_new_company_detail':
      //require 'wt_project/Admin/views/templates/add_new_user_form.php';
      //break;

    case 'adding_company_valuation_detail':
      require 'wt_project/Admin/model/admin_company_valuation_standalone.php';
      $company_information=new company_valuation_standalone($conn);
      $company_detail_meassage=$company_information->adding_company_valuation_detail();
      $_SESSION['company_valuation_detail_add_message']=$company_detail_meassage;
      header("Location: http://localhost/?act=add_company_valuation_detail");
      break;



    default:
        echo "you";
        echo "Sorry!!! something Went wrong!!!!";
}
?>
