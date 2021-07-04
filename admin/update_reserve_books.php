<?php 
include 'conn.php';
if(isset($_POST['update_book'])){
	$ids = trim($_POST['id']);
	$titles = trim($_POST['title']);
	$authors = trim($_POST['author']);
	$stocks = trim($_POST['stock']);

	$save = "UPDATE `spclbook` SET `title` = '$titles', `author` = '$authors ', `stock` = '$stocks' WHERE `spclbook`.`id` = '$ids' ;";

	$run_save = mysqli_query($con, $save);

	if($run_save){
		header("Location: add_reserve_book.php?edited");
	}
	else{
		header("Location: add_reserve_book.php?editerror");
	}
}

?>
