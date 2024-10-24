<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TOURISM MANAGEMENT SYSTEM</title>
<style>
.message{
    color:tomato;
    font-style: italic;
}
</style>
</head>
<body>
<?php include("includes/header.php")?>
<section class="main">
<div class="login-form"><br>
              <h2 style="color:dodgerblue;">User signup form</h2>
              <?php
                    if(isset($_REQUEST['message']))
                    {
                      $message = $_REQUEST['message'];
                      echo "<p class='message'>".$message."</p>";
                    }
                ?>
              <br>
              <form action="php_action/signup.php" method="post">
                <input type="text" placeholder="Enter Fullnames" name="fullname" required><br>
                <br>
                <input type="email" placeholder="Enter Email" name="email" required><br>
                <br>
                <input type="password" placeholder="Enter new Password" name="password" required><br>
                <br>
                <input type="password" placeholder="Confirm new Password" name="cpassword" required><br>
                <br>
                <input type="submit" value="Registration">
              </form>
           </div> 
        </section>
</body>
</html>