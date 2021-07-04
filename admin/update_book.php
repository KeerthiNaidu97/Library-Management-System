<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$book_id = $_POST['book_id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$stock = $_POST['stock'];

	$query="UPDATE `request_book` SET `book_id`='$book_id',`title`='$title',`author`='$author',`stock`='$stock' WHERE `book_id`='$book_id'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Updated ";
	}
	else{
		echo "Error";
	}
?>