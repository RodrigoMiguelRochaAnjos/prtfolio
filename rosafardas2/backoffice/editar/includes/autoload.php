<?php
  spl_autoload_register("autoload");

  function autoload($Name){
    include_once 'classes/'.$Name.'.php';
  }
 ?>
