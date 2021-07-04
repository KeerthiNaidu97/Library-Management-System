<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$rid = $_POST['rid'];
	$book_id = $_POST['book_id'];
	$renew_date = $_POST['renew_date'];

	$query="UPDATE `requested_list` SET `approved_date`='$renew_date' WHERE `rid`='$rid' ";
	$result=mysqli_query($con,$query);
	
	
	echo "success";
?>