 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Library Management System</title>
	<!--Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		
	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/bootstrap.css.map">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css.map">
	<link rel="icon" type="image/png" href="images/rbsms.png"/>
	<script src="./js/bootstrap.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<!---fontawesome--->
	<script src="https://use.fontawesome.com/86027b15e3.js"></script> 
	<!---css style--->
	<link rel="stylesheet" href="css/login-style.css">	
</head>
 
<body>
<div class="container-fluid"  >
   	<div class="row justify-content-center" >
		<div class="col-xs-7 col-md-5" >
          	<div class="card">
					<div class="card-header text-center ">
						<h1>Rio's Library</h1>
					</div>
					<div class="card-body">
						<?php
							if( isset($error) ){
							switch($error){
								case 1: 
								$error = '<div class="alert alert-danger" style="padding: 5px 0px; text-align: center">
								You have entered an invalid username or password!</div>'; 
								break;								
							}
								echo '<div class="error-msg">'.$error.'</div>';
							}
						?>	
						<form class="animate" action="controller.php?page=login" method="post">
						<label for="username" class="col-xs-10 col-md-12 col-form-label" style="padding-left:0;">Your Account ID</label>
							<div class="form-group row">
								
								<div class="col-xs-7 col-md-12">
									<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user-circle"></i> </span>
										<input type="text" name="user" class="form-control" id="username" required="required"  placeholder="Enter Account ID" >
									</div>
								</div>
							</div>
							<label for="password" class="col-xs-10 col-md-12 col-form-label"  style="padding-left:0;">Your Password</label>
								
							<div class="form-group row">
								<div class="col-xs-7 col-md-12">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-key"></i> </span>
										<input type="password" name="pass" class="form-control" id="password" required="required"  placeholder="Enter Password">
									</div>
								</div> 
							</div>					
							<div>
								<span class="txt3">
									Don't have an account yet? </span> <a href="http://localhost/library/controller.php?page=get_regid"  class="txt3">Sign up</a>
								</a>
							</div>
							<br />
							<br />
							<div class="col-xs-10 col-md-12">
								<div class="text-center">
									<button type="submit" class="btn btn-red-outline btn-block red">SIGN IN&nbsp;<span><i class="fa fa-arrow-circle-right"></i></span></button>	
								</div>	
							</div>	
							
						 	
						</form>
					</div>
			</div>
        </div>
        
	</div>
</div>
</div> 

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>