<?php
include "config.inc.php";
 
function viewacct($id,$password){
	global $host,$user,$pass,$db;
	$conn= mysqli_connect($host,$user,$pass,$db);
	if(mysqli_connect_errno($conn)){
		echo "Error Connection!";	
	}	
		$sql= "Select * from logintbl where userid= '$id' and password= '$password'";
		$result= mysqli_query($conn,$sql);
		$users= array();
	if($myrow=mysqli_fetch_array($result)){				
	do{
		$info = array();
		$info['userid'] = $myrow['userid'];
		$info['password'] = $myrow['password'];
		$info['position'] = $myrow['position'];		
		$users[] = $info;
	}while($myrow=mysqli_fetch_array($result));	
	}else{
		$users="";
	}
		return $users;
		 
}
function reg(){
	global $host,$user,$pass,$db;
	$conn= mysqli_connect($host,$user,$pass,$db);
	if(mysqli_connect_errno($conn)){
		echo "Error Connection!";	
	}
	
	if( $_SERVER['REQUEST_METHOD']=="POST" )
	{
		$d = $_POST;
		$fname=$d['fname'];
		$mname=$d['mname'];
		$lname=$d['lname'];
		$email=$d['email'];
		$contact=$d['contact'];
		$age=$d['age'];
		$gender=$d['gender'];
		$address=$d['address'];
		$id=$d['acc_id'];
		$password=$d['password'];
		
		$date=date("Y-m-d h:i:s");
		$sql="INSERT INTO `logintbl`(`userid`, `password`, `position`, `date_registered`) VALUES ('$id','$password','user','$date')";
		$result= mysqli_query($conn,$sql);
		
		$insert="INSERT INTO `usertbl`(`userid`, `fname`, `mname`, `lname`, `email`, `contact`, `age`, `gender`, `address`) 
		VALUES ('$id','$fname','$mname','$lname','$email','$contact','$age','$gender','$address')";
		$result2= mysqli_query($conn,$insert);
		
		$_SESSION['userid']=$id;
		$_SESSION['position']="user";
		include "index.php";
		
	}
	}
function users()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql= "Select * from usertbl";
	$result= mysqli_query($conn,$sql);
	$us= array();
	if($myrow=mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info['userid'] = $myrow['userid'];
			$info['fname'] = $myrow['fname'];
			$info['mname'] = $myrow['mname'];
			$info['lname'] = $myrow['lname'];
			$info['email'] = $myrow['email'];
			$info['contact'] = $myrow['contact'];
			$info['age'] = $myrow['age'];
			$info['gender'] = $myrow['gender'];
			$info['address'] = $myrow['address'];
			
			
			$us[] = $info;
		}while($myrow=mysqli_fetch_array($result));
				
	}
	return $us;
	
}
function borrowed($boridd)
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql= "Select borrow_tbl.user_id, borrow_tbl.borrow_id, borrow_tbl.bookid, borrow_tbl.date_borrowed, 
		booktbl.title  from borrow_tbl, booktbl 
		where booktbl.bookid=borrow_tbl.bookid AND `user_id`='$boridd' AND borrow_tbl.status='Borrowed'";
	$result= mysqli_query($conn,$sql);
	$check= array();
	if($myrow=mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info['borrow_id'] = $myrow['borrow_id'];
			$info['bookid'] = $myrow['bookid'];
			$info['title'] = $myrow['title'];
			$info['date_borrowed'] = $myrow['date_borrowed'];
			 
			$check[] = $info;
		}while($myrow=mysqli_fetch_array($result));
				
	}
	return $check;
}
 
function books()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql= "Select * from booktbl";
	$result= mysqli_query($conn,$sql);
	$fil= array();
	if($myrow=mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info['bookid'] = $myrow['bookid'];
			$info['title'] = $myrow['title'];
			$info['genre'] = $myrow['genre'];
			$info['author'] = $myrow['author'];
			$info['lib_sec'] = $myrow['lib_sec'];
			$info['status'] = $myrow['status'];
			
			
			$fil[] = $info;
		}while($myrow=mysqli_fetch_array($result));
				
	}
	return $fil;
	
}
function reg_id()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	 $query1 ="Select max(userid)+1 as userid from usertbl";  
	 $result1 = mysqli_query($conn, $query1);
	return $result1;
	
}
function option_genre()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql1= "Select DISTINCT(genre) from booktbl";
	$result1= mysqli_query($conn,$sql1);
	return $result1;
	
}

function option_lib()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql2= "Select DISTINCT(lib_sec) from booktbl";
	$result2= mysqli_query($conn,$sql2);
	return $result2;
	
}
function add_id()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	 $query1 ="Select count(bookid)+1 as bookid from booktbl";  
	 $result1 = mysqli_query($conn, $query1);
	return $result1;
	
}

