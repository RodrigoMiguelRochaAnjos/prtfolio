<?php
    header('Content-Type: application/json');
    include 'includes/autoload.php';
    $ver=new View();
    $uploaded=array();
    if(!empty($_FILES['files']['name'][0])){
        $filesName=$_FILES['files']['name'];
        $filesType=$_FILES['files']['type'];
        $filesTmp=$_FILES['files']['tmp_name'];
        $filesError=$_FILES['files']['error'];
        $filesSize=$_FILES['files']['size'];

        $folder=$_POST['folder'];

        $ver->upload_file($folder,$filesName,$filesType,$filesTmp,$filesError,$filesSize);
    }

?>
