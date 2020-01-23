<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    </script>
    <title></title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <div class="content" id="content">
      <div id="dropZone">
        <h1>Drag and drop files...</h1>
      </div>
      <div id="images">

      </div>
      <input type="hidden" id="page" value="<?php
      if(!isset($_GET['page']) || $_GET['page']=="" || !is_numeric($_GET['page'])){
        echo '1';
      }else if($_GET['page']<=0){
        echo '1';
      }else{
        echo $_GET['page'];

      } ?>">
      <input type="hidden" id="folder" value="Children">
      <h1 id="progress"></h1></br></br>
      <div id="files"></div>
    </div>
    <script type="text/javascript" src="js/main.js">

    </script>

  </body>
</html>
