<?php
/**
 *
 */
class view extends controller
{
  function showProducts($page,$section)
  {
    $datas=$this->getProducts($page,$section);
    $nr=0;
      foreach ($datas as $data) {
        $nr=$data['rows'];
          echo '<div class="item">
            <a href="detalhes.php?id=',$data['id'],'&section=',$section,'">
            <img src="images/',$section,'/',$data['src'],'" alt="">
            </a>
            <h1><a href="detalhes.php?id=',$data['id'],'&section=',$section,'">',$data['nome'],'</a></h1>
            <p>',$data['preco'],'€</p>
          </div>';


      }
      $a=ceil($nr/9);
      echo '<ul id="pages">';
      for($b=0;$b<$a;$b++){
            echo '<li> <a href="?page=',$b+1,'"class="
            ';
            if($_GET['page']==$b){
              echo 'background';
            }
            echo '
            "> ',$b+1,' </a></li>';
      }
      echo '</ul>';
  }
  function showCatProducts($page,$section,$category)
  {
    $datas=$this->getCatProducts($page,$section,$category);
    $nr=0;
      foreach ($datas as $data) {
        $nr=$data['rows'];
        echo '<div class="item">
          <a href="detalhes.php?id=',$data['id'],'&section=',$section,'">
          <img src="images/',$section,'/',$data['src'],'" alt="">
          </a>
          <h1><a href="detalhes.php?id=',$data['id'],'">',$data['nome'],'</a></h1>
          <p>',$data['preco'],'€</p>
        </div>';
      }
      $a=ceil($nr/9);
      echo '<ul id="pages">';
      for($b=0;$b<$a;$b++){
            echo '<li> <a href="?cat=',$category,'&page=',$b+1,'"class="
            ';
            if($_GET['page']==$b){
              echo 'background';
            }
            echo '
            "> ',$b+1,' </a></li>';
      }
      echo '</ul>';
  }
  function searchProducts($page,$query)
  {
    $datas=$this->lookProducts($page,$query);
    $nr=0;
      foreach ($datas as $data) {
        $nr=$data['rows'];
        echo '<div class="item">
          <a href="detalhes.php?id=',$data['id'],'&section=',$data['category'],'">
          <img src="images/',$data['category'],'/',$data['src'],'" alt="">
          </a>
          <h1><a href="detalhes.php?id=',$data['id'],'&section=',$data['category'],'">',$data['nome'],'</a></h1>
          <p>',$data['preco'],'€</p>
        </div>';
      }
      $a=ceil($nr/9);
      echo '<ul id="pages">';
      for($b=0;$b<$a;$b++){
        echo '<li> <a href="?q=',$query,'&page=',$b+1,'"class="
        ';
        if($_GET['page']==$b){
          echo 'background';
        }
        echo '
        "> ',$b+1,' </a></li>';
      }
      echo '</ul>';
  }
  function showCategoria(){
    $datas=$this->getCategorias();
    foreach($datas as $data){
      echo '<li> <a href="?cat=',$data['name'],'">',$data['name'],'</a> </li>';
    }
  }
  function showRelated($cat,$section)
  {
    $datas=$this->getRelatedProducts($cat);
      foreach ($datas as $data) {
        echo '
        <div class="item">
          <a target="_blank" rel="noopener norefferer" href="detalhes.php?id=',$data['id'],'">
          <img src="images/',$section,'/',$data['src'],'" alt="">

          <h1>',$data['nome'],'</span></h1>
          </a>
        </div>';
      }

  }
  function showProduct($id,$section)
  {
    $datas=$this->getId($id);
      foreach ($datas as $data) {
        echo '
        <div class="imagem">
          <img src="images/',$section,'/',$data['src'],'" alt="">
        </div>
        <div class="conteudo">
        <form action="add.php?id=',$id,'" method="POST">
          <h1>',$data['nome'],'</h1>
          <span>',$data['preco'],'€</span></br>
          <h2>Color</h2>
          <select name="cor">
            <option value="0"></option>
            <option value="Blue">Blue</option>
            <option value="Red">Red</option>
            <option value="Green"selected>Green</option>
            <option value="Yellow">Yellow</option>
            <option value="Orange">Orange</option>
          </select></br>
          <h2>Size</h2>
          <select name="tamanho">
            <option>S</option>
            <option>M</option>
            <option selected>L</option>
            <option>XL</option>
            <option>XXL</option>
          </select></br>
          <h2>Quantity</h2>
          <input type="number" name="quantidade" value="1"></br>
          ';
          if(isset($_SESSION['Nome'])){
            echo '
            <input type="submit" name="comprar" value="Buy Now">
            <input type="submit" name="adicionar" value="Add to Cart">';
          }else{
            echo '
            <a href="register.php">Buy Now</a>
            <a href="register.php">Add to Cart</a>';
          }
          echo '
          </form>
        </div>
        <div class="related">
          <h1>Related</h1>
          ',$this->showRelated($data['id_categoria'],$section),'
        </div>
        ';
      }

  }
  function authUser($Email,$Pass){
    $msg=$this->selectUser($Email,$Pass);
    return $msg;
  }
  function register($name,$email,$password,$address,$country,$city,$postal_code)
  {
    if ($this->checkEmail($email)) {
      $hashedpassword=password_hash($password,PASSWORD_BCRYPT);
      $token='qwertyuiopasdfghjklzxcvbnm1234567890';
      $token=str_shuffle($token);
      $token=substr($token,10);
      $this->insertUser($name,$email,$hashedpassword,$address,$country,$city,$postal_code,$token);
    }else{
      return '<span style="color: red; display: block; text-align: center;">Email is already in use</span>';
    }

  }
  function checkEmail($Email){
    $datas=$this->getEmail($Email);
    if(empty($datas)){
      return true;
    }else{
      return false;
    }
  }
  function editAccount($email){
    $datas=$this->getEmail($email);
    foreach($datas as $data){
      echo '
      Name: ',$data['name'].'</br>Email:',$data['email'],'</br>Address:',$data['address'],'</br>Country:',$data['country'],'</br>Postal Code:',$data['postal_code'],'</br>';
    }
  }

}


?>
