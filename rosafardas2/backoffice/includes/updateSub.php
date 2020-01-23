<?php
if(isset($_GET['t']) && $_GET['t']!="" || isset($_GET['id']) && $_GET['id']!=""){
  $Conn= mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  mysqli_set_charset($Conn, "utf8");
  $title=$_GET['t'];
  $ID=$_GET['id'];
  $stmt = mysqli_prepare($Conn,"update armazem set subcategoria=? where ID=?");
  $stmt->bind_param("si", $title,$ID);
  $stmt->execute();
  $stmt->close();


  $stmt = mysqli_prepare($Conn,"update armazemen set subcategoria=? where ID=?");
  $stmt->bind_param("si", $title,$ID);
  $stmt->execute();
  $stmt->close();


  $stmt = mysqli_prepare($Conn,"update armazemes set subcategoria=? where ID=?");
  $stmt->bind_param("si", $title,$ID);
  $stmt->execute();
  $stmt->close();
}else{
}

 ?>
