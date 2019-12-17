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


    case 'company_management_information':
      require 'wt_project/Admin/model/admin_company_information_management.php';
      $company_information=new company_infromation_management($conn);
      $company_management_detail=$company_information->company_management_information();
      require 'wt_project/Admin/views/templates/company_management_information.php';
      break;

    case 'filter_by_company_Id':
      require 'wt_project/Admin/model/admin_company_information_management.php';
      $company_information=new company_infromation_management($conn);
      $company_management_detail=$company_information->search_by($act);
      require 'wt_project/Admin/views/templates/company_management_information.php';
      break;

    case 'edit_company_management_detail':
      require 'wt_project/Admin/model/admin_company_information_management.php';
      $company_information=new company_infromation_management($conn);
      $company_management_detail=$company_information->view_company_management_detail();
      //echo $company_management_detail[0]["Id"];
      require 'wt_project/Admin/views/templates/view_company_management_detail.php';
      break;

    case 'update_company_management_detail':
      require 'wt_project/Admin/model/admin_company_information_management.php';
      $company_information=new company_infromation_management($conn);
      $company_detail=$company_information->update_company_management_detail();
      $company_management_detail=$company_information->view_company_management_detail();
      $_SESSION['company_update_message']=$company_detail;
      require 'wt_project/Admin/views/templates/view_company_management_detail.php';
      break;

    case 'delete_comapny_management_detail':
      require 'wt_project/Admin/model/admin_company_information_management.php';
      $company_information_detail=new company_infromation_management($conn);
      $company_detail=$company_information_detail->delete_company_management_detail();
      $_SESSION['Company_management_delete_message']=$company_detail;
      header("Location: http://localhost/?act=company_management_information");
      break;

  //  case 'add_new_company_management_detail':
    //  require 'wt_project/Admin/views/templates/add_new_user_form.php';
      //break;

    case 'Adding_company_management_detail':
      require 'wt_project/Admin/model/admin_company_information_management.php';
      $company_information=new company_infromation_management($conn);
      $company_detail=$company_information->add_company_management_detail();
      $_SESSION['Company_management_add_message']=$company_detail;
      header("Location: http://localhost/?act=add_new_company_management_detail");
      break;

    default:
        //echo "you";
        echo "Sorry!!! something Went wrong!!!!";
}
?>
