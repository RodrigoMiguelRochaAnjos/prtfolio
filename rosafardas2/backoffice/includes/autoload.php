<?php
if(!isset($_SESSION['Email'])){
  $_SESSION['Email']="";
}
if(!isset($_SESSION['Nome'])){
  $_SESSION['Nome']="";
}
spl_autoload_register("autoload");
function autoload($FileName){
  include_once 'classes/'.$FileName.'.php';
}

 ?>
