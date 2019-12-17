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

    case 'company_Financial_information':
      require 'wt_project/Admin/model/admin_company_financial_standlone.php';
      $company_information=new company_financial_standalone($conn);
      $company_financial_detail=$company_information->company_financial_standalone_information();
      //echo $company_detail;
			require 'wt_project/Admin/views/templates/company_financial_detail.php';
			break;

    case 'filter_by_company_finanace_id':
      require 'wt_project/Admin/model/admin_company_financial_standlone.php';
      $company_information=new company_financial_standalone($conn);
      $company_financial_detail=$company_information->search_by($act);
      //echo $company_detail;
      require 'wt_project/Admin/views/templates/company_financial_detail.php';
      break;



    case 'view_company_finanacial_detail':
      require 'wt_project/Admin/model/admin_company_financial_standlone.php';
      $company_information=new company_financial_standalone($conn);
      $company_financial_detail=$company_information->view_company_finanacial_detail();
      //echo $company_detail;
      require 'wt_project/Admin/views/templates/view_company_financial_standalone_detail.php';
      break;


    case 'update_comapny_financial_detail':
      require 'wt_project/Admin/model/admin_company_financial_standlone.php';
      $company_information=new company_financial_standalone($conn);
      $company_financial_detail_update_message=$company_information->update_company_financial_detail();
      //$company_financial_detail=$company_information->view_company_finanacial_detail();
      //echo $company_detail;
      $_SESSION['company_financial_detail_update_message']=$company_financial_detail_update_message;
      header("Location: http://localhost/?act=view_company_finanacial_detail");
      break;

    case 'delete_company_financial_detail':
      require 'wt_project/Admin/model/admin_company_financial_standlone.php';
      $company_information=new company_financial_standalone($conn);
      $company_valuation_detail_del_add_message=$company_information->delete_company_valuation_detail();
      $_SESSION['company_valuation_detail_update_message']=$company_valuation_detail_del_add_message;
      header("Location: http://localhost/?act=company_Financial_information");
      break;

    //case 'add_new_company_detail':
      //require 'wt_project/Admin/views/templates/add_new_user_form.php';
      //break;

    case 'adding_company_financial_detail':
      require 'wt_project/Admin/model/admin_company_financial_standlone.php';
      $company_information=new company_financial_standalone($conn);
      $company_valuation_detail_del_add_message=$company_information->adding_company_financial_detail();
      $_SESSION['company_financial_detail_add_message']=$company_valuation_detail_del_add_message;
      header("Location: http://localhost/?act=add_company_financial_detail");
      break;



    default:
        echo "you";
        echo "Sorry!!! something Went wrong!!!!";
}
?>
