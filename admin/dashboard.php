<?php include_once("includes/dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TOURISM MANAGEMENT SYSTEM</title>
</head>
<body>
    <?php include("includes/topheader.php"); ?>
    <section class="main-dashboard">
        <div class="left-bar">
           <div class="logged">
                <div class="logged-1">
                    <div class="user-icon">
                            <img src="../images/loo.png" alt="">
                    </div><br>
                    <?php   
                      $selectlog = mysqli_query($conn,"select * from admin");
                      $rowlog = mysqli_fetch_array($selectlog);
                    ?>
                        <p>Logged as : <?php echo $rowlog['email'] ;?></p>
                </div>
            </div> 
            <h4>Admin Panel</h4>
            <div class="quick-links">
                <p><a href="dashboard.php"><i class="glyphicon glyphicon-home"></i> Home</a></p>
                <p><a href="destinations.php"><i class="fa fa-map-marker"></i> Manage Destinations</a></p>
                <p><a href="charges.php"><i class="fa fa-dollar"></i> Manage Booking</a></p>
                <p><a href="delshiping.php"><i class="fa fa-info-circle"></i> Manage Users</a></p>
                <p><a href="pdf/report.php"><i class="fa fa-list"></i> Report Generation</a></p>
                <p><a href="feedback.php"><i class="fa fa-inbox"></i> Feedback</a></p>
            </div>
        </div>
        <div class="right-bar">

        <div class="panel-dashboard">
               <ul>
                  <li style="list-style:none !important;"> Welcome back Administrator !!!</li>
               </ul>    
        </div>
        <br>
            <h4>TOURISM MANAGEMENT SYSTEM</h4>
        <div class="sumarry-hero">
            <div class="sub-hero">
                  <div class="hero-header">
                      <p> <i class="fa fa-map-marker"></i> Destinations</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                     <p>
                     <?php 
                       $visits = $conn->query("SELECT * FROM destinations ")->num_rows;
                       echo $visits;
                      ?>
                     </p>
                  </div>
            </div>
            <div class="sub-hero">
                  <div class="hero-header">
                      <p><i class="fa fa-users"></i> Users</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                     <p>
                     <?php 
                       $users = $conn->query("SELECT * FROM users ")->num_rows;
                       echo $users;
                      ?>
                     </p>
                  </div>
            </div>
                
            <div class="sub-hero">
                 <div class="hero-header">
                      <p><i class="fa fa-book"></i>  Bookings</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                     <p>
                     <?php 
                       $bookings = $conn->query("SELECT * FROM bookings where book_status='Paid' ")->num_rows;
                       echo $bookings;
                      ?>
                     </p>
                  </div>
            </div>
                
            <!-- <div class="sub-hero">
                 <div class="hero-header">
                      <p><i class="fa fa-inbox"></i> Feedbacks</p>
                  </div>
                  <hr>
                  <div class="hero-body">
                     <p>0</p>
                  </div>
            </div> -->

        </div>
           <!-- END OF SUMMARY-HERO SECTION -->
        </div>
    </section>
</body>
</html>