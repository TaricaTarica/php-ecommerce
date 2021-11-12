<?php 
    include "../head.php"; 
    include "../navbar.php";

    if($_SESSION){
        header("Location: /ecommerce/index.php");
        die();
    }
?>
<div class="container">
    <h2 class="indigo-text center-align">Iniciar sesión</h2>
    <div class="flex-center">
        <?php
            if(isset($_POST['user-login-btn'])) 
            { 
                $email = $_POST['user-login-email'];
                $password = $_POST['user-login-password'];
                login($email, $password);
            }
        ?>
        <form id="user-login" name="user-login" action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="w-50 center mb-2">
            <div class="row">
                <div class="input-field col s12">
                    <input id="user-login-email" name="user-login-email" type="email" required="" aria-required="true" class="validate ">
                    <label for="user-login-email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="user-login-password" name="user-login-password" type="password" required="" aria-required="true" class="validate">
                <label for="user-login-password">Password</label>
                </div>
            </div>
            <div class="row">
                <span class="helper-text">¿Aún no tienes cuenta? <a href="/ecommerce/user/register.php">registrate</a>.</span>
            </div>
            <button id="user-login-btn" name="user-login-btn" type="submit" class="waves-effect waves-light btn indigo">Iniciar sesión</button>
        </form>
    </div>
</div>

<?php include "../footer.php"; ?>