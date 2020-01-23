<?php
include_once 'includes/autoload.php';
include_once 'vendor/autoload.php';
$ver=new View();

include_once 'includes/config.php';


// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:


if(!isset($_SESSION['cart']) || !isset($_SESSION['Email']) || empty($_SESSION['cart']) || !isset($_POST['stripeToken']) || !isset($_POST['Morada']) || $_POST['Morada']=="" || !isset($_POST['codigo-postal']) || $_POST['codigo-postal']=="" || !isset($_POST['pais']) || $_POST['pais']=="" || !isset($_POST['nif']) || $_POST['nif']=="" || !isset($_POST['tel']) || $_POST['tel']==""){
  header('Location: index.php');
  exit();
}else{
  $token = $_POST['stripeToken'];
  $arr=array();
  $Pret=0;
  $Description="";
  foreach ($_SESSION['cart'] as $key => $item) {
    $datas=$ver->getID($_SESSION['cart'][$key]["ID"]);


    #array_push($arr,array(
    #  'amount' => $data['Preco']*100,
    #  'currency' => 'eur',
    #  'description' => 'Example charge',
    #  'source' => $token,
    #  'capture' => false,
    #)
    #);


    foreach($datas as $data){
      $Pret+=$data['Preco'];
      $Description.="ID: ".$data['ID']." \nNome: ".$data['Name']." \nQuantidade: ".$_SESSION['cart'][$key]["qtd"]." \nTamanho: ".$_SESSION['cart'][$key]["tam"]."\nPreço: ".$data['Preco']."€\n..................................\n";
    }
  }
  if($charge = \Stripe\Charge::create([
    'amount' => $_SESSION['Total']*100,
    'currency' => 'eur',
    'description' => $Description.".......................
    Morada:".$_POST['Morada'].".......................
    Código Postal:".$_POST['codigo-postal'].".......................
    País:".$_POST['pais'].".......................
    NIF:".$_POST['nif'].".......................
    Telemóvel:".$_POST['tel'].".......................
    Valor:".$_SESSION['Total']."€",
    'source' => $token,
    'capture' => false,
  ])){
    unset($_SESSION['cart']);
    unset($_SESSION['cart-r']);
    header('Location: thankyou.php');

  }

}



?>
