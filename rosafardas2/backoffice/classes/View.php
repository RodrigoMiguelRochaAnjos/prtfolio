<?php
class View extends Controller{
  
  function setImg($id,$fileName,$fileError,$fileSize,$fileTmp,$category){
    $ext=explode('.', $fileName);
    $fileActualExt=strtolower(end($ext));

    $allowed=array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowed)){
      if($fileError===0){
        if($fileSize <=30000000){
          $this->deleteImg($id);

          $path=explode(' ',$category);
          $path=end($path);

          $fileActualName=$path.'/'.uniqid('', true).'.'.$fileActualExt;

          $this->updateImg($id,$fileActualName,$fileTmp);
        }
      }
    }
  }
  function showID($id){
    $datas=$this->getID($id);
    if(!empty($datas)){
      foreach($datas as $data){
        echo '

        <input id="myId" type="hidden" value="'.$id.'">
        <div class="row">
          <div class="col-md-5">
                  <img src="../images/'.$data['img'].'" style="width:100%;" alt="">

          </div>

          </div>
          <div class="row">
          <div class="editar justify-content-center p-5 text-justify">
            <h1 >Português</h1>
            <div class="border">
              <b>Titúlo:</b>
              <input id="Titulo" type="text" value="'.$data['Name'].'">
            </div>
            <div class="border">
              <b>Descrição:</b>
              <textarea id="Descricao">'.$data['Descricao'].'</textarea>
            </div>
            <div class="border">
            <b>sub-categoria:</b>
            <input id="Sub" type="text" value="'.$data['Sub'].'" >
            </div>
            <h2 style=" display:inline-block; padding:50px; text-align: center; width:100%;"><input id="Preco" type="number" value="'.$data['Preco'].'" >€</h2>
          </div>
        </div>';
      }
    }
  }
  function showUser($id){
    $datas=$this->getUser($id);
    if(!empty($datas)){
      foreach($datas as $data){
        echo "
        <input type='hidden' id='id' value='".$data['ID']."'>
        <ul id='user'>
          <li><b>Nome:</b><input id='Nome' type='text' value='".$data['Nome']."'></li>
          <li><b>Email:</b><input id='Email' type='text' value='".$data['Email']."'></li>
          <li><b>Token:</b><input id='Token' type='text' value='".$data['token']."'></li>
          <li><b>Email Confirmed:</b><input id='EmailConfirmed'  type='text' value='".$data['isEmailConfirmed']."'></li>
          <li><b>dateCreated:</b><input id='date' type='text' value='".$data['dateCreated']."'></li>
        </ul>
        <br>";
      }
    }
  }
  function authUserA($Email,$Pass){
    $msg=$this->selectUserA($Email,$Pass);
    return $msg;
  }
  function createUser($Nome,$Email,$Pass,$Pass1){
    if($Nome=="" || $Nome==null
    || $Email=="" || $Email==null
    || $Pass=="" || $Pass==null
    || $Pass1=="" || $Pass1==null ){
      return "<span style='color:white;'>Porfavor preencha todos os campos</span>";
    }else if($Pass != $Pass1){
      return "<span style='color:white;'>As passwords que introduziu nao coincidem</span>";
    }else if(strlen($Pass) <= 6 && strlen($Pass) >= 16){
      return "<span style='color:white;'>A password que introduziu não está entre 6-16 caracteres</span>";
    }else if(strlen($Pass1) <= 6 && strlen($Pass1) >= 16){
      return "<span style='color:white;'>A password que introduziu não está entre 6-16 caracteres</span>";
    }else if(!preg_match("/[A-Z]/",$Pass)){
      return "<span style='color:white;'>A password que introduziu não contem pelo menos uma letra maiuscula</span>";
    }else if(!preg_match("/[a-z]/",$Pass)){
      return "<span style='color:white;'>A password que introduziu não contem pelo menos uma letra minuscula</span>";
    }else if(!preg_match("/[A-Z]/",$Pass1)){
      return "<span style='color:white;'>A password que introduziu não contem pelo menos uma letra maiuscula</span>";
    }else if(!preg_match("/[a-z]/",$Pass1)){
      return "<span style='color:white;'>A password que introduziu não contem pelo menos uma letra minuscula</span>";
    }else if(!preg_match('~[0-9]~',$Pass)){
      return "<span style='color:white;'>A password que introduziu não contem pelo menos um numero de [0-9]</span>";
    }else if(!preg_match('~[0-9]~',$Pass1)){
      return "<span style='color:white;'>A password que introduziu não contem pelo menos um numero de [0-9]</span>";
    }else{
      $Email=$this->connect()->real_escape_string($Email);
      $Pass=$this->connect()->real_escape_string($Pass);
      $Nome=$this->connect()->real_escape_string($Nome);

      if($this->checkEmail($Email)){
        #if($this->mailTo($Email)){

          if($this->register($Nome,$Pass,$Email)){
            return "<span style='color:white;'>sucesso</span>";
          }else{
            return "<span style='color:white;'>Erro interno do servidor</span>";
          }
        #}else{
        #  return "<span style='color:white;'>Não foi possivel enviar o Email</span>";
        #}
      }else{
        return "<span style='color:white;'>O Email que inseriu já está utilizado</span>";
      }

      # return $this->register($Nome,$Pass,$Token);
    }
  }
}

?>
