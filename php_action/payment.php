<?php 
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $amount = $_POST['amount'];
    $ref_number = $_POST['ref_number'];
    $user_id = $_POST['user_id'];
    $book_id = $_POST['book_id'];
    $insert = mysqli_query($conn,"insert into payments (amount,ref_number,user_id,book_id) values('$amount','$ref_number','$user_id','$book_id')");
    if($insert){
        $message = "Payment Done.";
        header("location:../viewbooking.php?message=$message");
        $update = mysqli_query($conn,"update bookings set book_status='Paid' where book_id='$book_id'");
    }
    else{
        $message = "Error.";
        header("location:../payment.php?message=$message");
    }
}
?>

