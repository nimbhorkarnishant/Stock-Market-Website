<?php
class company_infromation_register {
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }

  function company_register_information(){
    $sql="SELECT * FROM company_information_registers";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function search_by($act){
    $filter=$_POST['filter_by'];
  //  echo $filter;
    //echo $act;
    if ($act=='filter_by_company_id') {
      //echo "nn";
      $sql="SELECT * FROM company_information_registers WHERE company_id='$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    elseif ($act='filter_by_email') {
      $sql="SELECT * FROM company_information_registers WHERE register_email='$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    else {
      $sql="SELECT * FROM company_information_registers";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }

  }

  function view_company_register_detail(){
    if (!empty($_POST)) {
      $view_company_register_detail_array=array();
      $array_field=array("Id","company_id","register_name","register_address","register_city","register_state","register_telno","register_faxno","register_email","register_internet");
      $registers_id=$_POST['registers_id'];
      //echo $user_id;
      $sql="SELECT * FROM company_information_registers WHERE Id='$registers_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $view_company_register_detail_array[]=$row[$array_field[$i]];
        }
      }
    //  echo $user_array[0];
      //echo $user_array[1];
      //echo $user_array[2];
      //echo $user_array[3];
      return $view_company_register_detail_array;
    }

  }


  function update_company_register_detail(){
    if (!empty($_POST)) {
      $registers_id=$_POST['registers_id'];
      //echo $user_id;
      $company_id=$_POST['company_id'];
      $register_name=$_POST['register_name'];
      $register_address=$_POST['register_address'];
      $register_city=$_POST['register_city'];
      $register_state=$_POST['register_state'];
      $register_telno=$_POST['register_telno'];
      $register_faxno=$_POST['register_faxno'];
      $register_email=$_POST['register_email'];
      $register_internet=$_POST['register_internet'];

      $register_array=array();
      $array_field=array("Id","company_id","register_name","register_address","register_city","register_state","register_telno","register_faxno","register_email","register_internet");
      //echo $user_id;
      $sql="SELECT * FROM company_information_registers WHERE Id='$registers_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $register_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_register_history (register_id,company_id ,register_name,register_address, register_city, register_state,register_telno,register_faxno,register_email,register_internet,action)
      VALUES ('$register_array[0]','$register_array[1]','$register_array[2]','$register_array[3]','$register_array[4]','$register_array[5]','$register_array[6]','$register_array[7]','$register_array[8]','$register_array[9]','updated')";
      $result = mysqli_query($this->conn, $sql);

      $sql="UPDATE company_information_registers SET company_id='$company_id',register_name='$register_name',register_address='$register_address',register_city='$register_city',register_state='$register_state',register_telno='$register_telno',register_faxno='$register_faxno', register_email='$register_email', register_internet='$register_internet' WHERE Id='$registers_id' ";
      $result = mysqli_query($this->conn, $sql);

      if ($result) {
        $message="Registers detail is Successfully Updated..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..Registers detail is not updated..";
        return $message;
      }
    }
  }

  function delete_company_register_detail(){
    if (!empty($_POST)) {
      $register_id=$_POST['register_id'];

      $register_array=array();
      $array_field=array("Id","company_id","register_name","register_address","register_city","register_state","register_telno","register_faxno","register_email","register_internet");
      //echo $user_id;
      $sql="SELECT * FROM company_information_registers WHERE Id='$register_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $register_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_register_history (register_id,company_id ,register_name,register_address, register_city, register_state,register_telno,register_faxno,register_email,register_internet,action)
      VALUES ('$register_array[0]','$register_array[1]','$register_array[2]','$register_array[3]','$register_array[4]','$register_array[5]','$register_array[6]','$register_array[7]','$register_array[8]','$register_array[9]','deleted')";
      $result = mysqli_query($this->conn, $sql);

      $sql="DELETE FROM company_information_registers WHERE Id='$register_id' ";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Registers Detail is Successfully Deleted..";
        return $message;
      }
      else {
        $message="Sorry something went wrong.. Registers Detail is not Deleted..";
        return $message;
      }
    }
  }

  function add_company_register_detail(){
    if (!empty($_POST)) {
      $company_id=$_POST['company_id'];
      $register_name=$_POST['register_name'];
      $register_address=$_POST['register_address'];
      $register_city=$_POST['register_city'];
      $register_state=$_POST['register_state'];
      $register_telno=$_POST['register_telno'];
      $register_faxno=$_POST['register_faxno'];
      $register_email=$_POST['register_email'];
      $register_internet=$_POST['register_internet'];

      $sql = "INSERT INTO company_information_registers (company_id ,register_name,register_address, register_city, register_state,register_telno,register_faxno,register_email,register_internet)
      VALUES ('$company_id','$register_name','$register_address','$register_city','$register_state','$register_telno','$register_faxno','$register_email','$register_internet')";
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
