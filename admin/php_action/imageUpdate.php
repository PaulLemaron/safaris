<?php 
include("../includes/dbconnection.php");

$message = "";

if($_POST)
{
    $destination_id = $_POST['destination_id'];
    $imgfile=$_FILES["editProductImage"]["name"];

// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");

// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
//$imgnewfile=md5($imgfile).$extension;
$imgnewfile=$imgfile.$extension;
// Code for move image into directory
move_uploaded_file($_FILES["editProductImage"]["tmp_name"],"images/".$imgnewfile);
// Query for insertion data into database
$query=mysqli_query($conn,"update destinations set dimage='$imgnewfile' where destination_id ='$destination_id'");
if($query)
{
//$successmsg="Profile ";
            $message = "Image photo Updated Successfully !!.";
			header("location:../destinations.php?message=$message");
}
else
{
//$errormsg="Profile photo not updated !!";
         
$message = "Image not updated !!.";
header("location:../destinations.php?message=$message");


}
}
}
?>