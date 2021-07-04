<?php
session_start();
include 'conn.php';
$user = $_SESSION['email'];
	$name = $_SESSION['name'];
	// echo $user;
if(isset($_GET['reserve'])){
	$id= $_GET['reserve'];
	$id = trim($id);


	$get_book = "SELECT * FROM `spclbook` WHERE `id` = '$id';";
	$run = mysqli_query($con, $get_book);
	while($row = mysqli_fetch_assoc($run)){
		$BookName = $row['title'];
	}
	// echo $user. " " . $name;

	$insert = "INSERT INTO `spclreserve` (`bid`, `bookname`, `borrowed`, `status`) 
	VALUES ('
	$id', '$BookName', '$user', '1');";

	$run_insert = mysqli_query($con, $insert);

	if($run_insert){
		header("Location: Special_books.php?requested");
	}
	else{
		header("Location: Special_books.php?notrequested");
	}




	
}


 ?>