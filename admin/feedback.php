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
            <h4>USERS FEEDBACK</h4>
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
        <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Email</th>
                        <th>Message</th>     
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $select = mysqli_query($conn,"select * from feedback join users on users.user_id=feedback.user_id");
                       $counter = 1;
                       while($rowcompany=mysqli_fetch_array($select)){
                         //$destination_id  = $rowcompany['destination_id'];
                        ?>
                        <tr>
                            <td><?php echo $counter; ?></td>
                            <?php $counter++; ?>
                            <td><?php echo $rowcompany['email'];?></td>
                            <td><?php echo $rowcompany['feedback'];  ?></td>
                        
                       </tr>
                       <?php
                       }
                    ?>
                </tbody>
               </table>
           <!-- END OF SUMMARY-HERO SECTION -->
        </div>
    </section>
    <div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="form-horizontal" id="submitBrandForm" action="php_action/destionation.php" method="POST" enctype="multipart/form-data">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title"><i class="fa fa-plus"></i> Add Destination</h3>
        </div>

      <div class="modal-body"> 
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">Location </label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="firstName" name="location" placeholder="Enter First Name" required>
                </div>
          </div><!-- /form-group--> 

          <div class="form-group">
            <label for="branchName" class="col-sm-3 control-label">Description</label>
            <label class="col-sm-1 control-label">: </label>
            <div class="col-sm-8">
               <textarea name="desc" id="" cols="30" rows="10">

               </textarea>
            </div>
          </div> <!-- /form-group--> 
          <div class="form-group">
            <label class="control-label col-sm-3" for="contact">Upload Image</label>
            <label class="control-label col-sm-1">:</label>
            <div class="col-sm-8">
            <input type="file" class="form-control" name="dimg">
            </div>
          </div><!-- /form-group-->  
          <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">  Price </label>
                <label class="col-sm-1 control-label">: </label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="firstName" name="price" placeholder="Enter Price" required>
                </div>
          </div><!-- /form-group-->                

        </div> <!-- /modal-body -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
          <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>
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