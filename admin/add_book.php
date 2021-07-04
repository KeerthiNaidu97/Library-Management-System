<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$book_id = $_POST['book_id'];
	$title = $_POST['title'];
	$author = $_POST['author'];
	$stock = $_POST['stock'];

	$query="INSERT INTO `request_book`(`book_id`, `title`, `author`, `stock`) VALUES ('$book_id','$title','$author','$stock')";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Added ";
	}
	else{
		echo "Error";
	}
?>