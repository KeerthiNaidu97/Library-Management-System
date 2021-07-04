<?php
include 'conn.php';

if(isset($_GET['reserve'])){

	$id  = $_GET['reserve'];

	$user = $_GET['user'];

	$update = "UPDATE `spclreserve` SET `status` = '2' WHERE `spclreserve`.`id` = '$id';";
	$update_run = mysqli_query($con, $update);

	if($update_run){
		header("Location: Special_books.php?SuccessAccepting");
	}
	else{
		header("Location: Special_books.php?ErrorAccepting");
	}



}

if(isset($_GET['return'])){

	$id  = $_GET['return'];

	$user = $_GET['user'];

		$update = "UPDATE `spclreserve` SET `status` = 0 WHERE `spclreserve`.`id` = '$id';";
	$update_run = mysqli_query($con, $update);

	if($update_run){
		header("Location: Special_books.php?SuccessReturn");
	}
	else{
		header("Location: Special_books.php?ErrorReturn");
	}



	}


?>