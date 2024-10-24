<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $locations = $_POST['location'];
    $desc = $_POST['desc'];
	$price = $_POST['price'];
    $destionation_id = $_POST['destionation_id'];
    $insert = mysqli_query($conn,"update destinations set location='$locations',description='$desc',price='$price' where destination_id='$destionation_id'");
    if($insert)
		{
			$message = "Destination details updated sucessfully.";
            header("location:../destinations.php?message=$message");
		}
		else
		{
			$message = "Error.";
            header("location:../destinations.php?message=$message");
		}
}
?>