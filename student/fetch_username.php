<?php
session_start();

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	
	$sid = $_POST['sid'];
	$query="Select * from credentials where  `sid` = '$sid' ";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;

		$name = $row['name'];
		$email = $row['sid'];
	}
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
	// echo $id;
	
	echo json_encode($json_data);
?>