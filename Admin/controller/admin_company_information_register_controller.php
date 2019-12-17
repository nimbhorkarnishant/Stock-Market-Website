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


    case 'company_registers_information':
      require 'wt_project/Admin/model/admin_company_information_register.php';
      $company_information=new company_infromation_register($conn);
      $company_register_detail=$company_information->company_register_information();
      require 'wt_project/Admin/views/templates/company_register_information.php';
      break;

    case 'filter_by_company_id':
      require 'wt_project/Admin/model/admin_company_information_register.php';
      $company_information=new company_infromation_register($conn);
      $company_register_detail=$company_information->search_by($act);
      require 'wt_project/Admin/views/templates/company_register_information.php';
      break;

    case 'filter_by_register_email':
      require 'wt_project/Admin/model/admin_company_information_register.php';
      $company_information=new company_infromation_register($conn);
      $company_register_detail=$company_information->search_by($act);
      require 'wt_project/Admin/views/templates/company_register_information.php';
      break;

    case 'edit_company_register_detail':
      require 'wt_project/Admin/model/admin_company_information_register.php';
      $company_information=new company_infromation_register($conn);
      $company_registers_details=$company_information->view_company_register_detail();
      require 'wt_project/Admin/views/templates/view_company_register_detail.php';
      break;

    case 'update_company_register_detail':
      require 'wt_project/Admin/model/admin_company_information_register.php';
      $company_information=new company_infromation_register($conn);
      $company_registers_details_message=$company_information->update_company_register_detail();
      $company_registers_details=$company_information->view_company_register_detail();
      $_SESSION['company_register_upadte_massage']=$company_registers_details_message;
      require 'wt_project/Admin/views/templates/view_company_register_detail.php';
      break;

    case 'delete_comapny_register_detail':
      require 'wt_project/Admin/model/admin_company_information_register.php';
      $company_information=new company_infromation_register($conn);
      $company_register_detail=$company_information->delete_company_register_detail();
      $_SESSION['Company_register_delete_add_message']=$company_register_detail;
      header("Location: http://localhost/?act=company_registers_information");
      break;

    //case 'add_new_company_register_detail':
      //require 'wt_project/Admin/views/templates/add_new_user_form.php';
      //break;

    case 'Adding_company_register_detail':
      require 'wt_project/Admin/model/admin_company_information_register.php';
      $company_information=new company_infromation_register($conn);
      $company_register_detail=$company_information->add_company_register_detail();
      $_SESSION['Company_register_add_message']=$company_register_detail;
      header("Location: http://localhost/?act=add_new_company_register_detail");
      break;

    default:
        //echo "you";
        echo "Sorry!!! something Went wrong!!!!";
}
?>
