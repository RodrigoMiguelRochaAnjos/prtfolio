<?php
  include 'includes/autoload.php';
  $ver = new View();
if(!isset($_GET['page']) || !is_numeric($_GET['page'])){
  header('Location: index.php');
}

if($_GET['cat']!="" && $_GET['cat']!=null){
  $ver->showCatProducts($_GET['page'],"Men",$_GET['cat']);
}else{
  $ver->showProducts($_GET['page'],"Men");
}

 ?>
