<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $encryptancy = base64_encode($password);
    //CHECK EMAIL, PASSWORD MATCH,COMPANY NAME
    $checkemail =mysqli_query($conn,"select * from users where email='$email'");
    if(mysqli_num_rows($checkemail) > 0){
        $message = "User email exists.";
        header("location:../signup.php?message=$message");
    }
    elseif($password != $cpassword){
        $message = "Password and confirm password do not match.";
        header("location:../signup.php?message=$message");
    }
    else{
        $insert = mysqli_query($conn,"insert into users(full_name,email,password) values('$fullname','$email','$encryptancy')");
        if($insert){
            $message = "User registration was successfull.";
            header("location:../login.php?message=$message");
        }
        else{
            $message = "Errrror.";
	        header("location:../signup.php?message=$message");
        }
    }
}
?>