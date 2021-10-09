<?php 
    include "../head.php"; 
    include "../navbar.php";

?>
<div class="container">
    <h2 class="indigo-text center-align">Registrate</h2>
    <p class="helper-text center">Registrate y disfrita todos los beneficios de este ECOMMERCE.</p>
        <div class="flex-center">
            <form id="user-register" name="user-register" class="w-50 center mb-2">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="user-register-name" name="user-register-name" type="text" required="" aria-required="true" class="validate ">
                        <label for="user-register-name">Nombre</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="user-register-surname" name="user-register-surname" type="text" required="" aria-required="true" class="validate ">
                        <label for="user-register-surname">Apellido</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="user-register-email" name="user-register-email" type="email" required="" aria-required="true" class="validate ">
                        <label for="user-register-email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="user-register-password" name="user-register-password" type="password" required="" aria-required="true" class="validate">
                    <label for="user-register-password">Password</label>
                    </div>
                </div>
                <button id="user-register-btn" name="user-register-btn" type="submit" class="waves-effect waves-light btn indigo">Registarme</button>
            </form>
        </div>
</div>
<?php include "../footer.php"; ?>