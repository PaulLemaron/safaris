<?php  
include("../includes/dbconnection.php");
$message="";
if($_POST){
    $locations = $_POST['location'];
    $desc = $_POST['desc'];
	$price = $_POST['price'];
    $dimg  = $_FILES['dimg']['name'];
    $location = "images/".$dimg;

    if($_FILES['dimg']['size'] != 0)
	  {
		$insert = mysqli_query($conn, "insert into destinations (location,description,dimage,price) values('$locations','$desc','$dimg','$price')");

		if($insert && move_uploaded_file($_FILES['dimg']['tmp_name'], $location))
		{
			$message = "Destination Uploaded sucessfully.";
            header("location:../destinations.php?message=$message");
		}
		else
		{
			$message = "Error.";
            header("location:../destinations.php?message=$message");
		}
	   }
	else
	  {
	  	 $message =">Please upload an Image.";
           header("location:../destinations.php?message=$message");
	  }
}
?>