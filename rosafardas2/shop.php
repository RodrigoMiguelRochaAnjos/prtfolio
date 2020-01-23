<?php
session_start();
include 'includes/view.php';
include 'includes/autoload.php';
include 'includes/visits.php';
$ver=new View();
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Rosafardas</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <a id="logo" href="index.php">
      <img src="images/RosaFardas2.png" alt="">
    </a>

    <div class="content">
      <div class="filter">
        <h2>Men's Clothing</h2>

        <ul>
          <b>Men's Clothing</b>
          <?php $ver->showCategoria(); ?>
        </ul>
        <ul>
          <b> Concept </b>
          <?php $ver->showCategoria(); ?>
        </ul>
      </div>
      <div class="products">

      </div>
      <input id="cate" type="hidden" value="
      <?php
      if(!isset($_GET['cat']) || $_GET['cat']==""){
      }else {
        echo $_GET['cat'];
      } ?>
      ">
      <input id="page" type="hidden" name="" value="
      <?php
      if(!isset($_GET['page']) || $_GET['page']=="" || !is_numeric($_GET['page']) ){
        echo 0;
      }else {
        echo $_GET['page']-1;
      } ?>">
    </div>
    <?php include 'includes/footer.php'; ?>
    <script type="text/javascript" src="js/main.js">

    </script>
    <script type="text/javascript">
    jQuery(function($){
      var page= $("#page").val();
      var category= $("#cate").val();
      getData(page,$.trim(category));
    });
    function getData(pag,c){
      $.ajax({
        url: 'getHomem.php?cat='+c+'&page='+pag,
        method: 'POST',
        dataType: 'text',
        success: function (response){
          $(".products").append(response)
        }
      })
    }
    </script>
  </body>
</html>
