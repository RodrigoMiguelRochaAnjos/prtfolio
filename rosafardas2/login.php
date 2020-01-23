<?php
  session_start();
  if(isset($_SESSION['Nome'])){
    header('Location: index.php');
  }
  include 'includes/view.php';
  include 'includes/autoload.php';

  $ver= new View();
  $msg="";
  if(isset($_POST['login'])){
    $msg=$ver->authUser($_POST['email'],$_POST['password']);
  }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Rosafardas</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <a id="logo" href="index.php">
      <img  src="images/RosaFardas2.png" alt="">
    </a>

    <div class="content">
      <form class="" action="login.php" method="post">
        <?php if($msg!="") {
          echo $msg;
        } ?>
        <i class="fa fa-envelope"></i>  <input type="email" name="email" value="" placeholder="Email">
        <i class="fa fa-user"></i> <input type="password" name="password" value="" placeholder="Password">

        <input type="submit" name="login" value="Login">
      </form>

    </div>
    <?php include 'includes/footer.php'; ?>
    <script type="text/javascript" src="js/main.js">

    </script>
  </body>
</html>
