<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$book_id = $_POST['book_id'];
	$sid = $_POST['sid'];
	$date = $_POST['date'];
	$query="INSERT INTO `requested_list`( `book_id`, `sid`, `status`,`returned`,`date`) VALUES ('$book_id','$sid','pending','no','$date') ";
	$result=mysqli_query($con,$query);
	
	
	echo json_encode("success");
?>