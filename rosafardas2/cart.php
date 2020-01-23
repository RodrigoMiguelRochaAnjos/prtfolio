<?php
session_start();
include 'includes/view.php';
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Rosafardas</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <a id="logo" href="index.php">
      <img  src="images/RosaFardas2.png" alt="">
    </a>

    <div class="content">
      <ul id="cart">
        <?php
        $actual_price=0;
        foreach ($_SESSION['cart'] as $value) {
          echo '<li><span><img src="images/',$value['section'],'/',$value['src'],'"></span> <span>',$value['nome'],'</span> <span>',$value['size'],'</span> <span>',$value['quantity'],' x ',$value['preco'],'€</span> <span><a href="remove.php?id=',array_search($value['id'],array_column($_SESSION['cart'],'id')),'">remove</a></span></li>';
          $price=intval($value['quantity'])*doubleval($value['preco']);
          $actual_price+=$price;
        }
        echo '<li><span> <b>Total:</b> ',$actual_price,'€ </span>  <span><a href="checkout.php">checkout</a> </span></li>';

        ?>
      </ul>

    </div>
    <?php include 'includes/footer.php'; ?>
    <script type="text/javascript" src="js/main.js">

    </script>
  </body>
</html>
