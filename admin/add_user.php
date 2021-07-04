<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$usn = $_POST['usn'];
	$branch = $_POST['branch'];
	$semester = $_POST['semester'];

	$query="INSERT INTO `student`(`email`, `password`, `name`, `usn`, `semester`, `branch`) VALUES ('$email','XYZ123','$name','$usn','$semester','$branch')";
	$result=mysqli_query($con,$query);
	if ($result) {
		echo "Successfully Added ";
	}
	else{
		echo "Error";
	}
?>