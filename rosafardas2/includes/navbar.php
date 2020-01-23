<ul id="lang">
  <li> <a href="#">PT</a> </li>
  <li> <a href="#">EN</a> </li>
</ul>
<header>

  <div id="hamburger" class="hamburger">
    <div style="color: white; user-select: none; ">
      &times;
    </div>
    <span></span>
  </div>
  <ul id="nav">
    <li> <a href="#">Menu</a> </li>
    <li> <a href="index.php">Homepage</a> </li>
    <li> <a href="shop.php">Men's clothing</a> </li>
    <li> <a href="Mulher.php">Women's clothing</a> </li>
    <li> <a href="Crianca.php">Children's clothing</a> </li>
  </ul>
  <div class="search">
    <form class="" action="search.php" method="get">
      <input id="searchbutton" type="submit" name="" value="">
      <i class="fa fa-search" ></i>
      <input id="search" type="text" name="q" value="">
    </form>
  </div>

  <ol>
    <?php if(isset($_SESSION['Nome'])){
      echo '<a id="nome" href="account.php">',htmlspecialchars($_SESSION['Nome']),'</a>';
    }else{
      echo '
      <li> <a href="login.php">Login</a> </li>
      <li> <a href="register.php">Sign up</a> </li>
      ';
    } ?>

    <li> <a href="cart.php"> <span><?php

      if(isset($_SESSION['cart'])){
        echo sizeof($_SESSION['cart']);
      }else{
        echo "0";
      }
      ?></span> <i class="fa fa-shopping-cart"></i> </a> </li>
  </ol>
</header>
