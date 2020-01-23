<?php
/**
 *
 */
class controller extends model
{
  function getProducts($page,$section)
  {
    $mysqli=$this->connect();
    if(!isset($page) || $page=="" || $page==null){
      $page=0;
    }
    $start=$page*9;
    $sec=strval($section);
    $result = $mysqli->prepare("select count(*) over(), p.* from products p inner join section s on s.id = p.id_section where s.name = ? order by p.id desc limit ?,9");
    $result->bind_param("si",$sec,$start);
    if ($result->execute()) {
      $result->bind_result($rows,$id,$src,$preco,$nome,$id_categoria,$id_section);
      $result->store_result();
      $datas=array();
      if($result->num_rows>0){

        while($result->fetch()){
          $datas[]=[
            'id' => $id,
            'src' => $src,
            'preco' => $preco,
            'nome'=>$nome,
            'id_categoria' => $id_categoria,
            'id_section' => $id_section,
            'rows' => $rows
          ];
        }
      }
      return $datas;
    }

  }
  function getCatProducts($page,$section,$category)
  {
    $mysqli=$this->connect();
    if(!isset($page) || $page=="" || $page==null){
      $page=0;
    }
    $start=$page*9;
    $sec=strval($section);
    $cat=strval($category);
    $result = $mysqli->prepare("select count(*) over(), p.* from products p inner join section s on s.id = p.id_section inner join categorias c on p.id_categoria= c.id where s.name = ? and c.name= ? limit ?,9");
    $result->bind_param("ssi",$sec,$cat,$start);
    if ($result->execute()) {
      $result->bind_result($rows,$id,$src,$preco,$nome,$id_categoria,$id_section);
      $result->store_result();
      $datas=array();
      if($result->num_rows>0){

        while($result->fetch()){
          $datas[]=[
            'id' => $id,
            'src' => $src,
            'preco' => $preco,
            'nome'=>$nome,
            'id_categoria' => $id_categoria,
            'id_section' => $id_section,
            'rows' => $rows
          ];
        }
      }
      return $datas;
    }

  }
  function getCategorias(){
    $mysqli=$this->connect();
    $result=$mysqli->prepare("select * from categorias");
    if($result->execute()){
      $result->bind_result($id,$name);
      $result->store_result();
      $datas=array();
      if($result->num_rows>0){
        while($result->fetch()){
          $datas[]=[
            'id'=>$id,
            'name'=>$name
          ];
        }

      }
      return $datas;
    }
  }
  function lookProducts($page,$query)
  {
    $mysqli=$this->connect();
    if(!isset($page) || $page=="" || $page==null){
      $page=0;
    }
    $start=$page*9;
    $q = '%'.strval($query).'%';

    $result = $mysqli->prepare("select count(*) over(),p.*,s.name from products p inner join section s on p.id_section=s.id where p.nome like ? or p.preco like ? limit ?,9");#or p.preco like ? or s.name like ? or c.name like ?
    $result->bind_param("ssi",$q,$q,$start);
    if ($result->execute()) {
      $result->bind_result($rows,$id,$src,$preco,$nome,$id_categoria,$id_section,$cate);
      $result->store_result();
      $datas=array();
      if($result->num_rows>0){

        while($result->fetch()){
          $datas[]=[
            'id' => $id,
            'src' => $src,
            'preco' => $preco,
            'nome'=>$nome,
            'id_categoria' => $id_categoria,
            'id_section' => $id_section,
            'rows' => $rows,
            'category' =>$cate
          ];
        }
      }
      return $datas;
    }

  }
  function getRelatedProducts($cat)
  {
    $mysqli=$this->connect();
    $result = $mysqli->prepare("select * from products where id_categoria=? limit 0,3");
    $result->bind_param("i",$cat);
    if ($result->execute()) {
      $result->bind_result($id,$src,$preco,$nome,$id_categoria,$id_section);
      $result->store_result();
      $datas=array();
      if($result->num_rows>0){
        while($result->fetch()){
          $datas[]=[
            'id' => $id,
            'src' => $src,
            'preco' => $preco,
            'nome'=>$nome,
            'id_categoria' => $id_categoria,
            'id_section' => $id_section
          ];
        }
      }
      return $datas;
    }

  }
  function getId($id)
  {
    $mysqli=$this->connect();
    $result = $mysqli->prepare("select p.*, s.name from products p inner join section s on p.id_section=s.id where p.id=?");
    $result->bind_param("i",$id);
    if ($result->execute()) {
      $result->bind_result($id,$src,$preco,$nome,$id_categoria,$id_section,$section);
      $result->store_result();
      $datas=array();
      if($result->num_rows>0){
        while($result->fetch()){
          $datas[]=[
            'id' => $id,
            'src' => $src,
            'preco' => $preco,
            'nome'=>$nome,
            'id_categoria' => $id_categoria,
            'id_section' => $id_section,
            'section' => $section
          ];
        }
      }
      return $datas;
    }

  }
  function selectUser($Email,$Pass){
    $mysqli=$this->connect();
    $sql=$mysqli->prepare("select email,password,name from users where email=?");
    $sql->bind_param('s',$Email);
    if($sql->execute()){
      $sql->store_result();
      $sql->bind_result($email,$password,$name);
      if($sql->num_rows>0){
        $sql->fetch();
        if(password_verify($Pass, $password)){
          $_SESSION['Email']=$email;
          $_SESSION['Nome']=explode(' ',$name);
          $_SESSION['Nome']=reset($_SESSION['Nome']);
          header('Location: index.php');
        }else{
          return '<span style="color: red; text-align: center; display: block;">A password que introduziu está errada</span>';
        }
      }else{
        return '<span style="color: red; text-align: center; display: block;">O email que introduziu não existe</span>';
      }
    }

  }
  function getEmail($Email)
  {
    $mysqli=$this->connect();
    $result = $mysqli->prepare("select id,name,email,password,address,country,postal_code,isEmailConfirmed,token,dateCreated from users where email=?");
    $result->bind_param('s',$Email);
    if ($result->execute()) {
      $result->bind_result($id,$name,$email,$password,$address,$country,$postal_code,$isEmailConfirmed,$token,$dateCreated);
      $result->store_result();
      $datas=array();
      if($result->num_rows>0){
        while($result->fetch()){
          $datas[]=[
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password'=>$password,
            'address' => $address,
            'country' =>$country,
            'postal_code' => $postal_code,
            'isEmailConfirmed' =>$isEmailConfirmed,
            'token' => $token,
            'dateCreated'=>$dateCreated
          ];
        }
      }
      return $datas;
    }

  }
  function insertUser($name,$email,$password,$address,$country,$postal_code,$token)
  {
    $mysqli=$this->connect();
    $isEmailConfirmed=1;
    $result = $mysqli->prepare("insert into users(name,email,password,address,country,postal_code,isEmailConfirmed,token,dateCreated) values(?,?,?,?,?,?,?,?,now())");
    $result->bind_param('ssssssis',$name,$email,$password,$address,$country,$postal_code,$isEmailConfirmed,$token);
    if ($result->execute()) {
    }

  }
}


?>
