<?php
include 'includes/verify_admin.php';
  $Conn= mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  mysqli_set_charset($Conn, "utf8");
  if(mysqli_connect_errno()){
    die("error");
  }
  #Visitors
  $result= mysqli_query($Conn,"select * from visits");
  if(!$result){
    die("error");
  }
  $totalVisitors=mysqli_num_rows($result);


  #Users
  $result= mysqli_query($Conn,"select * from users");
  if(!$result){
    die("error");
  }
  $totalUsers=mysqli_num_rows($result);
  #Admins
  $result= mysqli_query($Conn,"select * from ausers");
  if(!$result){
    die("error");
  }
  $totalaUsers=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/visitas.css">
    <title>Admin - Visitas</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <div class="inicio">
      <h1> <i class="fa fa-bar-chart"></i> Visitas </h1> <span>Gira o seu Site</span>
    </div>
    <div class="content">
      <div class="place">
        Visitas
      </div>
      <div class="items-left">
        <div class="side-nav">
          <ul>
            <li> <a href="index.php"> <i class="fa fa-gear"></i> Painel de Controle</a> </li>
            <li> <a href="editar"> <i class="fa fa-edit"></i> Páginas</a> </li>
            <li> <a href="utilizadores.php"> <i class="fa fa-user"></i> Utilizadores</a> </li>
            <li> <a href="visitas.php"> <i class="fa fa-bar-chart"></i> Visitas</a> </li>
          </ul>
        </div>
      </div>
      <div class="items-right">
        <div class="uutilizadores">
          <h1>Visitas  <input id="Procurar" type="text" name="" value="" placeholder="Procurar"></h1>
          <ul id="resultado">
            <li> <span> <b>IP</b> </span>   <span> <b>Data de visita</b> </span></li>
            <?php

                $result= mysqli_query($Conn,"select * from visits order by ID desc");
                if(!$result){
                  die("error");
                }
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                      echo "<li> <span>".$row['ip_address']."</span>   <span>".$row['visit_date']."</span> </li>";
                  }
                }


            ?>
          </ul>
        </div>
      </div>


    </div>
    <script type="text/javascript" src="js/navbar.js"></script>
    <script type="text/javascript" src="js/procurarIp.js"></script>

  </body>
</html>
