<?php
//logout.php
session_start();
session_destroy();
unset($_SESSION["none"]); 
header("Location: index.php");
?>

