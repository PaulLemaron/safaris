<?php 
include("../includes/dbconnection.php");
$message="";
if($_POST){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $encryptancy = base64_encode($password);
  if(empty($email) || empty($encryptancy))
  {
       if($email == "")
        {
     	   $message = "Email is required.";
	       header("location:../index.php?message=$message");
        }
     if($encryptancy == "")
     {
     	    $message = "Password is required.";
	        header("location:../index.php?message=$message");
     }
  }
  else
  {
    $login = mysqli_query($conn,"select * from users where email ='$email' and password ='$encryptancy'");

     if(mysqli_num_rows($login)==1)
         {
              
              $row=mysqli_fetch_array($login);
               
              $email = $row['email'];
              $_SESSION['email']=$email;
              $user_id = $row['user_id'];
              $_SESSION['user_id'] = $user_id;

               header("location:../logdestionation.php");
         }
     else
        {
           $message = "Either email or password is incorrect.";
            header("location:../login.php?message=$message");
        }

  }

}
 ?>