<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$usn = $_POST['usn'];
	$branch = $_POST['branch'];
	$semester = $_POST['semester'];
	$sid = $_POST['sid'];

	$query="UPDATE `credentials` SET `email`='$email',`name`='$name',`usn`='$usn',`semester`='$semester',`branch`='$branch' WHERE `sid`='$sid'";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Updated ";
	}
	else{
		echo "Error";
	}
?>