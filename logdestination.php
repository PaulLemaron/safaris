<?php 
include_once("admin/includes/dbconnection.php"); ?>
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
    height: 40vh;
    background-image: url("images/r.jpg");
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
.imgg-content{
    display:flex;
    justify-content: space-between;
}
.sid-img{
   flex-basis: 60%;
   /* border:2px solid grey; */
   /* align-items:center; */
   text-align:center;
}
.other-side{
    flex-basis: 30%;
   /* border:2px solid green; */
}
.side-content p{
    padding:20px;
    border-bottom: 1px solid green;
} 
.sid-title{
    /* border: 1px solid yellow; */
    width: 600px;
    margin:auto;
    height: 300px;
}
.sid-img h3{
    text-decoration:underline;
}
.sid-title img{
     width:100%;
     height:100%;
}
input[type="number"],input[type="date"]{
    width: 80%;
    height: 40px;
    padding-left: 10px;
}
.btn{
    background: #6e928a !important;
    border: none;
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
                  <li><a href="logview.php">Destinations</a></li>
                  <li><a href="viewbooking.php">My Bookings</a></li>
                  <!-- <li><a href="login.php">Login</a></li>      -->
                  <li><a href="logout.php">SignOut</a></li>         
                </ul>
            </nav>
   </div>
   </div>
</header>
<div class="text-dec">
</div>
</div>
<div class="max-width">
     <?php  
           $destination_id = $_REQUEST['destination_id'];
           $select  = mysqli_query($conn,"select * from destinations where destination_id='$destination_id'");
           $row=mysqli_fetch_array($select);
                  //$destination_id = $row['destination_id'];
            
    ?>
      <div class="imgg-content">
            <div class="sid-img">
            <center><h3>Location: <?php echo $row['location']; ?></h3></center>
            <br>
            <br>
                  <div class="sid-title">
                  <img src="admin/php_action/images/<?php echo $row['dimage'];?>">
                  </div>
                  <div class="sid-desc">
                         <h3>Location Description</h3>
                        <p><?php echo $row['description'];  ?></p>
                        <p> <b>Price: </b> <?php echo $row['price'];  ?> Kshs</p>
                         <br>
                       <br>
                       <!-- <a href="login.php">Book Now</a> -->
                       <button class="btn btn-primary button1" data-toggle="modal" data-target="#addBrandModel"> Book Now</button>
                       <br>
                       <br>
                  </div>
            </div>
            <div class="other-side">
                 <div class="side-content">
                      <h4>Why Book with Us ?</h4>
                    <p>No-hassle best price guarantee</p>
                    <p>Customer care available 24/7</p>
                    <p>Hand-picked Tours & Activities</p>
                    <p>Free Travel Insureance</p>
                 </div>
            </div>
      </div>
     <br>
     <br>
</div>
<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="submitBrandForm" action="php_action/book.php" method="POST" enctype="multipart/form-data">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"> You are booking for <?php echo $row['location'];  ?>  Tour</h3>
        </div>

      <div class="modal-body"> 
        <?php 
           $email  = $_SESSION['email'];
           $take = mysqli_query($conn,"select * from users where email='$email'");
           $taken = mysqli_fetch_array($take);
        ?>
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Fullnames </label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="firstName" name="location" value="<?php echo $taken['full_name'];  ?> " readonly>
                </div>
          </div><!-- /form-group--> 
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Email</label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="email" class="form-control" id="firstName" name="location" value="<?php echo $email;  ?>" readonly>
                </div>
          </div><!-- /form-group--> 
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Total Visitors</label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="number" class="form-control" id="firstName" name="t_visitor" min="1" placeholder="Enter Number of Visitors" required>
                </div>
          </div><!-- /form-group--> 
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Visiting Date</label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="date" class="form-control" id="firstName" name="v_date" placeholder="Enter First Name" required>
                </div>
          </div><!-- /form-group--> 
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Booking Date </label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="firstName" name="book_date" value="<?php echo date('d') .' /'.date('m').'/'.date('Y'); ?>" readonly>
                </div>
          </div><!-- /form-group--> 
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Booking Day </label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="firstName" name="book_day" value="<?php echo date('D'); ?>" readonly>
                </div>
          </div><!-- /form-group--> 
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Price </label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="firstName" name="book_price" value="<?php echo $row['price']; ?>" readonly>
                </div>
          </div><!-- /form-group--> 
          <input type="hidden" name="user_id" value="<?php echo $taken['user_id']; ?>">
          <input type="hidden" name="destination_id" value="<?php echo $row['destination_id']; ?>">
                      

        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          
          <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Submit Booking</button>
        </div>
        <!-- /modal-footer -->
      </form>
       <!-- /.form -->

    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
</body>
</html>