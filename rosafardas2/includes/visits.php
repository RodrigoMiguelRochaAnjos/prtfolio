<?php
  $Conn= mysqli_connect('localhost','Rodrigo','System32','rosafardas3');
  #$Conn= mysqli_connect("94.126.169.160","rosafard_rosafardas","rosa2018%","rosafard_rosafardas");
  mysqli_set_charset($Conn, "utf8");
  $visitor_ip=$_SERVER['REMOTE_ADDR'];


  $result= mysqli_query($Conn,"select * from visits WHERE ip_address='$visitor_ip'");
  if(!$result){
    die("error");
  }
  $totalVisitors=mysqli_num_rows($result);
  if($totalVisitors<1){
    $result= mysqli_query($Conn,"insert into visits(ip_address, visit_date) values('$visitor_ip',now())");
  }else{
    $result= mysqli_query($Conn,"update visits set visit_date=now() where id_address='$visitor_ip'");
  }
  mysqli_close($Conn);

?>
