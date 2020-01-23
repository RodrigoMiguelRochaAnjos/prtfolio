<?php
  include 'includes/autoload.php';
  $ver = new View();
 $ver->searchProducts($_GET['page'],$_GET['q']); ?>
