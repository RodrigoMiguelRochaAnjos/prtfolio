<?php
    include 'includes/autoload.php';
    $ver= new View();
    if(!isset($_GET['page']) || !is_numeric($_GET['page'])){
        die();
      }

    $ver->showProducts($_GET['folder'],$_GET['page']);
?>
