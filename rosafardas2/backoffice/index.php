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
    <link rel="stylesheet" href="css/index.css">
    <title>Admin - Painel de Controle</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <div class="inicio">
      <h1> <i class="fa fa-gear"></i> Painel de Controle </h1> <span>Gira o seu Site</span>
    </div>
    <div class="content">
      <div class="place">
        Painel de Controle
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
        <div class="geral-outer">
          <h1>Geral</h1>
          <div  class="geral">

            <a href="utilizadores.php" class="geral-box">
              <div class="nome">
                  <i class="fa fa-user"></i> <span><?php  echo $totalUsers;?></span>
                  <div class="">
                    Utilizadores
                  </div>
              </div>
              </a>
            <a href="paginas.php" class="geral-box">

                <div class="nome">
                    <i class="fa fa-edit"></i> <span>4</span>
                    <div class="">
                      Páginas
                    </div>
                </div>
            </a>
            <a href="visitas.php" class="geral-box">
              <div class="nome">
                  <i class="fa fa-bar-chart"></i> <span><?php  echo $totalVisitors;?></span>
                  <div class="">
                    Visitas
                  </div>
              </div>
            </a>
            <a href="#" class="geral-box">
              <div class="nome">
                  <i class="fa fa-user"></i> <span><?php  echo $totalaUsers;?></span>
                  <div class="">
                    Admins
                  </div>
              </div>
            </a>
          </div>
        </div>
        <div class="uutilizadores">
          <h1>Ultimos utilizadores</h1>
          <ul>
            <li> <span> <b>Nome</b> </span>   <span> <b>Email</b> </span> <span> <b>Data de Criação</b> </span></li>
            <?php

                $result= mysqli_query($Conn,"select * from users order by id desc limit 10");
                if(!$result){
                  die("error");
                }
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                      echo "<li> <span>".$row['name']."</span>   <span>".$row['email']."</span> <span>".$row['dateCreated']."</span></li>";
                  }
                }


            ?>
          </ul>
        </div>
      </div>


    </div>
    <script type="text/javascript" src="js/navbar.js"></script>

  </body>
</html>
