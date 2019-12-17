<?php
class company_financial_standalone {
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }

  function company_financial_standalone_information(){
    $sql="SELECT * FROM company_financial_standalone";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function search_by($act){
    $filter=$_POST['filter_by'];
    //echo $filter;
    //echo $act;
    if ($act=='filter_by_company_finanace_id') {
      //echo "nn";
      $sql="SELECT * FROM company_financial_standalone WHERE company_id='$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    else {
      $sql="SELECT * FROM company_financial_standalone";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }

  }

  function view_company_finanacial_detail(){
    if (!empty($_POST)) {
      $finanace_array=array();
      $financial_id=$_POST['financial_id'];
      //echo $comapny_id;
      $sql="SELECT * FROM company_financial_standalone WHERE company_id='$financial_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        $finanace_array[]=array( "Id"=>$row['Id'],
                                      "company_id"=>$row['company_id'],
                                      "finance_field"=>$row['finance_field'],
                                      "quarter1"=>$row['quarter1'],
                                      "quarter2"=>$row['quarter2'],
                                      "quarter3"=>$row['quarter3'],
                                      "quarter4"=>$row['quarter4'],
                                      "quarter5"=>$row['quarter5'],
                                    );

      }
    //  echo $user_array[0];
      //echo $user_array[1];
      //echo $user_array[2];
      //echo $user_array[3];
       return $finanace_array;

    }

  }


  function update_company_financial_detail(){
    if (!empty($_POST)) {
      $financial_id=$_POST['financial_id'];
      $comapny_id=$_POST['company_id'];
      //echo $user_id;
      $finance_field=$_POST['finance_field'];
      $quarter1=$_POST['quarter1'];
      $quarter2=$_POST['quarter2'];
      $quarter3=$_POST['quarter3'];
      $quarter4=$_POST['quarter4'];
      $quarter5=$_POST['quarter5'];

      $finanace_array=array();
      $array_field=array("Id","company_id","finance_field","quarter1","quarter2","quarter3","quarter4","quarter5");

      //echo $comapny_id;
      $sql="SELECT * FROM company_financial_standalone WHERE Id='$financial_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $finanace_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_financial_history (financial_id,company_id, finance_field, quarter1,quarter2,quarter3,quarter4,quarter5,action)
      VALUES ('$finanace_array[0]','$finanace_array[1]','$finanace_array[2]','$finanace_array[3]','$finanace_array[4]','$finanace_array[5]','$finanace_array[6]','$finanace_array[7]','updated')";
      $result = mysqli_query($this->conn, $sql);



      $sql="UPDATE company_financial_standalone SET  company_id='$comapny_id',finance_field='$finance_field',quarter1='$quarter1',quarter2='$quarter2',quarter3='$quarter3',quarter4='$quarter4', quarter5='$quarter5' WHERE Id='$financial_id' ";
      $result = mysqli_query($this->conn, $sql);

      if ($result) {
        $message="Company Financial detail is Successfully Updated..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..company Financial details is not updated..";
        return $message;
      }
    }
  }

  function delete_company_valuation_detail(){
    if (!empty($_POST)) {
      $financial_id=$_POST['financial_id'];

      $finanace_array=array();
      $array_field=array("Id","company_id","finance_field","quarter1","quarter2","quarter3","quarter4","quarter5");

      //echo $comapny_id;
      $sql="SELECT * FROM company_financial_standalone WHERE Id='$financial_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $finanace_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_financial_history (financial_id,company_id, finance_field, quarter1,quarter2,quarter3,quarter4,quarter5,action)
      VALUES ('$finanace_array[0]','$finanace_array[1]','$finanace_array[2]','$finanace_array[3]','$finanace_array[4]','$finanace_array[5]','$finanace_array[6]','$finanace_array[7]','deleted')";
      $result = mysqli_query($this->conn, $sql);


      $sql="DELETE FROM company_financial_standalone WHERE Id='$financial_id' ";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Company Financial details is Successfully Deleted..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..company Financial detail is not Deleted..";
        return $message;
      }
    }
  }

  function adding_company_financial_detail(){
    if (!empty($_POST)) {
      $company_id=$_POST['company_id'];
      //echo $user_id;
      $finance_field=$_POST['finance_field'];
      $quarter1=$_POST['quarter1'];
      $quarter2=$_POST['quarter2'];
      $quarter3=$_POST['quarter3'];
      $quarter4=$_POST['quarter4'];
      $quarter5=$_POST['quarter5'];

      $sql = "INSERT INTO company_financial_standalone (company_id, finance_field, quarter1,quarter2,quarter3,quarter4,quarter5)
      VALUES ('$company_id','$finance_field','$quarter1','$quarter2','$quarter3','$quarter4','$quarter5')";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Company Financial Detail  is Successfully Added.. please go for next";
        return $message;
      }
      else {
        $message="Sorry something went wrong..Financial Detail is not Added..";
        return $message;
      }
    }
  }



}



?>
