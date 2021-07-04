<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	 <link rel="icon" type="text/css" href="../font-awesome/icon.png">

   

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>
<body>
<div class="container">
<?php
include 'conn.php';
if(isset($_POST['save_book'])){

	$title = trim($_POST['title']);
	$author = trim($_POST['author']);
	$stock = trim($_POST['stock']);

	$save = "INSERT INTO `spclbook` (`title`, `author`, `stock`) VALUES ('$title', '$author', '$stock')";

	$run_save = mysqli_query($con, $save);

	if($run_save){
		header("Location: add_reserve_book.php?success");
	}
	else{
		header("Location: add_reserve_book.php?error");
	}
}


if(isset($_GET['edit'])){
	$id = $_GET['edit'];
      $fetch = "SELECT * FROM `spclbook` WHERE `id` = '$id';";
              $run_fetch = mysqli_query($con, $fetch); 

              while ($row = mysqli_fetch_assoc($run_fetch)) {

              	$title = $row['title'];
              	$author = $row['author'];
              	$stock = $row['stock'];
              }

 ?>

    <h3 class="text-center">Edit Book</h3>


	<form action="update_reserve_books.php" method="post">
              <div class="row">
                <div class="col-md-4">
                	<input type="hidden" name="id" value="<?php echo $id; ?>">
                	<label>Title</label>
                    <input type="text" name="title" placeholder="Enter Book title" class="form-control" value="<?php echo $title;?>">

                </div>
                <div class="col-md-3">
                	<label>Author</label>
                    <input type="text" name="author" placeholder="Enter Author Name" class="form-control" value="<?php echo $author;?>">
                </div>
                <div class="col-md-3">
                	<label>Stock</label>
                    <input type="number" name="stock" placeholder="Enter Stock" class="form-control" value="<?php echo $stock;?>">
                </div>
                <div class="col-md-2">
                	<br>
                    <input type="submit" name="update_book" class="btn btn-info" value="Update Book">
                   
                </div>


              </div>

              </form>

<?php } 

if(isset($_GET['delete'])){
	$id = $_GET['delete'];

	$del =  "DELETE FROM `spclbook` WHERE `spclbook`.`id` = '$id';";

	$dele = mysqli_query($con, $del);

	if($del){
		header("Location: add_reserve_book.php?deleted");
	}
else{
	header("Location: add_reserve_book.php?delerror");
}


}
?>

<hr>
<a href="add_reserve_book" class="btn btn-info">Go back to Main page</a>

 
</div>
 </body>
</html>