<?php
  session_start();
  include 'includes/autoload.php';
  include 'includes/view.php';

  if(
    isset($_GET['id']) && $_GET['id'] != null && is_numeric($_GET['id']) &&
    isset($_POST['tamanho']) && $_POST['tamanho'] != null &&
    isset($_POST['cor']) && $_POST['cor']!=null &&
    isset($_POST['quantidade']) && $_POST['quantidade']!=0
){
    $id=$_GET['id'];
    $tamanho=$_POST['tamanho'];
    $cor=$_POST['cor'];
    $quantidade=$_POST['quantidade'];

    $ver=new View();
    $item=$ver->getId($id);

    array_push($_SESSION['cart'],$item[0]);
    $_SESSION['cart'][intval(sizeof($_SESSION['cart']))-1]["size"]=$tamanho;
    $_SESSION['cart'][intval(sizeof($_SESSION['cart']))-1]["color"]=$cor;
    $_SESSION['cart'][intval(sizeof($_SESSION['cart']))-1]["quantity"]=$quantidade;
    if(isset($_POST['comprar'])){
      header('Location: cart.php');
    }else if(isset($_POST['adicionar'])){
      header('Location: shop.php');
    }
  }else {
    header('Location: detalhes.php?id='.$_GET['id']);
  }
?>
