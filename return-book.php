<?php
if(!isset($_SESSION['userid']))
{
	session_start();
} 
if(!isset($_SESSION['position']))
{
	header('location: index.php');
			exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Library Management System</title>
	<!--Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		
	<!---bootstrap--->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!---fontawesome--->
	<script src="https://use.fontawesome.com/86027b15e3.js"></script> 	
	 <!---datatable--->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- This is what you need for sweet alert-->
	<script src="dist/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="dist/sweetalert.css">
	<!---css style--->
	<link rel="stylesheet" href="css/styles.css">
</head> 
<body>
 
<div class="bs-example">
    <nav class="navbar navbar-default" style="background-color:#751816; padding: 20px; ">
        <div class="navbar-header" >
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand active" style=" color: white; font-size: 25px;"><b>RIO's LIBRARY</b></a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a class="red" href="http://localhost/library/controller.php?page=getbooks" style="color: white; font-size: 18px;"><i class="fa fa-book"></i>&nbsp;All Books</a></li>
				<li><a href="http://localhost/library/controller.php?page=getids" style="color: white; font-size: 18px;"><i class="fa fa-align-justify"></i>&nbsp;Issue a Book</a></li>
                <li class="active"><a href="http://localhost/library/controller.php?page=getids2" style="color: white; font-size: 18px;"><i class="fa fa-undo"></i>&nbsp;Return a Book</a></li>
                <li><a href="http://localhost/library/controller.php?page=getusers" style="color: white; font-size: 18px;"><i class="fa fa-users"></i>&nbsp;All Users</a></li>
				 
            </ul>
          
            <ul class="nav navbar-nav navbar-right">
				<li><a href="#" style="color: white; font-size: 18px;">&nbsp;<b>
				<?php
					echo '
						Hi, '.$_SESSION['position'].'&nbsp;&nbsp;'.$_SESSION['userid'].'</b></a></li>';
				?>
                <li><a href="logout.php" style="color: white; font-size: 18px;"><i class="fa fa-sign-out"></i>&nbsp;<b>LOGOUT</b></a></li>
            </ul> 
        </div>
    </nav>
</div>
<div class="container" style="background-color: #fff;">
		<br /><br />
		<div class="card">
			<div class="card-body">
				<h4><i class="fa fa-book"></i><b>&nbsp;Return a Book</b></h4> 
			</div>
		</div>
		<br /><br />
		<form action="controller.php?page=getreqinfo2" method="post">
		<div class="container">
		<div class="row">
		<div class="col-sm-10 col-centered" style="padding: 50px;">
			<div class="form-group row" >
			<label class="col-sm-5 title"><h4><b>Borrow ID:</h4></label>
				<div class="col-sm-5"  >
				<select name="userr" class="form-control" style="width:100%;" onchange="this.form.submit()">
				<?php
				if(isset($idd)){
				foreach($idd as $row){	
				echo'
				
						<option hidden selected>Select an Borrow ID</option>
						<option >'.$row['borrow_id'].'</option>
					';
				}}
				?>
				</select>
				</div>
			</div>
		</form>
			<br />
		<form action="controller.php?page=return_borrow" method="post">
		<div class="form-group row">
		<h4><b>Book Request Information</b></h4>
		 <hr class="plain"></hr>
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Borrow ID</label>
				<div class="cols-sm-10">
				<div class="input-group">
					
				<?php
					if(isset($check)){
					foreach($check as $row){	
					echo'
					<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="borid" id="name"  value="'.$row['borrow_id'].'" readonly /> 
						';}}
				?>
				</div>
				</div>
			</div>
			
			
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">User ID</label>
				<div class="cols-sm-10">
				<div class="input-group">
					
				<?php
					if(isset($check)){
					foreach($check as $row){	
					echo'
					<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="useridd" id="name"  value="'.$row['user_id'].'" readonly /> 
						';}}
				?>
				</div>
				</div>
			</div>
			
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Name</label>
				<div class="cols-sm-10">
				<div class="input-group">
					
				<?php
					if(isset($check)){
					foreach($check as $row){	
					echo'
					<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="name" id="name"  value="'.$row['fname']." ".$row['mname']." ".$row['lname'].'" readonly /> 
						';}}
				?>
				</div>
				</div>
			</div>
			 
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Date Borrowed</label>
				<div class="cols-sm-10">
				<div class="input-group">
				<?php
					if(isset($check)){
					foreach($check as $row){	
					echo'
					<span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="date" id="name" value="'.$row['date_borrowed'].'" readonly /> 
					';}}
				?>
				</div>
				</div>
			</div>
			 
			<br />
			<h4><b>Book Information</b></h4>
			<hr class="plain"> 
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Book ID</label>
				<div class="cols-sm-10">
				<div class="input-group">
				<?php
					if(isset($check)){
					foreach($check as $row){	
					echo'
					<span class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="idd" id="name"  value="'.$row['bookid'].'" readonly /> 
						';}}
				?>
				</div>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="cols-sm-2 control-label">Book Title</label>
				<div class="cols-sm-10">
				<div class="input-group">
				<?php
					if(isset($check)){
					foreach($check as $row){	
					echo'
					<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
					<input type="text" class="form-control" name="title" id="name"  value="'.$row['title'].'" readonly /> 
						';}}
				?>
				</div>
				</div>
			</div>
		<br /><br />
		<input type="submit" onclick="myFunction1()" value="APPROVE" name="approve" class="btn btn-success" ></input>
		 </form>
	</div>
		</div>
		
		
</div>  
</div>  
</div>   
<script type="text/javascript">
function myFunction1() {
    alert("Book Returned!");
}
 
</script>
</body>
</html>                            