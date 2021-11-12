<?php 
    require('../controllers/userController.php');
    session_start();
    $user_logged = getLoggedUser();
    print_r($user_logged);
    if($user_logged){
        logout();
        header("Location: /ecommerce/index.php");
        die();
    }
    else{
        header("Location: /ecommerce/index.php");
        die();
    }
?>