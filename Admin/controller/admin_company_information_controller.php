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

    case 'company_informations':
      require 'wt_project/Admin/model/admin_company_information_basic.php';
      $company_information=new company_infromation_basic($conn);
      $company_detail=$company_information->company_basic_information();
      //echo $company_detail;
			require 'wt_project/Admin/views/templates/company_information.php';
			break;

    case 'filter_by_company_name':
      require 'wt_project/Admin/model/admin_company_information_basic.php';
      $company_information=new company_infromation_basic($conn);
      $company_detail=$company_information->search_by($act);
      require 'wt_project/Admin/views/templates/company_information.php';
      break;

    case 'filter_by_company_email':
      require 'wt_project/Admin/model/admin_company_information_basic.php';
      $company_information=new company_infromation_basic($conn);
      $company_detail=$company_information->search_by($act);
      require 'wt_project/Admin/views/templates/company_information.php';
      break;

    case 'view_company_detail':
      require 'wt_project/Admin/model/admin_company_information_basic.php';
      $company_information=new company_infromation_basic($conn);
      $company_detail=$company_information->view_company_detail();
      require 'wt_project/Admin/views/templates/view_company_detail.php';
      break;


    case 'update_company_detail':
      require 'wt_project/Admin/model/admin_company_information_basic.php';
      $company_information=new company_infromation_basic($conn);
      $company_detail_meassage=$company_information->update_company_basic_detail();
//      $company_detail=$company_information->view_company_detail();
      $_SESSION['Company_update_message']=$company_detail_meassage;
      header("Location: http://localhost/?act=view_company_detail");
      break;

    case 'delete_comapny_detail':
      require 'wt_project/Admin/model/admin_company_information_basic.php';
      $company_information=new company_infromation_basic($conn);
      $company_detail_meassage=$company_information->delete_company_basic_detail();
      $_SESSION['Company_delete_add_message']=$company_detail_meassage;
      header("Location: http://localhost/?act=company_informations");
      break;

    //case 'add_new_company_detail':
      //require 'wt_project/Admin/views/templates/add_company_information_basic.php';
      //break;

    case 'Adding_company_detail':
      require 'wt_project/Admin/model/admin_company_information_basic.php';
      $company_information=new company_infromation_basic($conn);
      $company_detail_meassage=$company_information->add_company_basic_detail();
      $_SESSION['Company_detail_add_message']=$company_detail_meassage;
      header("Location: http://localhost/?act=add_new_company_detail");
      break;

    default:
        echo "you";
        echo "Sorry!!! something Went wrong!!!!";
}
?>
