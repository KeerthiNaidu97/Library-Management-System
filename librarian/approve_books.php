<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$rid = $_POST['rid'];
	$book_id = $_POST['book_id'];
	$approved_date = $_POST['approved_date'];

	$query="UPDATE `requested_list` SET `status`='given',`approved_date`='$approved_date' WHERE `rid`='$rid' ";
	$result=mysqli_query($con,$query);
	
	$query_s="UPDATE `request_book` SET stock = IF(stock > 0, stock - 1, 0) WHERE `book_id`='$book_id' ";
	$result=mysqli_query($con,$query_s);
	
	echo "success";
?>