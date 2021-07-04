<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script>

  if(!(localStorage['login']=="success")){
        window.location.replace("index");
    }
      function logout(){
      alert("logout");
      localStorage.removeItem("index");
      localStorage.removeItem("sid");
      window.location.replace("index");
  }

    window.onbeforeunload = function() {

      localStorage.removeItem(index);
      localStorage.removeItem(sid);
      return '';
    };
</script>
    
    <link rel="icon" type="text/css" href="../font-awesome/icon.png">

    <title>LIBRARY</title>

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LIBRARY</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
            
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span id="user_name_disp"></span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a onclick="logout()" href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="">
                        <a href="dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="">
                        <a href="manage_users"><i class="fa fa-fw fa-users"></i>Manage Students</a>
                    </li>
                     <li class="">
                        <a href="manage_admins"><i class="fa fa-fw fa-user"></i>Manage Admins</a>
                    </li>
                     <li class="">
                        <a href="manage_librarian"><i class="fa fa-fw fa-users"></i>Manage Librarian</a>
                    </li>
                     <li class="">
                        <a href="manage_faculty"><i class="fa fa-fw fa-user"></i>Manage Faculty</a>
                    </li>
                    <li class="">
                        <a href="manage_books_stock"><i class="fa fa-fw fa-book"></i>Manage Books Stock</a>
                    </li>

                     <li class="active">
                        <a href="add_reserve_book"><i class="fa fa-fw fa-book"></i>Add Special Book</a>
                    </li>
                    <!-- <li class="">
                        <a href="penalty"><i class="fa fa-fw fa-money"></i> Penalty</a>
                    </li> -->
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container border" style="padding:10px 20px; ">

              <center><h2>Add/ Manage Special Edition Books </h2></center>

              <?php 
              if(isset($_GET['success'])){
                ?>
                <div class="alert alert-success"><h1>Book Added Successfully</h1>
                </div>
 
              <?php }

 if(isset($_GET['error'])){
                ?>
                <div class="alert alert-danger"><h1>Error Addding Data</h1>
                </div>
 
              <?php }


 if(isset($_GET['edited'])){
                ?>
                <div class="alert alert-success"><h1>Data Updated Successfully</h1>
                </div>
 
              <?php }
              if(isset($_GET['editerror'])){
                ?>
                <div class="alert alert-danger"><h1>Data was not updated</h1>
                </div>
 
              <?php }

              if(isset($_GET['deleted'])){
                ?>
                <div class="alert alert-success"><h1>Data Deleted Successfully</h1>
                </div>
 
              <?php }
               if(isset($_GET['delerror'])){
                ?>
                <div class="alert alert-danger"><h1>Data is not deleted! Try later</h1>
                </div>
 
              <?php }
              ?>


   <form action="add_reserve_books.php" method="post">
              <div class="row">
                <div class="col-md-4">
                    <input type="text" name="title" placeholder="Enter Book title" class="form-control">

                </div>
                <div class="col-md-3">
                    <input type="text" name="author" placeholder="Enter Author Name" class="form-control">
                </div>
                <div class="col-md-3">
                    <input type="number" name="stock" placeholder="Enter Stock" class="form-control">
                </div>
                <div class="col-md-2">
                    <input type="submit" name="save_book" class="btn btn-info" value="Add Book">
                   
                </div>


              </div>

              </form>


              <hr>


              <?php 
              include 'conn.php';

              $fetch = "SELECT * FROM `spclbook` ;";
              $run_fetch = mysqli_query($con, $fetch);

              $count = mysqli_num_rows($run_fetch);

              if($count == 0){
                ?>
  <div class="alert alert-warning"><h3>No data in table.</h3></div>
           <?php   }
           else{
            ?>
            <table class="table table-stripped" id="" style="font-size: 0.9em">
                    <thead>
                        <th style="">Sl</th>
                        <th style="">Book Id</th>
                        <th style="">Book Title</th>
                        <th style="">Author/Edition</th>
                        <th style="">Stock</th>
                        
                        <th style="width: 15%">Update</th>
                        <th style="width: 15%">Delete</th>
                    </thead>

          <?php 
          $i = 1;
          while($row = mysqli_fetch_assoc($run_fetch)){ ?>
  <tr>
      <td> <?php  echo $i; $i = $i +1;?></td>
      <td><?php  echo $row['id']; ?></td>
      <td><?php  echo $row['title']; ?></td>
       <td><?php  echo $row['author']; ?></td>
       <td><?php  echo $row['stock']; ?></td>
       <td><a class="btn btn-info" href="add_reserve_books.php?edit=<?php  echo $row['id']; ?>">Edit</a></td>
       <td><a class="btn btn-danger" href="add_reserve_books.php?delete=<?php  echo $row['id']; ?>">Delete</a></td>

  </tr>
      <?php    }


      }

              ?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="fetch_book.js"></script>
    <script type="text/javascript" src="fetch_user.js"></script>
</body>

</html>
