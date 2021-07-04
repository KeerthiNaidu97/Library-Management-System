<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>


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
                        <a href="requested_books"><i class="fa fa-fw fa-book"></i> Requested Books</a>
                    </li>
                    <li class="">
                        <a href="Return_books"><i class="fa fa-fw fa-book"></i> Recieve/Return Book</a>
                    </li>
                   
                    <li class="">
                        <a href="penalty"><i class="fa fa-fw fa-money"></i> Penalty</a>
                    </li>
                     <li class="active">
                        <a href="Special_books"><i class="fa fa-fw fa-book"></i> Special Books</a>
                    </li>
                  
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container">

                 <h3 class="text-center">Special Books Requests </h3>

                <?php
                include 'conn.php';
                if(isset($_GET['SuccessAccepting'])){ ?>
<div class="alert alert-success"><h3>Success! Accepted Book</h3></div>
<script type="text/javascript">
  alert("Successfully Accepted");
</script>
              <?php  }
if(isset($_GET['ErrorAccepting'])){ ?>
<div class="alert alert-danger "><h3>Error! Not able to Accept Book</h3></div>
<script type="text/javascript">
  alert("Not abe to Accept");
</script>

              <?php  }


                ?>
            <div class="row">
             
                <div class="col-md-12" style="border-bottom:2px solid #000;padding-bottom:5px;margin-bottom:20px;">
                       <?php 
              
             

              $fetch = "SELECT * FROM `spclreserve` WHERE `status` = 1;";
              $run_fetch = mysqli_query($con, $fetch);

              $check = mysqli_num_rows($run_fetch);

              if($check == 0){
                ?>
  <div class="alert alert-warning"><h3>No Request  in table.</h3></div>
           <?php   }
           else{
            ?>

            <table class="table table-stripped" id="" style="font-size: 0.9em">
                    <thead>
                        <th style="">Sl</th>
                        <th style="">Book Id</th>
                        <th style="">Book Title</th>
                        
                      
                        <th style="width: 15%">Accept</th>
                        
                    </thead>

          <?php 
          $i = 1;
          while($row = mysqli_fetch_assoc($run_fetch)){ ?>
  <tr>
      <td> <?php  echo $i; $i = $i +1;?></td>
      <td><?php  echo $row['bid']; ?></td>
      <td><?php  echo $row['bookname']; ?></td>

      
       
       <td><a class="btn btn-info" href="reserve.php?reserve=<?php  echo $row['id']; ?>&user=<?php  echo $row['borrowed']; ?>">Accept</a></td>
       

  </tr>
      <?php    }
// echo $count;

     ?> </table>

     <?php }

              ?>
                </div>


<h2 class="text-center border">Return Books</h2>

                <?php
                include 'conn.php';
                if(isset($_GET['SuccessReturn'])){ ?>
<div class="alert alert-success container col-md-12"><h3>Success! Returned  Book</h3></div>
<script type="text/javascript">
  alert("Book Returned");
</script>
              <?php  }
if(isset($_GET['ErrorReturn'])){ ?>
<div class="alert alert-danger container col-md-12"><h3>Error! Not able to Accept Book</h3></div>
<br><hr>
              <?php  }

    $fetch = "SELECT * FROM `spclreserve` WHERE `status` = 2;";
              $run_fetch = mysqli_query($con, $fetch);

              $check = mysqli_num_rows($run_fetch);

              if($check == 0){
                ?>
               <div class="alert alert-warning"><h1>No Books to return</h1></div>
  
           <?php   }
           else{
            ?>
            <table class="table table-stripped" id="" style="font-size: 0.9em">
                    <thead>
                        <th style="">Sl</th>
                        <th style="">Book Id</th>
                        <th style="">Book Title</th>
                        
                      
                        <th style="width: 15%">Return</th>
                        
                    </thead>

          <?php 
          $i = 1;
          while($row = mysqli_fetch_assoc($run_fetch)){ ?>
       <tr>
      <td> <?php  echo $i; $i = $i +1;?></td>
      <td><?php  echo $row['bid']; ?></td>
      <td><?php  echo $row['bookname']; ?></td>

      
       
       <td><a class="btn btn-primary" href="reserve.php?return=<?php  echo $row['id']; ?>&user=<?php  echo $row['borrowed']; ?>">Return</a></td>
       

  </tr>
      <?php    }
// echo $count;

      ?>

     </table> 
<?php }
              ?>


            </div>

            </div>
            <!-- /.container-fluid -->


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="fetch_book_requests.js"></script>
	<script type="text/javascript" src="fetch_user.js"></script>
</body>

</html>
