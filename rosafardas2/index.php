<?php
session_start();
include 'includes/view.php';
include 'includes/visits.php';
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Rosafardas</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <a id="logo" href="index.php">
      <img  src="images/RosaFardas2.png" alt="">
    </a>

    <div class="content">
      <div class="images">
        <a href="shop.php">
          <img src="images/Men/123.jpg" alt="">
          <div class="cover">
            <span>
              <h1>Men's</br>Clothing</h1>
              See More
            </span>
          </div>
        </a>
        <a href="Mulher.php">
          <img src="images/Women/123.jpg" alt="">
          <div class="cover">
            <span>
              <h1>Women's</br>Clothing</h1>
              See More
            </span>
          </div>
        </a>
        <a href="Crianca.php">
          <img src="images/Children/123.jpg" alt="">
          <div class="cover">
            <span>
              <h1>children's</br>Clothing</h1>
                See More
            </span>
          </div>
        </a>

      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script type="text/javascript" src="js/main.js">

    </script>
  </body>
</html>
