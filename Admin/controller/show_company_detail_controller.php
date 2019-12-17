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

    case 'show_company_detail':
      require 'wt_project/Admin/model/show_company_detail_model.php';
      $company_detail=new show_company_detail($conn);
      $view_company_detail=$company_detail->view_company_detail();
      $view_company_register_detail=$company_detail->view_company_register_detail();
      $view_company_management_detail=$company_detail->view_company_management_detail();
      $view_company_valuation_detail=$company_detail->view_company_valuation_detail();
      $view_company_finanacial_detail=$company_detail->view_company_finanacial_detail();
			require 'wt_project/Admin/views/templates/user_show_company_detail.php';
			break;

    case 'add_company_detail_home':
      require 'wt_project/Admin/views/templates/add_company_all_detail_home.php';
      break;

    case 'show_user_history_information':
      require 'wt_project/Admin/model/show_company_detail_model.php';
      $company_detail=new show_company_detail($conn);
      $user_detail=$company_detail->user_information_history();
      require 'wt_project/Admin/views/templates/user_information_history.php';
      break;

    case 'show_company_basic_information_history':
      require 'wt_project/Admin/model/show_company_detail_model.php';
      $company_detail=new show_company_detail($conn);
      $user_detail=$company_detail->company_basic_information_history();
      require 'wt_project/Admin/views/templates/company_basic_information_history.php';
      break;

    case 'show_company_register_information_history':
      require 'wt_project/Admin/model/show_company_detail_model.php';
      $company_detail=new show_company_detail($conn);
      $user_details=$company_detail->company_register_information_history();
      require 'wt_project/Admin/views/templates/company_register_information_history.php';
      break;

    case 'show_company_management_information_history':
      require 'wt_project/Admin/model/show_company_detail_model.php';
      $company_detail=new show_company_detail($conn);
      $user_detail=$company_detail->company_management_information_history();
      require 'wt_project/Admin/views/templates/company_management_information_history.php';
      break;

    case 'show_company_valuation_information_history':
      require 'wt_project/Admin/model/show_company_detail_model.php';
      $company_detail=new show_company_detail($conn);
      $user_detail=$company_detail->company_valuation_information_history();
      require 'wt_project/Admin/views/templates/company_valuation_information_history.php';
      break;

    case 'show_company_financial_information_history':
      require 'wt_project/Admin/model/show_company_detail_model.php';
      $company_detail=new show_company_detail($conn);
      $user_detail=$company_detail->company_financial_information_history();
      require 'wt_project/Admin/views/templates/company_finanacial_information_history.php';
      break;



    default:
        echo "Sorry!!! something Went wrong!!!!";
}
?>
