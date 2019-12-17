<!DOCTYPE html>
<html>
<body>
	<main>
		<div class="container" style="width: 58vw; margin-bottom: 2rem;">
			<div class="row">
				<div class="card" style="margin-top: 5vh; ">
				  <div class="card-header" style="color: #fac239;font-family: 'Oswald', sans-serif;
	text-transform: uppercase;
	font-weight: bold; width: 58vw; padding:2px; background-color: #34495E  ; font-size: 1.2rem; ">
				    Search Companies Stock Details
				  </div>
				  <div class="card-body" style="width: 83vw;">
				  	<div class="container">
				  		<div class="row">
				  			 <input class="form-control form-control-lg w-50 " type="text" placeholder="Search Stock" id="filter_users"/>
				   			<a id="code_search"><button type="button" class="btn btn-success" style="margin-left: 4rem;">search</button></a>
				  		</div>
				  	</div>
            <form method='post' action='/?act=adding_favourite_stock'>
              <button class="btn btn-success" id='add_fav_comp' type="submit" name='company_name_code' style="color:#FFF;margin-top:10px;">Add this to favourite</button>
            </form>
				  	<ul id="users-list" style="margin-top: 1rem;display: none">


                    </ul>
				  </div>
				</div>
			</div>
			</div>
		</div>
	</main>

	<script>
  var users = [
     'Microsoft',
     'Apple',
     'Google',
     'Facebook',
     'Amazon',
     'JP Morgan Chase',
     'Visa Inc.',
     'Netflix',
     'Mastercard',
     'Tesla'
   ];

   var company_name=[
     'Microsoft',
     'Apple',
     'Google',
     'Facebook',
     'Amazon',
     'JP Morgan Chase',
     'Visa Inc.',
     'Netflix',
     'Mastercard',
     'Tesla'
   ];
    var company_codes=[
      'MSFT',
      'APPL',
      'GOOGL',
      'FB',
      'AMZN',
      'JP',
      'V',
      'NFLX',
      'MA',
      'TSLA	'

    ]

ul = document.getElementById("users-list");

var render_lists = function(lists){
  var button = "";
  for(index in lists){
    button += "<button  class='btn btn-light' style='width:70%; margin-top:0.2rem;'>" + lists[index] + "</button></form>";
  }
  ul.innerHTML = button;
  var value = document.getElementById('filter_users').value;
  // console.log(ul.innerHTML);
  //console.log(value.length);
  if (value.length > 1) {
	    document.getElementById("users-list").style.display="block";
      console.log( lists[index] );
      var ind=company_name.indexOf(lists[index]);
      console.log(ind);
      var comp_code=company_codes[ind];
      console.log(comp_code);
      document.getElementById("code_search").href='/?act=show_company_detail&code='+comp_code;
      document.getElementById('add_fav_comp').value=lists[index]+'&'+comp_code;

	 }
	 else{
	 	document.getElementById("users-list").style.display="none";
	 }
 //  document.getElementById("filter_users").addEventListener("click", function(){

	// // document.getElementById("users-list").style.display="block";




	// });



}
 render_lists(users);




// lets filters it
input = document.getElementById('filter_users');

var filterUsers = function(event){
  keyword = input.value.toLowerCase();
  filtered_users = users.filter(function(user){
        user = user.toLowerCase();
       return user.indexOf(keyword) > -1;
  });

  render_lists(filtered_users);
}

input.addEventListener('keyup', filterUsers);


</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
