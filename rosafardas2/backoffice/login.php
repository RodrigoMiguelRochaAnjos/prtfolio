<?php
session_start();
  include 'includes/autoload.php';

  $ver= new View();
  $msg="";
  if(isset($_POST['Login'])){
    $msg=$ver->authUserA($_POST['Email'],$_POST['Password']);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/login.css">
    <title>RosaFardas - Login</title>
  </head>
  <body>
    <div class="content">
      <form class="" action="login.php" method="post">
        <h1>Login</h1>

        <i class="fa fa-envelope"></i> <input type="email" name="Email" value="" placeholder="Email" required><br>
        <i class="fa fa-lock"></i><input type="password" name="Password" value="" placeholder="Password" required>
        <input type="submit" name="Login" value="Login">
      </form>
    </div>
    <script type="text/javascript" src="js/navbar.js"></script>

  </body>
</html>
