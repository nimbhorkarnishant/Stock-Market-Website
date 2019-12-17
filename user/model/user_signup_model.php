<?php

class user_signup{
  // Constructor
  function __construct($conn){
    $this->conn=$conn;
  }


  function generateNumericOTP() {
    $n=6;
    $generator = "1357902468";

    $result = "";

    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    $_SESSION['otp']=$result;
    // Return result
    return $result;

  }



  function email_verification($toemail){
    require 'wt_project/phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'wtproject1122@gmail.com';                 // SMTP username
    $mail->Password = 'wtproject@12345';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('wtproject.org', 'WT Project');
    $mail->addAddress($toemail);     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    //function otp generator

    $otp=$this->generateNumericOTP();
    $mail->Subject = 'Email Verifications Mail';
    $mail->Body    = 'Your 6 Digit OTP Code is <b>'.$otp.'</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
      //echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else {
      $_SESSION['otp_message']='OTP is Successfully sent...';
    }
    //wtproject@12345
    //wtproject1122@gmail.com

  }


  function registering_user(){
    if (!empty($_POST)){
      $first_name=$_POST['first_name'];
      //echo $first_name;
      $last_name=$_POST['last_name'];
      //echo $last_name;
      $email=$_POST['email'];
      //echo $email;
      $password1=$_POST['password'];
      $password2=$_POST['password2'];
      $user_type='user';
      $message='';
      if (!empty($password1) and !empty($password2)){
        if ($password1==$password2){
          $sql="SELECT * FROM user WHERE email='$email' ";
          $result = mysqli_query($this->conn, $sql);
          $count=mysqli_num_rows($result);

          if ($count==1) {
            $message='Sorry Your Email Address is already exists!!!please check it';
          }
          else {
            $_SESSION['first_name']=$first_name;
            $_SESSION['last_name']=$last_name;
            $_SESSION['email']=$email;
            $_SESSION['user_type']='user';
            $_SESSION['password']=$password1;

            $this->email_verification($email);
            $message="OTP is send to your Email please confirm your email..";
            $_SESSION['otp_message']=$message;
          //  echo '<h2 style="color:darkgreen;">OTP is send to your Email please confirm your email..</h2>';
            require 'wt_project/user/views/templates/otp.php';

          }

        }
        else {
          $message="Sorry password doesn't matched...Please try one more time";
          header("Location: wt_project/user/views/templates/signup.php");
        }
      }
      else {
        $message='password fileds are empty';
      }
      return $message;
    }
  }


  function otp_validation(){
    if (!empty($_POST)){
      $otp=$_POST['otp'];
      echo $otp."varr";
      $session_otp=$_SESSION['otp'];
      echo $session_otp;

      if ($session_otp==$otp){
        $first_name=$_SESSION['first_name'];
        $last_name=$_SESSION['last_name'];
        $email=$_SESSION['email'];
        $user_type=$_SESSION['user_type'];
        $password1=$_SESSION['password'];
        $sql = "INSERT INTO user (first_name, last_name, email,user_type,password)
        VALUES ('$first_name','$last_name','$email','$user_type','$password1')";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
          session_destroy();
          unset($_SESSION['first_name']);
          unset($_SESSION['last_name']);
          unset($_SESSION['email']);
          unset($_SESSION['user_type']);
          unset($_SESSION['password']);
          $message="You register Successfully...Please Login Now..";
          return $message;
        }
        else {
          session_destroy();
          unset($_SESSION['first_name']);
          unset($_SESSION['last_name']);
          unset($_SESSION['email']);
          unset($_SESSION['user_type']);
          unset($_SESSION['password']);
          $message="You email Address is already exists. Please check..";
          return $message;
        }
      }
      else {
        session_destroy();
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['user_type']);
        unset($_SESSION['password']);
        $message="Enter Otp is Incorrect..Please Try again!";
        return $message;
      }
    }
  }

}

?>
