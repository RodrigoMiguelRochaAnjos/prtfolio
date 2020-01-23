<?php
  session_start();
  include 'includes/autoload.php';
  include 'includes/view.php';
  $allowed=array('Men','Women','Children');
  if(!isset($_GET['id']) || $_GET['id']== null || !is_numeric($_GET['id']) || !isset($_GET['section']) || $_GET['section']== null || !in_array($_GET['section'],$allowed)){
    header('Location: shop.php');
  }
  $ver = new View();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/detalhes.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Rosafardas</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <a id="logo" href="index.php">
      <img  src="images/RosaFardas2.png" alt="">
    </a>

    <div class="content">
      <?php $ver->showProduct($_GET['id'],$_GET['section']); ?>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script type="text/javascript" src="js/main.js">

    </script>
  </body>
</html>
