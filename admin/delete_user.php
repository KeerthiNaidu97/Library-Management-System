<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	
	$sid = $_POST['sid'];

	$query="DELETE FROM `credentials` WHERE  `sid`='$sid'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted ";
	}
	else{
		echo "Error";
	}
?>