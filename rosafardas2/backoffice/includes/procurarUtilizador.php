
<?php
if(isset($_GET['s']) && $_GET['s']!=""){
  $Conn= mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  mysqli_set_charset($Conn, "utf8");
  $search="%".$_GET['s']."%";
  $stmt = mysqli_prepare($Conn,"select id, name, email, dateCreated from users where name like ? or email like ? or dateCreated like ?");

    /* bind parameters for markers */
    $stmt->bind_param("sss", $search,$search,$search);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($ID,$Nome,$Email,$date);

    /* fetch value */

    echo "<li> <span> <b>Nome</b> </span>   <span> <b>Email</b> </span> <span> <b>Data de Criação</b> </span> <span> <b>Opções</b> </span></li>";
    while($stmt->fetch()){
      echo "<li> <span>".$Nome."</span>   <span>".$Email."</span> <span>".$date."</span> <span><a href='editar_utilizador.php?id=".$ID."'>editar</a> <a class='Delete_link' href='remover_utilizador.php?id=".$ID."'>remover</a></span></li>";

    }


    /* close statement */
    $stmt->close();


}else{
  $Conn= mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  mysqli_set_charset($Conn, "utf8");
  $stmt = mysqli_prepare($Conn,"select id, name, email, dateCreated from users");


    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($ID,$Nome,$Email,$date);

    /* fetch value */
    echo "<li> <span> <b>Nome</b> </span>   <span> <b>Email</b> </span> <span> <b>Data de Criação</b> </span > <span> <b>Opções</b> </span></li>";
    while($stmt->fetch()){
      echo "<li> <span>".$Nome."</span>   <span>".$Email."</span> <span>".$date."</span> <span><a href='editar_utilizador.php?id=".$ID."'>editar</a> <a class='Delete_link' href='remover_utilizador.php?id=".$ID."'>remover</a></span></li>";

    }
    /* close statement */
    $stmt->close();


}
?>
