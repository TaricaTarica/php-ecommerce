<?php 
  require("/xampp/htdocs/ecommerce/controllers/userController.php"); 

  $logged_user = getLoggedUser();

?>

<nav>
  <div class="nav-wrapper indigo row">
    <a class="col s3" href="/ecommerce/index.php" class="brand-logo">ECOMMERCE</a>
    <div class="col s6 hide-on-down">
        <form class="search-form">
            <input class="white" id="search" type="text" placeholder="¿Qué estás buscando?">
            <button class="search-btn" type="submit"><i class="material-icons">search</i></button>
        </form>
    </div>
    <ul class="right">
        <li><a href="/ecommerce/cart.php"><i class="material-icons">shopping_cart</i></a></li>
        <?php 
          if($_SESSION){ ?>
            <li>
              <a href="/ecommerce/user/logout.php" class="user-nav">Hola <?php echo $logged_user->name ?>
                <i class="material-icons">exit_to_app</i>
              </a>
            </li>
          <?php } else { ?>
          <li><a href="/ecommerce/user/login.php" class="user-nav"><i class="material-icons">person</i>Login</a></li>
        <?php } ?>
      </ul>
  </div>
</nav>