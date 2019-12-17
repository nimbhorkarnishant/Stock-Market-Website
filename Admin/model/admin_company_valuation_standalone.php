<?php
class company_valuation_standalone {
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }

  function company_valuation_standalone_information(){
    $sql="SELECT * FROM company_valuation_standalone";
    $result = mysqli_query($this->conn, $sql);
    return $result;
  }

  function search_by($act){
    $filter=$_POST['filter_by'];
    //echo $filter;
    //echo $act;
    if ($act=='filter_by_company_valuation_id') {
      //echo "nn";
      $sql="SELECT * FROM company_valuation_standalone WHERE company_id='$filter'";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }
    else {
      $sql="SELECT * FROM company_valuation_standalone";
      $result = mysqli_query($this->conn, $sql);
      return $result;
    }

  }

  function view_company_valuation_detail(){
    if (!empty($_POST)) {
      $user_array=array();
      $array_field=array("Id","company_id","market_cap","p_per_e","book_value","dividend","market_lot","industry_p_per_e","eps","p_per_c","price_per_book","dividend_yield","face_value","deliverables");
      $valuation_id=$_POST['valuation_id'];
      //echo $comapny_id;
      $sql="SELECT * FROM company_valuation_standalone WHERE Id='$valuation_id' ";
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


  function update_company_valuation_detail(){
    if (!empty($_POST)) {
      $valuation_id=$_POST['valuation_id'];
      $comapny_id=$_POST['company_id'];
      //echo $user_id;
      $market_cap=$_POST['market_cap'];
      $p_per_e=$_POST['p_per_e'];
      $book_value=$_POST['book_value'];
      $dividend=$_POST['dividend'];
      $market_lot=$_POST['market_lot'];
      $industry_p_per_e=$_POST['industry_p_per_e'];
      $eps=$_POST['eps'];
      $p_per_c=$_POST['p_per_c'];
      $price_per_book=$_POST['price_per_book'];
      $dividend_yield=$_POST['dividend_yield'];
      $face_value=$_POST['face_value'];
      $deliverables=$_POST['deliverables'];

      $user_array=array();
      $array_field=array("Id","company_id","market_cap","p_per_e","book_value","dividend","market_lot","industry_p_per_e","eps","p_per_c","price_per_book","dividend_yield","face_value","deliverables");
      //echo $comapny_id;
      $sql="SELECT * FROM company_valuation_standalone WHERE Id='$valuation_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $user_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_valuation_history (valuation_id	,company_id, market_cap, p_per_e,book_value,dividend,market_lot,
        industry_p_per_e,eps,p_per_c,price_per_book,dividend_yield,face_value,deliverables,action)
      VALUES ('$user_array[0]','$user_array[1]','$user_array[2]','$user_array[3]','$user_array[4]','$user_array[5]','$user_array[6]','$user_array[7]','$user_array[8]','$user_array[9]','$user_array[10]','$user_array[11]',
        '$user_array[12]','$user_array[13]','updated')";
      $result = mysqli_query($this->conn, $sql);



      $sql="UPDATE company_valuation_standalone SET  company_id='$comapny_id',market_cap='$market_cap',p_per_e='$p_per_e',book_value='$book_value',dividend='$dividend',market_lot='$market_lot', industry_p_per_e='$industry_p_per_e', eps='$eps',p_per_c='$p_per_c',price_per_book='$price_per_book',
      dividend_yield='$dividend_yield',face_value='$face_value',deliverables='$deliverables'  WHERE Id='$valuation_id' ";
      $result = mysqli_query($this->conn, $sql);

      if ($result) {
        $message="Company valuation detail is Successfully Updated..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..company valuation details is not updated..";
        return $message;
      }
    }
  }

  function delete_company_valuation_detail(){
    if (!empty($_POST)) {
      $valuation_id=$_POST['valuation_id'];

      $user_array=array();
      $array_field=array("Id","company_id","market_cap","p_per_e","book_value","dividend","market_lot","industry_p_per_e","eps","p_per_c","price_per_book","dividend_yield","face_value","deliverables");
      //echo $comapny_id;
      $sql="SELECT * FROM company_valuation_standalone WHERE Id='$valuation_id' ";
      $result = mysqli_query($this->conn, $sql);
      //return $result;
      while($row = $result->fetch_assoc()) {
        for ($i=0; $i <sizeof($array_field) ; $i++) {
          $user_array[]=$row[$array_field[$i]];
        }
      }

      $sql = "INSERT INTO company_valuation_history (valuation_id	,company_id, market_cap, p_per_e,book_value,dividend,market_lot,
        industry_p_per_e,eps,p_per_c,price_per_book,dividend_yield,face_value,deliverables,action)
      VALUES ('$user_array[0]','$user_array[1]','$user_array[2]','$user_array[3]','$user_array[4]','$user_array[5]','$user_array[6]','$user_array[7]','$user_array[8]','$user_array[9]','$user_array[10]','$user_array[11]',
        '$user_array[12]','$user_array[13]','deleted')";
      $result = mysqli_query($this->conn, $sql);

      $sql="DELETE FROM company_valuation_standalone WHERE Id='$valuation_id' ";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Company valuation details is Successfully Deleted..";
        return $message;
      }
      else {
        $message="Sorry something went wrong..company valuation detail is not Deleted..";
        return $message;
      }
    }
  }

  function adding_company_valuation_detail(){
    if (!empty($_POST)) {
      $comapny_id=$_POST['company_id'];
      //echo $user_id;
      $market_cap=$_POST['market_cap'];
      $p_per_e=$_POST['p_per_e'];
      $book_value=$_POST['book_value'];
      $dividend=$_POST['dividend'];
      $market_lot=$_POST['market_lot'];
      $industry_p_per_e=$_POST['industry_p_per_e'];
      $eps=$_POST['eps'];
      $p_per_c=$_POST['p_per_c'];
      $price_per_book=$_POST['price_per_book'];
      $dividend_yield=$_POST['dividend_yield'];
      $face_value=$_POST['face_value'];
      $deliverables=$_POST['deliverables'];

      $sql = "INSERT INTO company_valuation_standalone (company_id, market_cap, p_per_e,book_value,dividend,market_lot,industry_p_per_e,eps,p_per_c,price_per_book,dividend_yield,face_value,deliverables)
      VALUES ('$comapny_id','$market_cap','$p_per_e','$book_value','$dividend','$market_lot','$industry_p_per_e','$eps','$p_per_c','$price_per_book','$dividend_yield','$face_value','$deliverables')";
      $result = mysqli_query($this->conn, $sql);

      if ($result) {
        $message="Company valuation Detail  is Successfully Added.. please go for next";
        return $message;
      }
      else {
        $message="Sorry something went wrong..Company valuation  detail is not Added..";
        return $message;


      }
    }
  }
}



?>
