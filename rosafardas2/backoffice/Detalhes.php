<?php
include 'includes/verify_admin.php';
  include 'includes/autoload.php';

  $ver= new View();
  $ID=null;
  if(isset($_POST['submit']) && isset($_GET['id']) && $_GET['id'] !=null && $_GET['id']!=""){
    $file= $_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileType=$_FILES['file']['type'];
    $fileTmp=$_FILES['file']['tmp_name'];
    $fileError=$_FILES['file']['error'];
    $fileSize=$_FILES['file']['size'];

    $ver->setImg($_GET['id'],$fileName,$fileError,$fileSize,$fileTmp,$_GET['cate']);
  }
  if(isset($_GET['id']) && $_GET['id'] !=null && $_GET['id']!=""){
      $ID=$_GET['id'];
  }else{
    header('Location: editar_loja.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/detalhes.css">
    <title>RosaFardas - Inicio</title>
    <style media="screen">
      i{
        padding: 10px;
        border: 2px solid black;
        float: left;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <div class="content">
      <div class="container">

        <form class="" action="Detalhes.php?cate=<?php echo $_GET['cate']; ?>&id=<?php echo $ID; ?>" method="post" enctype="multipart/form-data">
          <input type="file" name="file" value="">
          <input type="submit" name="submit" value="upload">

        </form>
        <a class="back" href="editar_loja.php?cate=<?php echo $_GET['cate']; ?>"><i onclick="" id="go-back" class="fa fa-arrow-left"></i></a>
        <center>
          <?php if($ID != null); $ver->showID($ID);$ver->showIDEN($ID);$ver->showIDES($ID); ?>

        </center>
      </div>
    </div>
    <script type="text/javascript" src="js/navbar.js"></script>
    <script type="text/javascript" src="js/detalhes.js"></script>

  </body>
</html>
