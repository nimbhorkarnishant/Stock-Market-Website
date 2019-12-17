
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text|Jomolhari|Oswald|ZCOOL+XiaoWei&display=swap" rel="stylesheet">
</head>
<style>
	/*font-family: 'Jomolhari', serif;
font-family: 'Big Shoulders Text', cursive;
font-family: 'ZCOOL XiaoWei', serif;*/
	body{
	margin: 0;
	padding: 0;

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
<body>
	<nav class="navbar navbar-light bg-light">
	  <img src="https://img.icons8.com/dusk/64/000000/neutral-trading.png"><a class="navbar-brand" style="font-family: 'Big Shoulders Text', cursive;  font-weight: bold; color:#fff; font-size: 1rem; ">Stock Market Junkies</a>
	  <div class="title">
		<ul>
      <li><a href="?act=home" style="color:#FFF">Visit website</a></li>
      <li >
        <a id="link" href="?act=admin_pannel">Admin Home</a>
      </li>
			<li><a href="?act=logout" id="link">Logout</a></li>
			<li><a href="profile.html"><img src="wt_project/user/views/media/website_images/Profile.svg"></a></li>
		</ul>
	  </div>
	</nav>
  <?php

  if (isset($_SESSION['Company_management_delete_message'])) {
  echo '<div class="alert alert-success alert-dismissible" style="margin-top:30px;width:70%;margin-left:200px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  echo $_SESSION['Company_management_delete_message'];
  echo '</div>';
  }
  ?>

	<main>
		<div class="container">
			<div class="row">
				<div class="card" style="margin-top: 5vh;">
				  <div class="card-header" style="color: #fac239;font-family: 'Oswald', sans-serif;
	text-transform: uppercase;
	font-weight: bold; width: 65vw; padding:2px; background-color: #34495E  ; font-size: 1.2rem; ">
				    Users Details
				  </div>
				  <div class="card-body">
				  	<form class="form-inline" action="?act=filter_by_company_Id" method="post">
					  <div class="form-group mx-sm-3 mb-2">
					    	<label for="inputEmail2" class="sr-only"></label>
					    	<input type="text"  name="filter_by" class="form-control" id="inputEmail2" placeholder="Search By Company Id" style="width:300px;">
					  </div>
					  <button type="submit" class="btn btn-dark mb-2"><img src="wt_project/user/views/media/website_images/Search.svg" width="65px;" height="27px;" ></button>
          </form>

					  <a href="?act=add_new_company_detail"><img src="wt_project/user/views/media/website_images/add_user.svg" width="70px;" height="50px;" style="margin-left: 15vw;"> Add Company</a>
					</form>
					<br>
					<br>
          <table class="table table-striped table">
          <?php
            if ($company_management_detail->num_rows > 0) {
              echo '
					         <thead class="table-dark">
					            <tr>
        					      <th scope="col">Company ID</th>
        					      <th scope="col">Member Name</th>
        					      <th scope="col">Designation</th>
        					      <th scope="col"></th>
					             </tr>
					          </thead>';
                    while($row = $company_management_detail->fetch_assoc()) {
                      //  echo "Id: " . $row["Id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. $row["email"].$row["branch"].$row["block"].$row["gender"].$row["event"];
                        $id=$row["company_id"];
                        echo "<tbody>";
                          echo "<tr>";
                          echo  "<td>".$row["company_id"]."</td>";
                          echo  "<td>".$row["name"]."</td>";
                          echo  "<td>".$row["designation"]."</td>";
                        //  echo  "<td>".$row["company_code"]."</td>";
                          echo  '<td><form  action="?act=edit_company_management_detail" method="post">'.
                                  '<button class="btn-sm btn-warning" type="submit" name="management_id" value='.$id.">"."View Details"."</button>"
                                  .'</form></td>';
                          echo "</tr>";
                        echo "</tbody>";

                    }

            }
            else {
                echo "<center><h2>Sorry !! No one is register yet...</h2></center>";
            }
          ?>
        </table>
				  </div>
				</div>
			</div>
		</div>
	</main>


	<footer>
		<div class="container">
			<p style="text-align: center; color: #fff; font-size: 1rem; padding-top: 0.2rem;">&copy; 2019 StockMarketJunkies.com<p>
		</div>
	</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
