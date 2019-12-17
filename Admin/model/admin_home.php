<?php
class user_infromation{

  function __construct($conn){
    $this->conn=$conn;
  }

  function user_detail(){
    $sql="SELECT * FROM user";
    $result = mysqli_query($this->conn, $sql);
    return $result;

  }

  function sort_by($act){
    $filter=$_POST['filter_by'];
    //echo $filter;
    //echo $act;
    if ($act=='filter_by_user_type') {
    //  echo "nn";
      $sql="SELECT * FROM user WHERE user_type='$filter' OR first_name='$filter' OR last_name= '$filter' OR email= '$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    elseif ($act='filter_by_email') {
      $sql="SELECT * FROM user WHERE first_name='$filter' OR last_name='$filter' ";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    else {
      $sql="SELECT * FROM user";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }

  }

  function view_detail(){
    if (!empty($_POST)) {
      $user_array=array();
      $array_field=array("Id","first_name","last_name","email","user_type","password");
      $user_id=$_POST['user_id'];
      //echo $user_id;
      $sql="SELECT * FROM user WHERE Id='$user_id' ";
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

  function update_user_detail(){
    if (!empty($_POST)) {
      $user_id=$_POST['user_id'];
      //echo $user_id;
      $first_name=$_POST['first_name'];
      $last_name=$_POST['last_name'];
      $email=$_POST['email'];
      $user_type=$_POST['user_type'];
      $password=$_POST['password'];

      $user_array=array();
      $array_field=array("Id","first_name","last_name","email","user_type","password");
      //echo $user_id;
      $sql1="SELECT * FROM user WHERE Id='$user_id' ";
      $result1 = mysqli_query($this->conn, $sql1);
      //return $result;
      while($row = $result1->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $user_array[]=$row[$array_field[$i]];
        }
      }

      $sql2 = "INSERT INTO user_history (user_id,first_name, last_name, email,user_type,password,action)
      VALUES ('$user_array[0]','$user_array[1]','$user_array[2]','$user_array[3]','$user_array[4]','$user_array[5]','updated')";
      $result2 = mysqli_query($this->conn, $sql2);

      $sql="UPDATE user SET first_name='$first_name',last_name='$last_name',email='$email',user_type='$user_type',password='$password' WHERE Id='$user_id' ";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="user data is Successfully Updated..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..user is not updated..";
        return $message;
      }
    }
  }

  function delete_user_detail(){
    if (!empty($_POST)) {
      $user_id=$_POST['user_id'];


      $user_array=array();
      $array_field=array("Id","first_name","last_name","email","user_type","password");
      //echo $user_id;
      $sql1="SELECT * FROM user WHERE Id='$user_id' ";
      $result1 = mysqli_query($this->conn, $sql1);
      //return $result;
      while($row = $result1->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $user_array[]=$row[$array_field[$i]];
        }
      }

      $sql2 = "INSERT INTO user_history (user_id,first_name, last_name, email,user_type,password,action)
      VALUES ('$user_array[0]','$user_array[1]','$user_array[2]','$user_array[3]','$user_array[4]','$user_array[5]','deleted')";
      $result2 = mysqli_query($this->conn, $sql2);

      if ($user_array[4]=="superadmin") {
        $message="Sorry This User cannot be deleted";
        return $message;
      }
      else {
        $sql="DELETE FROM user WHERE Id='$user_id' ";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
          $message="user data is Successfully Deleted..";
          return $message;
        }
        else {
          $message="Sorry something went wrong..user is not Deleted..";
          return $message;
        }
      }
    //  if(!$result1 and !$result2){
        //$message="not deleted";
        //return $message;
      //}
    }
  }

  function add_new_user(){
    if (!empty($_POST)) {
      $first_name=$_POST['first_name'];
      $last_name=$_POST['last_name'];
      $email=$_POST['email'];
      $user_type=$_POST['user_type'];
      $password=$_POST['password'];
      $sql = "INSERT INTO user (first_name, last_name, email,user_type,password)
      VALUES ('$first_name','$last_name','$email','$user_type','$password')";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="user  is Successfully Added..";
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
