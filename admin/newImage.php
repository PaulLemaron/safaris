<?php include_once("includes/dbconnection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TOURISM MANAGEMENT SYSTEM</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}
table img{
    width:120px;
}

th, td {
  text-align: left;
  padding: 15px !important;
}

tr:nth-child(even){background-color: white}

th {
  background-color: #6e928a;
  color: white;
  /* padding:20px !important; */
}
</style>
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
                <!-- <p><a href="feedback.php"><i class="fa fa-inbox"></i> Feedback</a></p> -->
            </div>
        </div>
        <div class="right-bar">

        <div class="panel-dashboard">
               <ul>
                  <li style="list-style:none !important;"> Welcome back Administrator !!!</li>
               </ul>    
        </div>
        <br>
            <h4>MANAGE DESTINATION</h4>
        <br>
        <?php 
                             if(isset($_REQUEST['message']))
                            {
                             $message = $_REQUEST['message'];
                          echo '<div class="alert alert-success alert-dismissible fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  '.$message.'</div>';
                            }
            ?>
     <?php 
        $destination_id = $_REQUEST['destination_id'];
        $take = mysqli_query($conn,"select * from destinations where destination_id='$destination_id'");
        $display = mysqli_fetch_array($take);
     ?>
     <form class="form-horizontal" id="submitBrandForm" action="php_action/imageUpdate.php" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label for="productImage" class="col-sm-3 control-label">Destionation Image </label>
<label class="col-sm-1 control-label">: </label>
    <div class="col-sm-8">
        <!-- the avatar markup -->
            <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
        <div class="kv-avatar center-block">					        
            <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="editProductImage" class="file-loading" style="width:auto;"/>
        </div>
        
    </div>
</div> <!-- /form-group-->	

<input type="hidden" name="destination_id" value="<?php echo $display['destination_id']; ?>"><br>


<button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>

</form>
           <!-- END OF SUMMARY-HERO SECTION -->
        </div>
    </section>
</div>
</body>
</html>
