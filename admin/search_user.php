<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$var = $_POST['detail'];
	$query="SELECT * FROM `credentials` WHERE `email` LIKE '$var%' or `name` LIKE '$var%' or `branch` LIKE '$var%' or `usn` LIKE '$var%' or `semester` LIKE '$var%' ";
	$result=mysqli_query($con,$query);
	$json_data=array();
	while($row=mysqli_fetch_assoc($result)){
		$json_data[]=$row;
	}
	
	echo json_encode($json_data);
?>