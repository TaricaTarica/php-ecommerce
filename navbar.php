<ul id="nav-account-dropdown" class="dropdown-content">
  <li><a href="/ecommerce/user/logout.php">Cerrar sesión</a></li>
  <li class="divider"></li>
</ul>
<nav>
  <div class="nav-wrapper indigo row">
    <a class="col s3" href="/ecommerce/index.php" class="brand-logo">ECOMMERCE</a>
    <div class="col s6 hide-on-down">
        <form action="/ecommerce/products/store_search.php" class="search-form" method="GET">
            <input class="white" name="search" id="search" type="text" placeholder="  ¿Qué estás buscando?">
            <button class="search-btn" type="submit" name="send"><i class="material-icons">search</i></button>
        </form>
    </div>
    <ul class="right">
        <?php 
          if($_SESSION){ 
            $logged_user = json_decode($_SESSION["loggedUser"]);
            ?>

            <li>
              <li><a href="/ecommerce/user/logout.php" class="user-nav">Hola <?php echo $logged_user->name ?><i class="material-icons">exit_to_app</i></a></li>
              <li><a href="/ecommerce/cart/cart.php"><i class="material-icons">shopping_cart</i></a></li>
              <li><a href="/ecommerce/user/account.php"><i class="material-icons">person</i></a></li>
            </li>
          <?php } else { ?>
          <li><a href="/ecommerce/user/login.php" class="user-nav"><i class="material-icons">person</i>Login</a></li>
        <?php } ?>

        <li><a href="/ecommerce/products/store.php"><i class="material-icons">dashboard</i></a></li>
      </ul>
  </div>
</nav>