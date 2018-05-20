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
<?php
	if( isset($error) ){
		switch($error){
			
			case 888: 
				echo"<script>swal('Warning!', 'Book already exist', 'error')</script>";
				break;
				
			case 222: 
				echo"<script>swal('Warning!', 'You already borrow this book!', 'error')</script>";
				break;
			
			case 44: 
				echo"<script>swal('Success!', 'Changes Saved!', 'success')</script>";
				break;
			
			case 99: 
				echo"<script>swal('Success!', 'Changes Saved!', 'success')</script>";
				break;
				
			case 55: 
				echo"<script>swal('Success!', 'Book Deleted!', 'success')</script>";
				break;
				
			case 11: 
				echo"<script>swal('Success!', 'Go to the Librarian to Approve your Borrow Request!', 'success')</script>";
				break;
				
			case 00: 
				echo"<script>swal('Warning!', 'Error!', 'error')</script>";
				break;
        }	
    }
?>
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
                <?php
				if($_SESSION['position']=='user'){
				echo '
				<li class="active"><a class="red" href="http://localhost/library/controller.php?page=getuserbooks" style="color: white; font-size: 18px;"><i class="fa fa-book"></i>&nbsp;All Books</a></li>
                ';}
				if($_SESSION['position']=='Admin'){
				echo '
				<li class="active"><a class="red" href="http://localhost/library/controller.php?page=getbooks" style="color: white; font-size: 18px;"><i class="fa fa-book"></i>&nbsp;All Books</a></li>
                ';}
				?>
				<?php
				if($_SESSION['position']=='Admin'){
				echo '
				<li><a href="http://localhost/library/controller.php?page=getids" style="color: white; font-size: 18px;"><i class="fa fa-align-justify"></i>&nbsp;Issue a Book</a></li>
                <li><a href="http://localhost/library/controller.php?page=getids2" style="color: white; font-size: 18px;"><i class="fa fa-undo"></i>&nbsp;Return a Book</a></li>
                <li><a href="http://localhost/library/controller.php?page=getusers" style="color: white; font-size: 18px;"><i class="fa fa-users"></i>&nbsp;All Users</a></li>
				';}
				if($_SESSION['position']=='user'){
				echo '
				<li><a href="http://localhost/library/controller.php?page=getborrowed" style="color: white; font-size: 18px;"><i class="fa fa-align-justify"></i>&nbsp;My Borrowed Books</a></li>
                
				';}
				?>
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
				<h4><i class="fa fa-book"></i><b>&nbsp;All Books</b></h4> 
			</div>
		</div>
		<br /><br />
		<?php
		if($_SESSION['position']=='Admin'){
		echo '
		<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd"><i class="fa fa-plus"></i>&nbsp;ADD BOOK</button>
		';}?>
		
		<br /><br />
		<table id="example" class="table table-striped table-inverse table-bordered table-hover"  width="100%">  
                          <thead>
							  <tr>
								<th>Book ID</th>
								<th>Title</th>
								<th>Genre</th>
								<th>Author</th>
								<th>Library Section</th>
							<?php
								if($_SESSION['position']=='Admin'){
								echo'
								<th>Status</th>
							';}
								?>
								<th width="100">Actions</th>
								
								
							  </tr>
							</thead>
					<?php  
					 	if(isset($fil)){
						foreach($fil as $row){	
					
                    
						{  echo  '  
                            <tr> 
							 <td class="id">'.$row["bookid"].'</td>  
                            <td class="title">'.$row["title"].'</td>  
                            <td class="genre">'.$row["genre"].'</td>  
                            <td class="author">'.$row["author"].'</td>  
                            <td class="lib">'.$row["lib_sec"].'</td>  ';
						
						if($_SESSION['position']=='Admin'){
						echo '
                            <td class="status">'.$row["status"].'</td>
							<td width="100">
							<span data-toggle="modal"  data-target="#myModalUpdate">
							<a class="btn btn-primary get-book" onclick="tableData()"   data-toggle="tooltip" data-placement="top" title="Update Book"><i class="fa fa-edit"></i>  </a>
							</span>
							<span data-toggle="modal"  data-target="#myModalDelete">
							<a class="btn btn-danger get-book" onclick="tableData()" data-toggle="tooltip" data-placement="top" title="Remove Book" ><i class="fa fa-trash"></i>  </a>
							</span>
							</td>
							</tr>  
                               ';  
						}
						else if($_SESSION['position']=='user'){
						echo '
							<td>
							<span data-toggle="modal"  data-target="#myModalBorrow">
							<a class="btn btn-primary borrow-book" onclick="tableData()"   data-toggle="tooltip" data-placement="top" title="Borrow this Book"><i class="fa fa-book"></i>  </a>
							</span>
							</td>
							</tr>  
                               ';
						} } 
						 	} }
                     ?>  
					
               </table> 
<!-- Modal (ADD BOOK) -->		
		<div class="modal fade " id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header" id="myModalHeader4">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
						&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Add Book</h4>
					</div>
					<div class="modal-body">
					<form action="controller.php?page=add_book" id="form" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label class="control-label label1">Book ID</label>
								<?php
								if(isset($for_bookid)){
								foreach($for_bookid as $row){	
								echo'
								<input type="text" class="form-control" id="getid" name="id" value="'.$row['bookid'].'" style="text-align: center;" readonly />
									';}}
								?>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Title</label>
								<input type="text" class="form-control" id="gettitle" name="title" style="text-align: center;"   />
							</div>
							
							<div class="form-group col-md-6">
							<label class="control-label label1">Genre</label>
								<select class="form-control" name="genre" >
								<?php
								if(isset($for_genre)){
								foreach($for_genre as $row){	
								echo'
									<option >'.$row['genre'].'</option>	
									';}}
								?>
								</select>
							</div>
							
							 
							<div class="form-group col-md-6">
								<label class="control-label label1">Author</label>
								<input type="text" class="form-control" id="getauthor" name="author"  style="text-align: center;"   />
							</div>
							
							<div class="form-group col-md-6">
							<label class="control-label label1">Library Section</label>
								<select class="form-control" name="lib" >
								<?php
								if(isset($for_lib)){
								foreach($for_lib as $row){	
								echo'
									<option >'.$row['lib_sec'].'</option>	
									';}}
								?>
								</select>
							</div>
						 
							
							<div class="form-group col-md-6">
								<label class="control-label label1">Status</label>
								<input type="text" class="form-control" value="Available" id="getstatus" name="status"  style="text-align: center;" readonly   />
							</div>
							
                        </div>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-success "></input>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- xxxx -->
<!-- Modal (UPDATE BOOK) -->		
		<div class="modal fade " id="myModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header" id="myModalHeader2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
						&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Book Information</h4>
					</div>
					<div class="modal-body">
					<form action="controller.php?page=edit_book" id="form" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label class="control-label label1">Book ID</label>
								<input type="text" class="form-control" id="getid" name="id"  style="text-align: center;" readonly />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Title</label>
								<input type="text" class="form-control" id="gettitle" name="title" style="text-align: center;"   />
							</div>
							<div class="form-group col-md-6">
							<label class="control-label label1">Genre</label>
								<select class="form-control" name="genre" >
								<?php
								if(isset($for_genre)){
								foreach($for_genre as $row){	
								echo'
									<option >'.$row['genre'].'</option>	
									';}}
								?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Author</label>
								<input type="text" class="form-control" id="getauthor" name="author"  style="text-align: center;"   />
							</div>
							<div class="form-group col-md-6">
							<label class="control-label label1">Library Section</label>
								<select class="form-control" name="lib" >
								<?php
								if(isset($for_lib)){
								foreach($for_lib as $row){	
								echo'
									<option >'.$row['lib_sec'].'</option>	
									';}}
								?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Status</label>
								<input type="text" class="form-control" id="getstatus" name="status"  style="text-align: center;"   />
							</div>
							
                        </div>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary "></input>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- xxxx -->
<!-- Modal (BORROW BOOK) -->		
		<div class="modal fade " id="myModalBorrow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header" id="myModalHeader2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
						&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Borrow this Book</h4>
					</div>
					<div class="modal-body">
					<form action="controller.php?page=borrow_book" id="form" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label class="control-label label1">Book ID</label>
								<input type="text" class="form-control" id="getid" name="id"  style="text-align: center;"  readonly />
								<?php
								echo'
								<input type="hidden" class="form-control" name="userr" value="'.$_SESSION['userid'].'" style="text-align: center;"   />
								'; ?>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Title</label>
								<input type="text" class="form-control" id="gettitle" name="title" style="text-align: center;"  readonly />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Genre</label>
								<input type="text" class="form-control" id="getgenre" name="genre" style="text-align: center;" readonly  />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Author</label>
								<input type="text" class="form-control" id="getauthor" name="author"  style="text-align: center;"  readonly />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Library Section</label>
								<input type="text" class="form-control" id="getlib" name="lib"  style="text-align: center;" readonly  />
							</div>
							 
							
                        </div>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary "></input>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- xxxx -->
<!-- Modal (DELETE BOOK) -->		
		<div class="modal fade " id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog " role="document">
				<div class="modal-content">
					<div class="modal-header" id="myModalHeader3">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">
						&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete this Book</h4>
					</div>
					<div class="modal-body">
					<form action="controller.php?page=delete_book" id="form" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label class="control-label label1">Book ID</label>
								<input type="text" class="form-control" id="getid" name="id"  style="text-align: center;" readonly />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Title</label>
								<input type="text" class="form-control" id="gettitle" name="title" style="text-align: center;" readonly   />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Genre</label>
								<input type="text" class="form-control" id="getgenre" name="genre" style="text-align: center;" readonly  />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Author</label>
								<input type="text" class="form-control" id="getauthor" name="author"  style="text-align: center;" readonly  />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Library Section</label>
								<input type="text" class="form-control" id="getlib" name="lib"  style="text-align: center;" readonly  />
							</div>
							<div class="form-group col-md-6">
								<label class="control-label label1">Status</label>
								<input type="text" class="form-control" id="getstatus" name="status"  style="text-align: center;"  readonly />
							</div>
							
                        </div>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-danger "></input>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- xxxx -->
           </div>  
        </form>
</div> 
 <script type="text/javascript">
//datable
$(document).ready(function() {
	 $('#example').DataTable();
	});
//modal for edit
$(".get-book").click(function(){
		var $row = $(this).closest("tr");
		//var $id =  document.getElementById("item_id").value;
		var $bookid =  $row.find(".id").text();
		var $title =  $row.find(".title").text();
		var $genre =  $row.find(".genre").text();
		var $author =  $row.find(".author").text();
		var $lib =  $row.find(".lib").text();
		var $status =  $row.find(".status").text();
		
		$(".modal-body #getid").val($bookid);
		$(".modal-body #gettitle").val($title);
		$(".modal-body #getgenre").val($genre);
		$(".modal-body #getauthor").val($author);
		$(".modal-body #getlib").val($lib);
		$(".modal-body #getstatus").val($status);
	
		
	});
//modal for borrow
$(".borrow-book").click(function(){
		var $row = $(this).closest("tr");
		//var $id =  document.getElementById("item_id").value;
		var $bookid =  $row.find(".id").text();
		var $title =  $row.find(".title").text();
		var $genre =  $row.find(".genre").text();
		var $author =  $row.find(".author").text();
		var $lib =  $row.find(".lib").text();
		 
		$(".modal-body #getid").val($bookid);
		$(".modal-body #gettitle").val($title);
		$(".modal-body #getgenre").val($genre);
		$(".modal-body #getauthor").val($author);
		$(".modal-body #getlib").val($lib);
		 
		
	});
</script>
</body>
</html>                            