<?php
class Controller extends Model{

  function updateImg($id,$fileActualName,$fileTmp){
      $mysqli=$this->connect();
      $result=$mysqli->prepare("update armazem set img=? where ID=?");
      $result->bind_param('si',$fileActualName,$id);
      $result->execute();

      $mysqli=$this->connect();
      $result=$mysqli->prepare("update armazemen set img=? where ID=?");
      $result->bind_param('si',$fileActualName,$id);
      $result->execute();

      $mysqli=$this->connect();
      $result=$mysqli->prepare("update armazemes set img=? where ID=?");
      $result->bind_param('si',$fileActualName,$id);
      $result->execute();


      $Destination="../images/".$fileActualName;
      move_uploaded_file($fileTmp,$Destination);
  }
  function insertProduct($Nome,$Categoria,$Preco,$fileActualName,$Descricao,$Sub,$fileTmp){
      $mysqli=$this->connect();
      $result=$mysqli->prepare("insert into armazem(Nome,categoria,	preco,img,	descicao,subcategoria) values(?,?,?,?,?,?)");
      $result->bind_param('ssdsss',$Nome,$Categoria,$Preco,$fileActualName,$Descricao,$Sub);
      $result->execute();
      $Destination="../images/".$fileActualName;
      move_uploaded_file($fileTmp,$Destination);
  }

  protected function getID($id){
    $mysqli=$this->connect();
    $ID1=$mysqli->real_escape_string($id);
    $sql="select * from armazem where ID=?";
    $result=$mysqli->prepare($sql);
    $result->bind_param('i',$ID1);
    $result->execute();
    $result->bind_result($ID,$Name,$category,$preco,$img,$descricao,$sub);
    $result->store_result();

    if($result->num_rows>0){
      while($result->fetch()){
        $datas[]= [
          'ID' => $ID,
          'Name' => $Name,
          'Category' => $category,
          'Preco' => $preco,
          'img' => $img,
          'Descricao' => $descricao,
          'Sub' =>$sub
        ];
      }
      return $datas;
    }
  }
  protected function getUser($id){
    $mysqli=$this->connect();
    $ID1=$mysqli->real_escape_string($id);
    $sql="select u.id, u.name, u.email, u.password, u.address, u.country, u.postal_code,u.isEmailConfirmed, u.token, u.dateCreated from users u where ID=?";
    $result=$mysqli->prepare($sql);
    $result->bind_param('i',$ID1);
    $result->execute();
    $result->bind_result($ID,$Nome,$Email,$Pass,$address,$country,$postal_code,$isEmailConfirmed,$token,$dateCreated);
    $result->store_result();

    if($result->num_rows>0){
      while($result->fetch()){
        $datas[]= [
          'ID' => $ID,
          'Nome' => $Nome,
          'Pass' => $Pass,
          'Email' => $Email,
          'token' => $token,
          'isEmailConfirmed' => $isEmailConfirmed,
          'address' =>$address,
          'country'=>$country,
          'postal_code' =>$postal_code,
          'dateCreated' =>$dateCreated
        ];
      }
      return $datas;
    }
  }
  protected function mailTo($Email){
    $Email=$this->connect()->real_escape_string($Email);
    $to = $Email;

    // Subject
    $subject = 'Email Confirmation';

    // Message
    $message = '
    <html>
    <head>
      <title>Confirme o seu Email</title>
    </head>
    <body>
      porfavor carregue no link para confirmar o seu Email

      <a href="#">Click Here</a>
    </body>
    </html>
    ';

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    if (mail($to, $subject, $message, implode("\r\n", $headers))) {
      return true;
    }else{
      return false;
    }
  }
  function deleteImg($id){
      $mysqli=$this->connect();
      $result=$mysqli->prepare("select img from armazem where ID=?");
      $result->bind_param("i",$id);
      $result->execute();
      $result->store_result();
      $result->bind_result($img);
      if($result->num_rows>0){
        $result->fetch();
        unlink("../images/".$img);
      }
  }
  function selectUserA($Email,$Pass){
    $mysqli=$this->connect();
    $sql=$mysqli->prepare("select name,email,password from ausers where email=?");
    $sql->bind_param('s',$Email);
    if($sql->execute()){
      $sql->store_result();
      $sql->bind_result($Nome,$Email1,$Pass1);
      if($sql->num_rows>0){
        $sql->fetch();
        if(password_verify($Pass, $Pass1)){
          $_SESSION['AdminEmail']=$Email;
          $NewName=explode(' ',$Nome);
          $_SESSION['ANome']=reset($NewName);
          header('Location: index.php');
          return "Sucesso";
        }else{
          return "A password que introduziu está errada";
        }
      }else{
        return "O email que introduziu não existe";
      }
    }

  }
  protected function checkEmail($Email){
    $mysqli=$this->connect();
    $sql=$mysqli->prepare("select ID from users where Email=?");
    $sql->bind_param('s',$Email);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($ID);
    if($sql->num_rows>0){
      return false;
    }else{
      return true;
    }
  }
}

 ?>
