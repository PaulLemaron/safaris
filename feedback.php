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
   border:2px solid grey;
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
                  <li><a href="logdestionation.php">Destinations</a></li>
                  <li><a href="">My Bookings</a></li>
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
<div class="max-width">
        <h4>FEEDBACK</h4>
        <?php 
                             if(isset($_REQUEST['message']))
                            {
                             $message = $_REQUEST['message'];
                          echo '<div class="alert alert-success alert-dismissible fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  '.$message.'</div>';
                            }
            ?>
      <div class="imgg-content">
        <?php 
        $user_id = $_SESSION['user_id']; 
        ?>
      <form class="form-horizontal" id="submitBrandForm" action="php_action/feedback.php" method="POST" enctype="multipart/form-data">

<div class="form-group">
<label for="productImage" class="col-sm-3 control-label">Feedback </label>
<label class="col-sm-1 control-label">: </label>
    <div class="col-sm-8">
        <!-- the avatar markup -->
          <textarea name="feed" id="" cols="30" rows="10"></textarea>
        
    </div>
</div> <!-- /form-group-->	

<input type="number" name="user_id" value="<?php echo $user_id; ?>"><br>


<button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">Save Changes</button>

</form>
           
      </div>
     <br>
     <br>
</div>
</body>
</html>