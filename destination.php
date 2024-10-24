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
<?php include_once("includes/header.php"); ?>
<div class="text-dec">
       <div class="content">
            <!-- <h3>Destinations</h3> -->
            <!-- <p>Explore Tours By Destinations</p> -->
       </div>
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
                        <p><a href="view.php?destination_id=<?php echo $destination_id; ?>" style="color:green;font-weight:900;">VIEW TOUR</a></p>
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