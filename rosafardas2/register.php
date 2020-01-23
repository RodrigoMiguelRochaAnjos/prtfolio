<?php
  session_start();
  include 'includes/view.php';
  include 'includes/autoload.php';
  $ver = new View();
  $msg="";
  if(isset($_POST['submit'])){
    if(isset($_POST['name']) &&
      isset($_POST['email']) &&
      isset($_POST['password']) &&
      isset($_POST['address']) &&
      isset($_POST['country']) &&
      isset($_POST['city']) &&
      $_POST['name'] != "" &&
      $_POST['email'] != "" &&
      $_POST['password'] != "" &&
      $_POST['address'] != "" &&
      $_POST['country'] != "" &&
      $_POST['city'] != ""
    ){
      if($_POST['password'] == $_POST['password2']){
        if(!preg_match('/[\W]/',$_POST['name'])){
          if(preg_match('/[@]/',$_POST['email'])){
              if (!preg_match('/[\W]/',$_POST['country'])) {
                if (!preg_match('/ [\W] /',$_POST['city'])) {
                  if (!preg_match('/ #$%&()=?\'*+~^<>«» /',$_POST['postal_code'])) {
                    if($ver->register(
                      $_POST['name'],
                      $_POST['email'],
                      $_POST['password'],
                      $_POST['address'],
                      $_POST['country'],
                      $_POST['city'],
                      $_POST['postal_code']
                    ) == null){

                    }else{
                      $msg= $ver->register(
                        $_POST['name'],
                        $_POST['email'],
                        $_POST['password'],
                        $_POST['address'],
                        $_POST['country'],
                        $_POST['city'],
                        $_POST['postal_code']
                      );;
                    }

                  }else{
                    $msg='<span style="color: red; display: block; text-align: center;">Please insert a valid postal code</span>';
                  }
                }else{
                  $msg='<span style="color: red; display: block; text-align: center;">Please insert a valid city</span>';
                }
              }else{
                $msg='<span style="color: red; display: block; text-align: center;">Please insert a valid country</span>';
              }
          }else{
            $msg='<span style="color: red; display: block; text-align: center;">Please insert a valid email</span>';
          }
        }else{
          $msg='<span style="color: red; display: block; text-align: center;">The name must not contain special characters</span>';
        }
      }else{
        $msg='<span style="color: red; display: block; text-align: center;">Passwords must match</span>';
      }
    }else{
      $msg='<span style="color: red; display: block; text-align: center;">Please fill in all required fields</span>';
    }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/navbar.css">
    <title>Rosafardas</title>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <a id="logo" href="index.php">
      <img  src="images/RosaFardas2.png" alt="">
    </a>

    <div class="content">
      <?php if($msg!=""){ echo $msg; } ?>
      <form class="" action="register.php" method="post">
        <i class="fa fa-user"></i>  <input type="text" name="name" value="" placeholder="Full Name" required>
        <i class="fa fa-envelope"></i>  <input type="email" name="email" value="" placeholder="Email" required>
        <i class="fa fa-user"></i> <input type="password" name="password" value="" placeholder="Password" required>
        <i class="fa fa-user"></i> <input type="password" name="password2" value="" placeholder="Confirm Password" required>
        <i class="fa fa-home"></i> <input type="text" name="address" value="" placeholder="Address" required>
        <i class="fa fa-"></i> <input style="padding-left:5px;" type="text" name="country" placeholder="Country" required>
        <i class="fa fa-"></i> <input style="padding-left:5px;" type="text" name="city" placeholder="City" required>
        <i class="fa fa-"></i> <input style="padding-left:5px;" type="text" name="postal_code"  placeholder="Postal Code">

        <input type="submit" name="submit" value="Sign up">
      </form>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script type="text/javascript" src="js/main.js">

    </script>
  </body>
</html>
