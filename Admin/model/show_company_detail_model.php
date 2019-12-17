<?php
class show_company_detail {
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }

  function view_company_detail(){
    if (isset($_SESSION['user_id'])) {
      $user_array=array();
      $array_field=array("Id","company_name","company_address","company_city","company_state","company_pincode","company_telno","company_faxno","company_email","company_internet","company_overview","company_code");
      //echo $comapny_id;
      $company_code=$_SESSION['company_code'];
      //echo $company_code;
      $sql="SELECT * FROM comapny_information_basic WHERE company_code='$company_code' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      if ($result) {
          while($row = $result->fetch_assoc()) {
            for ($i=0; $i <sizeof($array_field) ; $i++) {
              $user_array[]=$row[$array_field[$i]];
            }
          }
        //  echo $user_array[0];
          //echo $user_array[1];
          //echo $user_array[2];
          //echo $user_array[3];
          $_SESSION['show_company_detail_id']=$user_array[0];
          //echo $_SESSION['show_company_detail_id'];
          return $user_array;
      }
      else {
        //$_SESSION['co']=$company_code;

        $_SESSION['show_user_data_message']="Sorry this company is not yet register..We will add soon";
        header("Location: http://localhost/?act=home");

      }
    }
    else {
      $_SESSION['no_login_message']="Sorry for this feature you have to login first!!!!";
      header("Location: http://localhost/?act=home");
    }


  }

  function view_company_register_detail(){
      $view_company_register_detail_array=array();
      $array_field=array("Id","company_id","register_name","register_address","register_city","register_state","register_telno","register_faxno","register_email","register_internet");
      $registers_id=$_SESSION['show_company_detail_id'];
      //echo $user_id;
      $sql="SELECT * FROM company_information_registers WHERE company_id='$registers_id' ";
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

  function view_company_management_detail(){
      $view_company_register_detail_array=array();
      $management_array=array();
      $array_field=array("Id","company_id","name","designation");
      $management_id=$_SESSION['show_company_detail_id'];
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
  function view_company_valuation_detail(){
      $user_array=array();
      $array_field=array("Id","company_id","market_cap","p_per_e","book_value","dividend","market_lot","industry_p_per_e","eps","p_per_c","price_per_book","dividend_yield","face_value","deliverables");
      $valuation_id=$_SESSION['show_company_detail_id'];
      //echo $comapny_id;
      $sql="SELECT * FROM company_valuation_standalone WHERE company_id='$valuation_id' ";
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

  function view_company_finanacial_detail(){
      $finanace_array=array();
      $financial_id=$_SESSION['show_company_detail_id'];
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
  function user_information_history(){
    $sql="SELECT * FROM user_history";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function company_basic_information_history(){
    $sql="SELECT * FROM company_information_basic_history";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function company_register_information_history(){
    $sql="SELECT * FROM company_register_history";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function company_management_information_history(){
    $sql="SELECT * FROM company_management_detail_history";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function company_valuation_information_history(){
    $sql="SELECT * FROM company_valuation_history";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function company_financial_information_history(){
    $sql="SELECT * FROM company_financial_history";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

}
?>
