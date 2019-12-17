<?php

class user_login {
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }

  function login_validation(){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $message="";
    //echo $email;
    //echo $password;

    if (empty($email) and empty($password) ){
      $message="Give input something!!!";
      return $message;
    }
    else {
      define('Id', 'Id');
      define('user_type','user_type');
      $sql = "SELECT * FROM user WHERE email='$email' AND password='$password' ";
      $result = mysqli_query($this->conn, $sql);
      $count=mysqli_num_rows($result);
      if ($count==0) {
        $message="Sorry!! Incorrect Email and Password";
        return $message;
      }
      else {
        $row = $result->fetch_assoc();
        $message="You logging Successfully!!!";
        $_SESSION['user_id']=$row[Id];
        $_SESSION['user_type']=$row[user_type];
        return $message;
      }
    }

  }

  function logout(){
    $message='';
    define('user_id','user_id');
    define('user_type','user_type');
    if (isset($_SESSION[user_id]) or isset($_SESSION[user_type]) ) {
      session_destroy();
      unset($_SESSION['user_id']);
      unset($_SESSION['user_type']);
      $message="You logout Successfully";
      return $message;
    }
    else {
      $message="You already logout form our platform...Please login";
      return $message;
    }
  }

  function forgot_password(){
    define('Id','Id');
    define('first_name','first_name');
    define('last_name','last_name');
    if (!empty($_POST)) {
      $email=$_POST['email'];
      $sql="SELECT * FROM user WHERE email='$email'";
      $result = mysqli_query($this->conn, $sql);
      $count=mysqli_num_rows($result);
      if ($count==0) {
        $message="Sorry Please Check Your Email Address.This Email Address is not exist in our platform..Kindly first register..";
        return $message;
      }
      else {
        $row = $result->fetch_assoc();

        $_SESSION['user_id']=$row[Id];

        require 'wt_project/phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'abc@gmail.com';                 // SMTP username
        $mail->Password = 'password';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->addAddress($email);     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        //function otp generator
        $mail->Subject = 'Password Reset Mail';
        $mail->Body    = "Hi!"." ".$row[first_name]." ".$row[last_name]." "."You can reset the password By clicking following link"." ".'<b><a href="http://localhost?act=reset_password">Reset Password</a></b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
          //echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        else {
          echo 'Further Instruction is send to your Email.Thank you!!';
        }

      }

    }
  }

  function adding_favourite_stock(){
    if (!empty($_POST)) {
      $user_id=$_SESSION['user_id'];
      //$company_name=$_REQUEST['company_name'];
      $compnay_name_code=$_POST['company_name_code'];
      $parts = explode("&", $compnay_name_code);
      $sql="INSERT INTO user_favourite_stock(user_id,company_name,company_code) VALUES ('$user_id','$parts[0]','$parts[1]')";
      $result = mysqli_query($this->conn, $sql);
      if ($result) {
        $message="Your Favourite stock is added Successfully!!";
        return $message;
      }
      else{
        $message="your Favourite Stock is already in list";
        return $message;
      }
    }

  }

  function display_favourite_stock(){
      $id=$_SESSION['user_id'];
      $sql="SELECT * FROM user_favourite_stock WHERE user_id='$id' ";
      $result = mysqli_query($this->conn, $sql);
      return $result;
  }

  function reset_password(){
    define('user_id','user_id');
    if (!empty($_POST)) {
      $password1=$_POST['password1'];
      $password2=$_POST['password2'];
      if ($password1==$password2) {
        $user_id=$_SESSION['user_id'];
        $sql="UPDATE user SET password=$password1 WHERE Id=$user_id";
        $result = mysqli_query($this->conn, $sql);
        if ($result){
          $message="Your Password is Successfully Reset..";
          session_destroy();
          unset($_SESSION['user_id']);
          return $message;

        }
        else{
          $message="Sorry!!Something went wrong...";
          session_destroy();
          unset($_SESSION['user_id']);
          return $message;
        }


      }
      else {
        $message="Enter Password is Dosn't Matched...";
        return $message;
      }
    }
  }

}


 ?>
