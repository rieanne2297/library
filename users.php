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
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand active" style=" color: white; font-size: 25px;"><b>RIO's LIBRARY</b></a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a class="red" href="http://localhost/library/controller.php?page=getbooks" style="color: white; font-size: 18px;"><i class="fa fa-book"></i>&nbsp;All Books</a></li>
				<li><a href="http://localhost/library/controller.php?page=getids" style="color: white; font-size: 18px;"><i class="fa fa-align-justify"></i>&nbsp;Issue a Book</a></li>
                <li><a href="http://localhost/library/controller.php?page=getids2" style="color: white; font-size: 18px;"><i class="fa fa-undo"></i>&nbsp;Return a Book</a></li>
                <li class="active"><a href="http://localhost/library/controller.php?page=getusers" style="color: white; font-size: 18px;"><i class="fa fa-users"></i>&nbsp;All Users</a></li>
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
				<h4><i class="fa fa-users"></i><b>&nbsp;All Users</b></h4> 
			</div>
		</div>
		<br /><br /><br />
		<table id="example" class="table table-striped table-inverse table-bordered table-hover"  width="100%">  
                        <thead>
							  <tr>
								<th>User ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Address</th>
								 
								</tr>
						</thead>
					<?php  
					 	if(isset($us)){
						foreach($us as $row){	
					
                    
						{  echo  '  
                            <tr> 
							<td class="id" name="idd">'.$row["userid"].'</td>  
                            <td class="name">'.$row["fname"].' '.$row["mname"].' '.$row["lname"].'</td>  
                            <td class="email">'.$row["email"].'</td>  
                            <td class="contact">'.$row["contact"].'</td>  
                            <td class="age">'.$row["age"].'</td>  
                            <td class="gender">'.$row["gender"].'</td>  
                            <td class="address">'.$row["address"].'</td>  ';
						
						 
						  } 
						 	} }
                     ?>  
					
               </table>  
           </div>  
        </form>
		<br />
	 
</div> 
 <script type="text/javascript">
//datable
$(document).ready(function() {
	 $('#example').DataTable();
	});
 
</script>
</body>
</html>                            