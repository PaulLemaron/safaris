<?php include_once("admin/includes/dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TOURISM MANAGEMENT SYSTEM</title>
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
   /* border:2px solid red; */
   /* align-items:center; */
   text-align:center;
}
.sid-img img{
    width:100%;
    height:100%;
}
.sid-img h3{
    text-decoration:underline;
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
</style>
</head>
<body>
<div class="main-destination">
<?php include_once("includes/header.php"); ?>
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
                       <?php echo $row['description'];  ?><br>
                       <br>
                       <p><b>Price payable:</b> <?php echo $row['price'];  ?> Kshs</p>
                       <p><b>Tours: </b> 
                       <?php 
                       $visits = $conn->query("SELECT * FROM bookings where destination_id='$destination_id' and book_status='Paid'")->num_rows;
                       echo $visits;
                      ?>
                      </p>
                       <a href="login.php">Book Now</a><br>
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
</body>
</html>