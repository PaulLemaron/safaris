<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $t_visitor = $_POST['t_visitor'];
    $v_date = $_POST['v_date'];
    $book_date = $_POST['book_date'];
    $book_day = $_POST['book_day'];
    $book_price = $_POST['book_price'];
    $user_id = $_POST['user_id'];
    $destination_id = $_POST['destination_id'];
    //total_amount
    $total_amount = $t_visitor * $book_price;
    //checkbooking
    $checkbook = mysqli_query($conn,"select * from bookings where destination_id='$destination_id' and visit_date='$v_date'");
    if(mysqli_num_rows($checkbook) > 0){
        echo "<script>alert('You have already Booked')</script>";
        echo "<script>window.location = '../logdestionation.php'</script>";
        //$message = "You have already Booked.";
        //header("location:../.php?message=$message");
    }
    else{
         $insert = mysqli_query($conn,"insert into bookings (total_visitors,visit_date,book_date,book_day,user_id,destination_id,total_amount) values ('$t_visitor','$v_date','$book_date','$book_day','$user_id','$destination_id','$total_amount')");
         if($insert){
            echo "<script>alert('Your Booking was successfull')</script>";
            echo "<script>window.location = '../logdestionation.php'</script>";
         }
         else{
            echo "<script>alert('Sorry, Error occored Retry again')</script>";
        echo "<script>window.location = '../logdestionation.php'</script>";
         }
    }
}
?>