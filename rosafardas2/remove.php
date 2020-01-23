<?php
session_start();
if(isset($_GET['id'])){
  array_splice($_SESSION['cart'],$_GET['id'],1);
  header('Location: cart.php');
}

 ?>
