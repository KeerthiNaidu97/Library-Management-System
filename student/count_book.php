<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
	if(!IS_AJAX) {die('Restricted access');}

	include 'conn.php';
	$sid = $_POST['sid'];
	$query="Select * from requested_list r where  `sid` = '$sid'  and r.status='pending' and r.returned='no' ";
	$result=mysqli_query($con,$query);
	$json_data=array();
	$c=0;
	while($row=mysqli_fetch_assoc($result)){
		$c++;
	}
	
	echo $c;
?>