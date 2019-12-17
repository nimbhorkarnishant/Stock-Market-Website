<?php
class company_infromation_management {
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }

  function company_management_information(){
    $sql="SELECT * FROM company_information_management";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function search_by($act){
    $filter=$_POST['filter_by'];
    echo $filter;
    echo $act;
    if ($act=='filter_by_company_Id') {
      //echo "nn";
      $sql="SELECT * FROM company_information_management WHERE company_id='$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    else {
      $sql="SELECT * FROM company_information_management";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }

  }

  function view_company_management_detail(){
    if (!empty($_POST)) {
      $view_company_register_detail_array=array();
      $management_array=array();
      $array_field=array("Id","company_id","name","designation");
      $management_id=$_POST['management_id'];
      //echo $user_id;
      $sql="SELECT * FROM company_information_management WHERE company_id='$management_id' ";
      $result = mysqli_query($this->conn, $sql);

      while($row = $result->fetch_assoc()) {
        $management_array[]=array( "Id"=>$row['Id'],
                                      "company_id"=>$row['company_id'],
                                      "name"=>$row['name'],
                                      "designation"=>$row['designation'],
                                    );

      }
    //  echo $user_array[0];
      //echo $user_array[1];
      //echo $user_array[2];
      //echo $user_array[3];
       return $management_array;

    }

  }


  function update_company_management_detail(){
    if (!empty($_POST)) {
      $management_id=$_POST['management_id'];
      //echo $user_id;
      $company_id=$_POST['company_id'];
      $name=$_POST['name'];
      $designation=$_POST['designation'];

      $management_array=array();
      $array_field=array("Id","company_id","name","designation");
      //echo $user_id;
      $sql="SELECT * FROM company_information_management WHERE Id='$management_id' ";
      $result = mysqli_query($this->conn, $sql);

      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $management_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_management_detail_history (management_id,company_id ,name, designation,action)
      VALUES ('$management_array[0]','$management_array[1]','$management_array[2]','$management_array[3]','updated')";
      $result = mysqli_query($this->conn, $sql);


      $sql="UPDATE company_information_management SET company_id='$company_id',name='$name',designation='$designation' WHERE Id='$management_id' ";
      $result = mysqli_query($this->conn, $sql);

      if ($result) {
        $message="Management Information is Successfully Updated..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..Management Information is not updated..";
        return $message;
      }
    }
  }

  function delete_company_management_detail(){
    if (!empty($_POST)) {
      $management_id=$_POST['management_id'];

      $management_array=array();
      $array_field=array("Id","company_id","name","designation");
      //echo $user_id;
      $sql="SELECT * FROM company_information_management WHERE Id='$management_id' ";
      $result = mysqli_query($this->conn, $sql);

      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $management_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_management_detail_history (management_id,company_id ,name, designation,action)
      VALUES ('$management_array[0]','$management_array[1]','$management_array[2]','$management_array[3]','deleted')";
      $result = mysqli_query($this->conn, $sql);

      $sql="DELETE FROM company_information_management WHERE Id='$management_id' ";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message=" management Data is Successfully Deleted..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..management detail is not Deleted..";
        return $message;
      }
    }
  }

  function add_company_management_detail(){
    if (!empty($_POST)) {
      $company_id=$_POST['company_id'];
      $name=$_POST['name'];
      $designation=$_POST['designation'];

      $sql = "INSERT INTO company_information_management (company_id ,name, designation)
      VALUES ('$company_id','$name','$designation')";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Company Management Detail  is Successfully Added.. please go for next";
        return $message;
      }
      else {
        $message="Sorry something went wrong..Company Management is not Added..";
        return $message;
      }
    }
  }



}



?>
