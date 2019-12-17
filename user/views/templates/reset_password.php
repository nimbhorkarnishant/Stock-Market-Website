
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="/css/master.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style media="screen">
    .button_submit{
      background-color: #59c999;
      float:center;
      width: 15px;
      margin-right: 2px;
      font-family: calibari, Helvetica, sans-serif;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border-radius: 10px;
      width: 50%;
    }
    .button_submit {
      background-color: #B660CD;
      color: white;
    }
    nav{
      display: flex;
      background: #6a3093;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #6a3093, #6a3093);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #6a3093, #6a3093); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    footer{
      display: flex;
      background-color: #573d7a;

      position: fixed;
      height: 50px;
      bottom: 0px;
      left: 0px;
      right: 0px;
      margin-bottom: -19px;
    }

    nav .logo{
      margin-left: 1rem;
      font-family: 'Lobster', cursive;
      font-size: 3rem;
      position: absolute;
      top: -2rem;
      color: #fff;
    }
    nav div{

      height: 9vh;
      margin-top: -1rem;

    }
    footer div{
      height: 10vh;


    }
    nav div ul{
      margin-left: 53rem;
      padding-top: 1rem;
      margin-top: 0.7rem;

    }
    nav div ul li{
      display: inline;
      margin-left: 2rem;



    }
    nav div ul li #link{
      text-decoration: none;
      color: #fac239;
      font-size: 1rem;
      border:3px #fac239 solid;
      padding: 4px;
      border-radius: 10px;
      font-family: 'Oswald', sans-serif;
      text-transform: uppercase;
      font-weight: bold;
    }
    nav div ul li #link:hover{
      background-color: #fac239;
      color: #000;
      text-decoration: none;
    }
    </style>
  </head>
  <nav class="navbar navbar-light bg-light">
    <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: 'Big Shoulders Text', cursive;  font-weight: bold; color:#fff; font-size: 1rem; ">Stock Market Junkies</a>
    <div class="title">
    <ul>
      <!--<li><a href="?act=home" style="color:#FFF">Visit website</a></li>
      <li >
        <a id="link" href="?act=admin_pannel">Admin Home</a>
      </li>
      <li><a href="?act=logout" id="link">Logout</a></li>
      <li><a href=""><img src="wt_project/user/views/media/website_images/Profile.svg"></a></li>
    </ul>-->
    </div>
  </nav>
  <body>
    <div class="container" style="margin-top:120px;">
      <div class="row">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center" style="color:darkgreen;">Enter new password</h2>
                    <p style="color:darkgreen;"><b>Please enter your new password twice so we can verify you typed it in correctly.</b></p>
                        <div class="panel-body">
                        <form  class="form" method="post" action="?act=password_reset_done">

                            <fieldset>
                              <div class="form-group">
                                <div class="input-group">
                                    <label for="" style="color:darkgreen;">New Password:</label>
                                    <input id="emailInput" name="password1" placeholder="Enter Password" class="form-control" type="password" required="">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group">
                                    <label for="" style="color:darkgreen;">Confirm Password:</label>
                                    <input id="emailInput" name="password2" placeholder="Enter Password one more time" class="form-control" type="password" required="">
                                    </div>
                                  </div>
                              <div class="form-group">
                            <button class="button_submit"  type="submit">Reset Password</button>
                            </div>
                          </fieldset>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <footer>
      <div class="container">
        <p style="text-align: center; color: #fff; font-size: 1rem; padding-top: 0.2rem;">&copy; 2019 StockMarketJunkies.com<p>
      </div>
    </footer>

  </body>
</html>
