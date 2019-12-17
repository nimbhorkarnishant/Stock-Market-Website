<?php
class company_infromation_basic {
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }

  function company_basic_information(){
    $sql="SELECT * FROM comapny_information_basic";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function search_by($act){
    $filter=$_POST['filter_by'];
    //echo $filter;
    //echo $act;
    if ($act=='filter_by_company_name') {
      //echo "nn";
      $sql="SELECT * FROM comapny_information_basic WHERE company_code='$filter' OR company_city='$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    elseif ($act='filter_by_email') {
      $sql="SELECT * FROM comapny_information_basic WHERE company_email='$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    else {
      $sql="SELECT * FROM comapny_information_basic";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }

  }

  function view_company_detail(){
    if (!empty($_POST)) {
      $user_array=array();
      $array_field=array("Id","company_name","company_address","company_city","company_state","company_pincode","company_telno","company_faxno","company_email","company_internet","company_overview","company_code");
      $comapny_id=$_POST['company_id'];
      //echo $comapny_id;
      $sql="SELECT * FROM comapny_information_basic WHERE Id='$comapny_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $user_array[]=$row[$array_field[$i]];
        }
      }
    //  echo $user_array[0];
      //echo $user_array[1];
      //echo $user_array[2];
      //echo $user_array[3];
      return $user_array;
    }

  }


  function update_company_basic_detail(){
    if (!empty($_POST)) {
      $company_id=$_POST['company_id'];
      //echo $user_id;
      $company_name=$_POST['company_name'];
      $company_address=$_POST['company_address'];
      $company_city=$_POST['company_city'];
      $company_state=$_POST['company_state'];
      $company_pincode=$_POST['company_pincode'];
      $company_telno=$_POST['company_telno'];
      $company_faxno=$_POST['company_faxno'];
      $company_email=$_POST['company_email'];
      $company_internet=$_POST['company_internet'];
      $company_overview=$_POST['company_overview'];

      $user_array=array();
      $array_field=array("Id","company_name","company_address","company_city","company_state","company_pincode","company_telno","company_faxno","company_email","company_internet","company_overview","company_code");
      //echo $comapny_id;
      $sql="SELECT * FROM comapny_information_basic WHERE Id='$company_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $user_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_information_basic_history (company_id,company_name, company_address, company_city,company_state,company_pincode,company_telno,company_faxno,company_email,company_internet,company_overview,company_code,action)
      VALUES ('$user_array[0]','$user_array[1]','$user_array[2]','$user_array[3]','$user_array[4]','$user_array[5]','$user_array[6]','$user_array[7]','$user_array[8]','$user_array[9]','$user_array[10]',
        '$user_array[11]','updated')";

      $result = mysqli_query($this->conn, $sql);

      $sql="UPDATE comapny_information_basic SET company_name='$company_name',company_address='$company_address',company_city='$company_city',company_state='$company_state',company_pincode='$company_pincode', company_telno='$company_telno', company_faxno='$company_faxno',company_email='$company_email',company_internet='$company_internet',company_overview='$company_overview' WHERE Id='$company_id' ";
      $result = mysqli_query($this->conn, $sql);

      if ($result) {
        $message="Company detail is Successfully Updated..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..company details is not updated..";
        return $message;
      }
    }
  }

  function delete_company_basic_detail(){
    if (!empty($_POST)) {
      $comapny_id=$_POST['company_id'];

      $user_array=array();
      $array_field=array("Id","company_name","company_address","company_city","company_state","company_pincode","company_telno","company_faxno","company_email","company_internet","company_overview","company_code");
      //echo $comapny_id;
      $sql="SELECT * FROM comapny_information_basic WHERE Id='$comapny_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $user_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_information_basic_history (company_id,company_name, company_address, company_city,company_state,company_pincode,company_telno,company_faxno,company_email,company_internet,company_overview,company_code,action)
      VALUES ('$user_array[0]','$user_array[1]','$user_array[2]','$user_array[3]','$user_array[4]','$user_array[5]','$user_array[6]','$user_array[7]','$user_array[8]','$user_array[9]','$user_array[10]',
        '$user_array[11]','deleted')";

      $result = mysqli_query($this->conn, $sql);

      $sql="DELETE FROM comapny_information_basic WHERE Id='$comapny_id' ";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Company details is Successfully Deleted..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..company detail is not Deleted..";
        return $message;
      }
    }
  }

  function add_company_basic_detail(){
    if (!empty($_POST)) {
      $company_name=$_POST['company_name'];
      $company_address=$_POST['company_address'];
      $company_city=$_POST['company_city'];
      $company_state=$_POST['company_state'];
      $company_pincode=$_POST['company_pincode'];
      $company_telno=$_POST['company_telno'];
      $company_faxno=$_POST['company_faxno'];
      $company_email=$_POST['company_email'];
      $company_internet=$_POST['company_internet'];
      $company_overview=$_POST['company_overview'];
      $company_code=$_POST['company_code'];

      $sql = "INSERT INTO comapny_information_basic (company_name, company_address, company_city,company_state,company_pincode,company_telno,company_faxno,company_email,company_internet,company_overview,company_code)
      VALUES ('$company_name','$company_address','$company_city','$company_state','$company_pincode','$company_telno','$company_faxno','$company_email','$company_internet','$company_overview','$company_code')";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Company Detail  is Successfully Added.. please go for next";
        return $message;
      }
      else {
        $message="Sorry something went wrong..user is not Added..";
        return $message;
      }
    }
  }



}



?>
