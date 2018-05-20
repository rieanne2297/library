<?php
if(!isset($_SESSION)){
	session_start();
}
include "config.inc.php";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Library Management System</title>
		
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
   <?php
					if( isset($error) ){
						switch($error){
							case 1: 
							$error = '<div class="alert alert-danger" style="margin-bottom: 15px;  padding: 10px 10px 10px 10px; text-align: center; font-size: 15px;">You have entered an invalid username or password!</div>'; 
							break;	
						 
						}
					 }
?>
<div class="container-fluid">
   	<div class="row justify-content-center" >
		<div class="col-xs-6 col-md-6" >
          	<div class="card" style="margin: auto;">
					<div class="card-header text-center ">
						<h3>SIGN UP TO RIO'S LIBRARY</h3>
					</div>
					<div class="card-body ">
						<form class="animate" action="controller.php?page=register" method="post">
						 <div class="form-group row">
							<label  class="col-sm-3 col-form-label">First Name</label>
							<div class="col-sm-8">
								<input type="text" name="fname" class="form-control" id="fname" required >
							</div>
						</div>
						 
						<div class="form-group row">
							<label   class="col-sm-3 col-form-label">Middle Name</label>
							<div class="col-sm-8">
								<input type="text" name="mname" class="form-control" id="mname" required>
							</div>
						</div>
						<div class="form-group row">
							<label   class="col-sm-3 col-form-label">Last Name</label>
							<div class="col-sm-8">
								<input type="text" name="lname" class="form-control" id="lname" required>
							</div>
						</div>
						 <div class="form-group row">
							<label  class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-8">
								<input type="email" name="email" class="form-control" id="email" required>
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label">Contact Number</label>
							<div class="col-sm-8">
								<input type="number" name="contact" class="form-control" id="contact" required>
							</div>
						</div>
						<div class="form-group row">
							<label   class="col-sm-3 col-form-label">Age</label>
							<div class="col-sm-8">
								<input type="number" name="age" class="form-control" id="age" required>
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label">Gender</label>
							<div class="btn-group" role="group" data-toggle="buttons" style="margin-left: 15px;">
								<label class="btn btn-outline-success active">
								<input type="radio" name="gender" id="option3" value="Female" checked="">Female
								</label>
								<label class="btn btn-outline-success ">
								<input type="radio" name="gender" id="option3" value="Male">Male
								</label>
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label">Address</label>
							<div class="col-sm-8">
								<textarea type="text" name="address" class="form-control" id="address" required></textarea>
							</div>
						</div>
						<div class="form-group row">
						
							<label  class="col-sm-3 col-form-label">Account ID</label>
							
							<div class="col-sm-8">
							<?php
								if(isset($idd)){
								foreach($idd as $row){	
								echo'
								 
								<label><i>Note: Use this ID to log in.</i></label>
								<input type="text" name="acc_id" class="form-control" id="accID" value="'.$row['userid'].'" readonly>
								
								';}}
							?>
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-3 col-form-label">Password</label>
							<div class="col-sm-8">
								<input type="password" name="password" class="form-control" id="pass" required >
							</div>
						</div>
						 
						
						<br />
						<div class="col-xs-10 col-md-12">
							<div class="text-center">
								<button type="submit" class="btn btn-red-outline btn-block red">SIGN UP&nbsp;<span><i class="fa fa-arrow-circle-right"></i></span></button>	
								<button type="submit" class="btn btn-red-outline btn-block red" onclick="window.location.href='index.php'">BACK TO LOGIN&nbsp;<span><i class="fa fa-arrow-circle-right"></i></span></button>	
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