function userbooks()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql= "Select * from booktbl where `status`='Available'";
	$result= mysqli_query($conn,$sql);
	$fil= array();
	if($myrow=mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info['bookid'] = $myrow['bookid'];
			$info['title'] = $myrow['title'];
			$info['genre'] = $myrow['genre'];
			$info['author'] = $myrow['author'];
			$info['lib_sec'] = $myrow['lib_sec'];
			  
			
			$fil[] = $info;
		}while($myrow=mysqli_fetch_array($result));
				
	}
	return $fil;
}
function ids()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql= "Select `borrow_id` from `borrow_tbl` where `approval` is NULL or `approval`='' ";
	$result= mysqli_query($conn,$sql);
	return $result;
}
function ids2()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	$sql= "Select `borrow_id` from `borrow_tbl` where `approval`='Yes' AND `status`='Borrowed'";
	$result= mysqli_query($conn,$sql);
	return $result;
}
function getreq($userrr)
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
		
	}
	 
	$sql= "Select usertbl.fname,usertbl.mname, usertbl.lname,borrow_tbl.borrow_id, borrow_tbl.user_id,borrow_tbl.bookid, borrow_tbl.user_id,
			borrow_tbl.date_borrowed, booktbl.bookid, booktbl.title	from borrow_tbl,booktbl,usertbl 
			where borrow_tbl.bookid= booktbl.bookid AND usertbl.userid=borrow_tbl.user_id AND `borrow_id`='$userrr'";
	$result= mysqli_query($conn,$sql);
	$check= array();
	if($myrow=mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info['fname'] = $myrow['fname'];
			$info['mname'] = $myrow['mname'];
			$info['lname'] = $myrow['lname'];
			$info['borrow_id'] = $myrow['borrow_id'];
			$info['user_id'] = $myrow['user_id'];
			$info['bookid'] = $myrow['bookid'];
			$info['user_id'] = $myrow['user_id'];
			$info['date_borrowed'] = $myrow['date_borrowed'];
			$info['title'] = $myrow['title'];
			 
			$check[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $check;
}
function getreq2($userrr)
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
		
	}
	 
	$sql= "Select  usertbl.fname,usertbl.mname, usertbl.lname,borrow_tbl.borrow_id,borrow_tbl.bookid, borrow_tbl.user_id,
			borrow_tbl.date_borrowed, booktbl.bookid, booktbl.title	from borrow_tbl,booktbl,usertbl 
			where borrow_tbl.bookid= booktbl.bookid AND usertbl.userid=borrow_tbl.user_id 
			AND `borrow_id`='$userrr'";
	$result= mysqli_query($conn,$sql);
	$check= array();
	if($myrow=mysqli_fetch_array($result))
	{
		do
		{
			$info = array();
			$info['fname'] = $myrow['fname'];
			$info['mname'] = $myrow['mname'];
			$info['lname'] = $myrow['lname'];
			$info['borrow_id'] = $myrow['borrow_id'];
			$info['bookid'] = $myrow['bookid'];
			$info['user_id'] = $myrow['user_id'];
			$info['date_borrowed'] = $myrow['date_borrowed'];
			$info['title'] = $myrow['title'];
			
			$check[] = $info;
		}while($myrow=mysqli_fetch_array($result));
	}
	return $check;
}
function updateborrow()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	if(isset($_POST['borid']) && isset($_POST['idd'])  ) 
	{
		$borid = $_POST['borid'];
		$bookid = $_POST['idd'];
		if( isset($_POST['approve']) && $_POST['approve']=='APPROVE')
		{
			$sql1="UPDATE borrow_tbl,booktbl SET borrow_tbl.approval='Yes', borrow_tbl.status='Borrowed',booktbl.status='Borrowed' 
			WHERE borrow_tbl.borrow_id='$borid' AND borrow_tbl.bookid=booktbl.bookid";
		 
			$result1 = mysqli_query($conn, $sql1);
			return $result1;			
			 
			 
		}
	
		else if(isset($_POST['reject']) && $_POST['reject']=='REJECT')
		{
			$sql2="UPDATE `borrow_tbl` SET `approval`='No' WHERE `borrow_id`='$borid'";
			$result2 = mysqli_query($conn, $sql2);
			return $result2;
		}
		}
}
function returnborrow()
{
	global $host,$user,$pass,$db,$conn;
	if(mysqli_connect_errno($conn)){
		echo "Connection failed.";
	}
	if(isset($_POST['borid']) && isset($_POST['idd']) ) 
	{
	
		$borid = $_POST['borid'];
		$bookid = $_POST['idd'];
		if( isset($_POST['approve']) && $_POST['approve']=='APPROVE')
		{
			$date=date("Y-m-d h:i:s");
			$sql="UPDATE `borrow_tbl` SET `date_returned`='$date', `status`='Available' WHERE `borrow_id`='$borid'";
			$sql="UPDATE borrow_tbl,booktbl SET borrow_tbl.date_returned='$date', borrow_tbl.status='Available',booktbl.status='Available' 
			WHERE borrow_tbl.borrow_id='$borid' AND borrow_tbl.bookid=booktbl.bookid";
			
			if (mysqli_query($conn, $sql)) {}
				else {echo "Error: " . $sql. "<br>" . mysqli_error($conn);}
		}
	
		else
		{
		 
		}
		}
}
function update_book($idd,$titlee,$genree,$authorr,$libb,$statuss){
	global $host,$user,$pass,$db;
	$conn= mysqli_connect($host,$user,$pass,$db);
	//check the connection
	if(mysqli_connect_errno($conn)){
	echo "Error";
	}
	else{
	//echo "connect Ok";	
	}
	$quee="SELECT * FROM `booktbl` WHERE `title`='$titlee'  ";
	$queer =mysqli_query($conn,$quee);
	$anything_found = mysqli_num_rows($queer);
	 if($anything_found>0)
	{
       $quee="SELECT * FROM `booktbl` WHERE `genre`='$genree' AND `author`='$authorr'
	 AND `lib_sec`='$libb'  ";
	$queer =mysqli_query($conn,$quee);
	$anything_found = mysqli_num_rows($queer);
	 if($anything_found>0)
	{
     $error=888;
	}else{
			$sql="UPDATE `booktbl` SET  `title`='$titlee', `genre`='$genree', `author`='$authorr'
	, `lib_sec`='$libb', `status`='$statuss' where `bookid`='$idd'";
	 
	$result1 = mysqli_query($conn, $sql);
	return $result1;
	}
	  
	}else{

	 
	$sql="UPDATE `booktbl` SET  `title`='$titlee', `genre`='$genree', `author`='$authorr'
	, `lib_sec`='$libb', `status`='$statuss' where `bookid`='$idd'";
	 
	$result1 = mysqli_query($conn, $sql);
	return $result1;
	 }
	}
	
