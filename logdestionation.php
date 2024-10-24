<?php include_once("admin/includes/dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TOURISM MANAGEMENT SYSTEM</title>
  	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
  <!-- styel css -->
  <link rel="stylesheet" href="css/stylemain.css">
<style>
.main-destination{
    height: 100vh;
    background-image: url("images/11.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    object-fit: cover;
}
.text-dec{
    height:591.5px;
    /* border: 2px solid green; */
}
.cards{
    margin-top:40px;
    display:flex;
    justify-content:space-around;
}
.card-title{
    text-align:center;
    border: 2px solid grey;
    flex-basis: 18%;
}
</style>
</head>
<body>
<div class="main-destination">
<header>
   <div class="top-header">
       <div class="max-width">
            <nav class="menu-link-1">
              <div class="log-details">
                  <a href=""><i class="fa fa-phone" style="font-size: 16px ;color: #ffffff ;margin-right: 10px ;"  ></i>+254 707 020 820</a>
                  <a href=""> <i class="fa fa-envelope-o" style="font-size: 16px ;color: #ffffff ;margin-left: 30px ;margin-right: 10px ;"  ></i>info@safarisKenya.com</a>
              </div>
                <ul>
                  <li><a href=""><i class="fa fa-facebook"></i></a></li>
                  <li><a href=""><i class="fa fa-twitter" ></i></a></li>
                  <li><a href=""></a><i class="fa fa-instagram" ></i></li>          
                </ul>
            </nav>
       </div>
   </div>
   <div class="bottom-header">
   <div class="max-width">
        <nav class="menu-link-2">
          <div class="log-bottom">
              <div class="logg-image">
                <img src="images/loo.png" alt="">
              </div>
          </div>
                <ul>
                  <li><a href="#">Destinations</a></li>
                  <li><a href="viewbooking.php">My Bookings</a></li>
                  <li><a href="feedback.php">Feedback</a></li>     
                  <li><a href="logout.php">SignOut</a></li>         
                </ul>
            </nav>
   </div>
   </div>
</header>
<div class="text-dec">
       
</div>
</div>
<div class="places max-width">
     <div class="cards">
        <?php  
           $select  = mysqli_query($conn,"select * from destinations");
           while($row=mysqli_fetch_array($select)){
                  $destination_id = $row['destination_id'];
            ?>
                    <div class="card-title">
                        <p><i class="fa fa-map-marker" style="color:dodgerblue;font-size:25px;margin-right:10px;"></i> <?php echo $row['location'];?></p>
                        <p><a href="logdestination.php?destination_id=<?php echo $destination_id; ?>" style="color:green;font-weight:900;">VIEW TOUR</a></p>
                    </div>
            <?php
           }
        ?>
     </div>
     <br>
     <br>
</div>
</body>
</html>