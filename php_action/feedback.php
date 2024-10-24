<?php
  include("../includes/dbconnection.php");
  $message="";
  if($_POST){
    $feed = $_POST['feed'];
    $user_id = $_POST['user_id'];
    $insert = mysqli_query($conn,"insert into feedback (feedback,user_id) values('$feed','$user_id')");
    if($insert){
        $message = "Thank you for your feedback.";
        header("location:../viewbooking.php?message=$message");
    }
    else{
        $message = "Error.";
        header("location:../feedback.php?message=$message");
    }
  }
?>