function add($idd,$titlee,$genree,$authorr,$libb,$statuss){
	global $host,$user,$pass,$db;
	$conn= mysqli_connect($host,$user,$pass,$db);
	//check the connection
	if(mysqli_connect_errno($conn)){
	echo "Error";
	}
	else{
	//echo "connect Ok";	
	}
	$quee="SELECT * FROM `booktbl` WHERE `title`='$titlee' ";
	$queer =mysqli_query($conn,$quee);
	$anything_found = mysqli_num_rows($queer);
	 if($anything_found>0)
	{
       $error=888;
	}

	else
	{
	$sql0="INSERT INTO `booktbl`(`bookid`, `title`, `genre`, `author`,`lib_sec`,`status`) 
	VALUES ('$idd','$titlee','$genree','$authorr','$libb','Available')";
	$error=99;
	$result1 = mysqli_query($conn, $sql0);
	return $result1;
	}
	}
	
function del_book($idd){
	global $host,$user,$pass,$db;
	$conn= mysqli_connect($host,$user,$pass,$db);
	//check the connection
	if(mysqli_connect_errno($conn)){
	echo "Error";
	}
	else{
	//echo "connect Ok";	
	}
  
	$sql="UPDATE `booktbl` SET `status`='Deleted' where `bookid`='$idd'";
	$result1 = mysqli_query($conn, $sql);
	return $result1;
	  
	}
 
function borrow($idd,$userrr){
	global $host,$user,$pass,$db;
	$conn= mysqli_connect($host,$user,$pass,$db);
	//check the connection
	if(mysqli_connect_errno($conn)){
	echo "Error";
	}
	else{
	//echo "connect Ok";	
	}
		
	$quee="SELECT `bookid`,`user_id` FROM `borrow_tbl` WHERE `bookid`='$idd' AND `user_id`='$userrr' AND `status` is NULL ";
	$queer =mysqli_query($conn,$quee);
	$anything_found = mysqli_num_rows($queer);
	 if($anything_found>0)
	{
       $error=222;
	}
	else
	{
		$sql2= "SELECT * FROM borrow_tbl";//borrow id increment
		$result= mysqli_query($conn,$sql2); 
		if($myrow = mysqli_num_rows($result))
		{
			$result=$myrow + 1;
		}
	date_default_timezone_set("Asia/Singapore");
	$date=date("Y-m-d h:i:s");
	$sql0="INSERT INTO `borrow_tbl`(`borrow_id`,`bookid`, `user_id`, `date_borrowed`, `date_returned`,`approval`,`status`) 
	VALUES ('$result','$idd','$userrr','$date',null,null,null)";
	
	
	$error=11;
	$result1 = mysqli_query($conn, $sql0);
	return $result1;
	
	
	
	}
	}
	
?>