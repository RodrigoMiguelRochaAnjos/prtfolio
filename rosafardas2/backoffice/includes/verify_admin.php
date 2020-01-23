<?php
session_start();
if(isset($_SESSION['AdminEmail']) && $_SESSION['AdminEmail']!="" ){
  $Conn=mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  mysqli_set_charset($Conn,"utf8");
  $stmt=mysqli_prepare($Conn,"select Email from ausers where Email=?");
  $stmt->bind_param("s",$_SESSION['AdminEmail']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($Email);
  if($stmt->num_rows>0){
    $stmt->fetch();

    if($_SESSION['AdminEmail']==$Email){

    }else{
      header('location: login.php');
    }
  }else{
    header('location: login.php');
  }
  mysqli_close($Conn);
}else{
  header('location: login.php');

}


 ?>
