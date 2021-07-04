<?php

session_start();
$user = $_SESSION['email'];
    $name = $_SESSION['name'];
include 'conn.php';
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,userscalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script>

  if(!(localStorage['login']=="success")){
        window.location.replace("index");
    }
      function logout(){
      alert("logout");
      localStorage.removeItem("login");
      localStorage.removeItem("sid");
      window.location.replace("index");
  }

    window.onbeforeunload = function() {

      localStorage.removeItem(login);
      localStorage.removeItem(sid);
      return '';
    };
</script>

	
    <link rel="icon" type="text/css" href="../font-awesome/icon.png">

    <title>Smart LIBRARY</title>

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
                <a class="navbar-brand" href="#">Smart LIBRARY</a>
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
                        <a href="borrowed"><i class="fa fa-fw fa-bookmark"></i> Borrowed</a>
                    </li>
                   
                    <li class="">
                        <a href="request_book"><i class="fa fa-fw fa-book"></i> Request Book</a>
                    </li>
                    
                    <li class="">
                        <a href="penalty"><i class="fa fa-fw fa-money"></i> Penalty</a>
                    </li>
                     <li class="active">
                        <a href="Special_books"><i class="fa fa-fw fa-money"></i> Special Books</a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container">
                  <center><h3>Special Books </h3></center>

                  <?php
                  if (isset($_GET['requested'])) { ?>
                     <div class="alert alert-success">Requested Successfully</div>
                <?php   }

                  ?>
                    <?php
                  if (isset($_GET['notrequested'])) { ?>
                     <div class="alert alert-success">Requested Successfully</div>
                <?php   }

                  ?>
            <div class="row">
                 <h3 class="text-center">
                     Requested or Reserved Book
                 </h3>

                 <?php 
              

              $fetch = "SELECT * FROM `spclreserve` WHERE `borrowed` = '$user' ;";
              $run_fetch = mysqli_query($con, $fetch);

              $count = mysqli_num_rows($run_fetch);

              if($count == 0){
                ?>
  <div class="alert alert-warning"><h3>No data in table.</h3></div>
           <?php   }
           else{
            ?>
            <table class="table table-stripped table-hover" id="" style="font-size: 0.9em">
                    <thead>
                        <th style="">Sl</th>
                        
                        <th style="">Book Title</th>
                        <th style="">Status </th>
                        
                        
                      
                        
                    </thead>

          <?php 
          $i = 1;
          while($row = mysqli_fetch_assoc($run_fetch)){ ?>
  <tr>
      <td> <?php  echo $i; $i = $i +1;?></td>
     
      <td><?php  echo $row['bookname']; ?></td>
       <td><?php  echo $row['status']; ?></td>
     
      
       

  </tr>
      <?php    }


      }

              ?>
          </table>
          <div class="bg-info text-center"> 
          Book Status: 0 = Returned, 1 = Requested, 2 = Booked</div>

                 <hr>
                <div class="col-md-11 " >
                       <?php 
              

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
                        
                        <th style="width: 15%">Book</th>
                        
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
       <td><a class="btn btn-info" href="reserve.php?reserve=<?php  echo $row['id']; ?>">Book Now</a></td>
       

  </tr>
      <?php    }


      }

              ?>
                </div>

            </div>

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


    <script type="text/javascript" src="notice_board.js" ></script>
	<script type="text/javascript" src="fetch_user.js"></script>


</body>

</html>
