<?php
include 'includes/verify_admin.php';

if(isset($_GET['id']) && $_GET['id'] !=null && $_GET['id']!=""){
    $ID=$_GET['id'];

    $Conn=mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
    mysqli_set_charset($Conn,"utf8");

    $result=mysqli_prepare($Conn,"delete from users where id=?");
    $result->bind_param("i",$ID);
    $result->execute();
    $result->close();
    $Conn->close();
    header('Location: utilizadores.php');
}else{
  header('Location: utilizadores.php');
}
?>
