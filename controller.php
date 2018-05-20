<?php
session_start();
include "config.inc.php";
if( isset($_GET['page']) && strlen($_GET['page'])>0  ){
	switch($_GET['page']){		
		case 'login': login(); break;
		case 'register': register(); break;
		case 'getbooks': getbooks(); break;
		case 'getuserbooks': getuserbooks(); break;
		case 'getusers': getusers(); break;
		case 'getborrowed': getborrowed(); break;
		case 'edit_book': edit_book(); break;
		case 'add_book': add_book(); break;
		case 'delete_book': delete_book(); break;
		case 'borrow_book': borrow_book(); break;
		case 'getids': getids(); break;
		case 'getids2': getids2(); break;
		case 'getreqinfo': getreqinfo(); break;
		case 'getreqinfo2': getreqinfo2(); break;
		case 'approval_borrow': approval_borrow(); break;
		case 'return_borrow': return_borrow(); break;
		case 'get_regid': get_regid(); break;
		 
	}
}

function login(){
	if( $_SERVER['REQUEST_METHOD']=="POST" ){ 		
		$d = $_POST;
		if( strlen($d['user'])>0 && strlen($d['pass'])>0 ){	
		
			include "models/usermodel.php";		
			
			$check = viewacct($d['user'],$d['pass']);
			
		if( $check=="" ){ 
				$error=1;
				include "index.php";
			}else{
				$pos=$check[0]['position'];
				if($pos=='Admin')
				{	
					$_SESSION['userid'] = $check[0]['userid'];
					$_SESSION['password'] = $check[0]['password'];
					$_SESSION['position'] = $check[0]['position'];
					header("location: http://localhost/library/controller.php?page=getbooks");
					//include "book.php";
				}
				if($pos=='user'){
					$_SESSION['userid'] = $check[0]['userid'];
					$_SESSION['password'] = $check[0]['password'];
					$_SESSION['position'] = $check[0]['position'];
					$winid=$_SESSION['userid'];
					header("location: http://localhost/library/controller.php?page=getuserbooks");
					//include "book-user.php";
				}	
				
				}		
		}else{	
		if( isset($_GET['error']) )
			$error=$_GET['error'];	
				include "index.php";
		}	
	}
}

function register(){
	if( $_SERVER['REQUEST_METHOD']=="POST" ){ 		
		$d = $_POST;
		 
		include "models/usermodel.php";		
		$check = reg($d['fname'],$d['mname'],$d['lname'],$d['email'],$d['contact'],$d['age']
		,$d['gender'],$d['address'],$d['acc_id'],$d['password']);
	}else{	
		if( isset($_GET['error']) )
			$error=$_GET['error'];	
				include "register.php";
		}	
	}
function getbooks(){
		include "models/usermodel.php";		
		$fil = books(); 
		$for_genre = option_genre(); 
		$for_lib = option_lib(); 
		$for_bookid = add_id(); 
		include "book.php";
}
function get_regid(){
		include "models/usermodel.php";		
		$idd = reg_id(); 
		include "register.php";
}
function getusers(){
		include "models/usermodel.php";		
		$us = users(); 
		include "users.php";
}
function getreqinfo(){	
		include "models/usermodel.php";	
		$d = $_POST;
		$idd = ids();
		$check = getreq($d['userr']);
		include "issue-book.php";
}
function getborrowed(){
		include "models/usermodel.php";		
		$d=$_POST;
		$check = borrowed($_SESSION['userid']);
		include "book-user.php";
}

function getborid(){
		include "models/usermodel.php";		
		$d=$_POST;
		$bow_id = borid();
		include "book.php";
}
 
function getuserbooks(){
		include "models/usermodel.php";		
		$fil = userbooks(); 
		include "book.php";
}
function getids(){
		include "models/usermodel.php";		
		$idd = ids(); 
		include "issue-book.php";
}
function getids2(){
		include "models/usermodel.php";		
		$idd = ids2(); 
		include "return-book.php";
}
function approval_borrow(){
		include "models/usermodel.php";	
		updateborrow();
	 
		$idd = ids(); 
		include "issue-book.php";
	 
}
function return_borrow(){
		include "models/usermodel.php";		
		returnborrow();
		$idd = ids2(); 
		include "return-book.php";
}

function getreqinfo2(){	
		include "models/usermodel.php";	
		$d = $_POST;
		$idd = ids2();
		$check = getreq2($d['userr']);
		include "return-book.php";
}
function add_book(){
	if( $_SERVER['REQUEST_METHOD']=="POST" ){ //form was submitted		
		$d = $_POST;
		 include "models/usermodel.php";		
				$check = add($d['id'],$d['title'],$d['genre'],$d['author'],$d['lib'],$d['status']);
			if( $check=="" ){ //error
				$error=888;
			}else{
				if($error=99){
					$error=99;//success
				}else{
				$error=888; 
				}
			}
				$fil = books();
				$for_genre = option_genre(); 
				$for_lib = option_lib(); 
				$for_bookid = add_id();
				//header("location: book.php");
				 include "book.php";			
		}
		else{
			if( isset($_GET['error']))
			$error=$_GET['error'];
			include "book.php";
		}		
}
function edit_book(){
	if( $_SERVER['REQUEST_METHOD']=="POST" ){ //form was submitted		
		$d = $_POST;
		 include "models/usermodel.php";		
				$check = update_book($d['id'],$d['title'],$d['genre'],$d['author'],$d['lib'],$d['status']);
			if( $check=="" ){ //mali
				$error=888;
			}else{
				// if($error=44){
					$error=44;//success
					
				// }else{
				// $error=888; 
				}
			
				$fil = books();
				$for_genre = option_genre(); 
				$for_lib = option_lib(); 
				$for_bookid = add_id();
				
				//header("location: book.php");
				 include "book.php";			
		}
		else{
			if( isset($_GET['error']))
			$error=$_GET['error'];
			include "book.php";
		}		
}
function delete_book(){
	if( $_SERVER['REQUEST_METHOD']=="POST" ){ //form was submitted		
		$d = $_POST;
		 include "models/usermodel.php";		
				$check = del_book($d['id']);
			if( $check=="" ){ //mali
				$error=00;
			}else{
				 $error=55;
			}
				$fil = books(); 
				$for_genre = option_genre(); 
				$for_lib = option_lib(); 
				$for_bookid = add_id();
				//header("location: book.php");
				include "book.php";			
		}
		else{
			if( isset($_GET['error']))
			$error=$_GET['error'];
			include "book.php";
		}		
}
function borrow_book(){
	if( $_SERVER['REQUEST_METHOD']=="POST" ){ //form was submitted		
		$d = $_POST;
		 include "models/usermodel.php";		
				$check = borrow($d['id'],$d['userr']);
			 	
			if( $check=="" ){ //mali
				$error=222;
			}else{
				if($error=11){
					
					$error=11;//success
				}else{
					$error=222; 
				}
			}
				//$bow_id = getborid();
				$fil = userbooks(); 
				 include "book.php";			
		}
		else{
			if( isset($_GET['error']))
			$error=$_GET['error'];
			include "book.php";
		}		
}
 

?>