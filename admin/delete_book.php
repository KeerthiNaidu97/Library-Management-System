<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	
	$book_id = $_POST['book_id'];

	$query="DELETE FROM `request_book` WHERE  `book_id`='$book_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Deleted ";
	}
	else{
		echo "Error";
	}
?>