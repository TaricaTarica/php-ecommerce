<?php 
function login($email, $password){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select * from user where email='$email' and password='$password'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $loggedUser = array(
            "id" => $rows["id"],
            "name" => $rows["name"],
            "email" => $rows["email"]
        );
        $_SESSION["loggedUser"] = json_encode($loggedUser);
        mysqli_close($connectionLink);
        header("Location: /ecommerce/index.php");
        die();
    }
    else{
        echo '<span class="error-text">Combinación de usuario/contraseña incorrecta!</span>';
        mysqli_close($connectionLink);
    }
}
function getLoggedUser(){
    if($_SESSION){
        return json_decode($_SESSION["loggedUser"]);
    }
}
function getLoggedUserId(){
    if($_SESSION){
        $logged_user = json_decode($_SESSION["loggedUser"]);
        return $logged_user->id;
    }
}
function logout(){
    session_destroy();
}
?>