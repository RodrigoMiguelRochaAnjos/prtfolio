<?php
include 'includes/verify_admin.php';

if(isset($_GET['id']) && $_GET['id'] !=null && $_GET['id']!=""){
    $ID=$_GET['id'];
    
   
    $Conn=mysqli_connect("94.126.169.160","rosafard_rosafardas","rosa2018%","rosafard_rosafardas");
    mysqli_set_charset($Conn,"utf8");
    
     $query=mysqli_query($Conn,"select * from armazem where ID=".$_GET['id']);
    if(mysqli_num_rows($query)>0){
      $row=mysqli_fetch_assoc($query);
      unlink("../images/".$row['img']);
    }else{
      
    }
    
    
    
    $result=mysqli_prepare($Conn,"delete from armazem where ID=?");
    $result->bind_param("i",$ID);
    $result->execute();


    $result=mysqli_prepare($Conn,"delete from armazemen where ID=?");
    $result->bind_param("i",$ID);
    $result->execute();


    $result=mysqli_prepare($Conn,"delete from armazemes where ID=?");
    $result->bind_param("i",$ID);
    $result->execute();

    
    
    $result->close();
    $Conn->close();
    header('Location: editar_loja.php?cate='.$_GET['cate']);
}else{
  header('Location: utilizadores.php');
}
?>
