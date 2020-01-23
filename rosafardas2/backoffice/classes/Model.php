<?php
class Model{
  protected function connect(){
    $Conn= new mysqli('localhost','Rodrigo','System32','rosafardas3');
    $Conn->set_charset("utf8");
    return $Conn;
  }
}



?>
