<?php
session_start();
$q=$_GET['q'];
if(!isset($q) || $q=="" || $q==null){
  header("location:javascript://history.go(-1)");
}
include 'includes/view.php';
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
    <style media="screen">
      .products{
        width: 80% !important;
      }
    </style>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <a id="logo" href="index.php">
      <img src="images/RosaFardas2.png" alt="">
    </a>

    <div class="content">
      <div class="products">

      </div>
      <input id="procurar" type="hidden" value="<?php echo $q; ?>">
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
      var search= $("#procurar").val();
      var page= $("#page").val();
      getData(page,search);
    });
    function getData(pag,q){
      $.ajax({
        url: 'searchQ.php?page='+pag+'&q='+q,
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
