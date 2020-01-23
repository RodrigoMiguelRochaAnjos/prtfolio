<?php
if(isset($_GET['s']) && $_GET['s']!=""){
  $Conn= mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  mysqli_set_charset($Conn, "utf8");
  $search="%".$_GET['s']."%";
  $stmt = mysqli_prepare($Conn,"select ip_address,visit_date from visits where ip_address like ? or visit_date like ?");

    /* bind parameters for markers */
    $stmt->bind_param("ss", $search,$search);

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($ip,$date);

    /* fetch value */

    echo "<li> <span> <b>IP</b> </span> <span> <b>Data da visita</b> </span></li>";
    while($stmt->fetch()){
      echo "<li> <span>".$ip."</span>   <span>".$date."</span></li>";
    }


    /* close statement */
    $stmt->close();


}else{
  $Conn= mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  mysqli_set_charset($Conn, "utf8");
  $search="%".$_GET['s']."%";
  $stmt = mysqli_prepare($Conn,"select ip_address,visit_date from visits");

    /* execute query */
    $stmt->execute();

    /* bind result variables */
    $stmt->bind_result($ip,$date);

    /* fetch value */

    echo "<li> <span> <b>IP</b> </span> <span> <b>Data da visita</b> </span></li>";
    while($stmt->fetch()){
      echo "<li> <span>".$ip."</span>   <span>".$date."</span></li>";
    }


    /* close statement */
    $stmt->close();



}

 ?>
