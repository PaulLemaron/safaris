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
              <h2 style="color:#6e928a;">Admin Login</h2>
              <?php
                    if(isset($_REQUEST['message']))
                    {
                      $message = $_REQUEST['message'];
                      echo "<p class='message'>".$message."</p>";
                    }
                ?>
              <br>
              <form action="php_action/index.php" method="post">
                <input type="text" placeholder="Enter Username" name="username"><br>
                <br>
                <input type="password" placeholder="Enter Password" name="password"><br>
                <br>
                <input type="submit" value="Login">
              </form>
           </div> 
        </section>
</body>
</html>