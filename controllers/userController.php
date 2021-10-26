<?php 
require("/xampp/htdocs/ecommerce/config/dbConnection.php");

function login($email, $password){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select * from user where email='$email' and password='$password'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $loggedUser = array(
            "name" => $rows["name"],
            "email" => $rows["email"],
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
?>