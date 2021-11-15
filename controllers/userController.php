<?php 
require("/xampp/htdocs/ecommerce/config/dbConnection.php");

function login($email, $password){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select * from user where email='$email' and password='$password'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $loggedUser = array(
            "id" => $rows["id"],
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

function register($name, $surname, $mail, $password){

    $link = dbConnection();
    mysqli_query($link,"insert into user  (name, surname, email, password) VALUES('$name','$surname','$mail','$password')");

    $resultado=mysqli_query($link,"select * from user");
    while($filas = mysqli_fetch_array($resultado)){
        $id=$filas["id"];
        $n=$filas["name"];
        $s=$filas["surname"];
        $e=$filas["email"];
        $p=$filas["password"];
        echo $id." ".$n." ".$s." ".$e." ".$p."<br>";
    }
    header("Location: /ecommerce/index.php");


    mysqli_close($link);

}

function logout(){
    session_destroy();
    header("Location: /ecommerce/index.php");
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
function getUserName($idUser){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select name from user where id='$idUser'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $user_name = $rows["name"];
        mysqli_close($connectionLink);
        return $user_name;
    }
}

function getUserSurname($idUser){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select surname from user where id='$idUser'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $user_surname = $rows["surname"];
        mysqli_close($connectionLink);
        return $user_surname;
    }
}

function getUserMail($idUser){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select email from user where id='$idUser'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $email_price = $rows["email"];
        mysqli_close($connectionLink);
        return $email_price;
    }
}

function getBuysUser(){
    $connectionLink = dbConnection();
    $logged_user = getLoggedUser();
    $user_id = $logged_user->id;
    $sentencia = mysqli_query($connectionLink,"select Id_Buy from buy where Id_User = '$user_id'");
    $idsBuy = array();
    while($filas = mysqli_fetch_array($sentencia)){
        $idsBuy[]=$filas["Id_Buy"];
    }

    return $idsBuy;

}

function getBuyDate($idBuy){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select Date from buy where Id_Buy='$idBuy'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $date_buy = $rows["Date"];
        mysqli_close($connectionLink);
        return $date_buy;
    }
}

function getBuyAmount($idBuy){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select Amount from buy where Id_Buy='$idBuy'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $amount_buy = $rows["Amount"];
        mysqli_close($connectionLink);
        return $amount_buy;
    }
}

function getProductsBuy($idBuy){
    $connectionLink = dbConnection();
    $sentencia = mysqli_query($connectionLink,"select Id_Product from buy_products where Id_Buy='$idBuy'");
    $products = array();
    while($filas = mysqli_fetch_array($sentencia)){
        $products[]=$filas["Id_Product"];
    }
    return $products;
}

function getProductBuyName($idProduct){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select name from product where id='$idProduct'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $product_name = $rows["name"];
        mysqli_close($connectionLink);
        return $product_name;
    }
    else{
        mysqli_close($connectionLink);
        return 'Product not found.';
    }
}

function getPaymentMethod($IdBuy){
    $link = dbConnection();
    $logged_user = getLoggedUser();
    $user_id = $logged_user->id;
    $query_result=mysqli_query($link,"select  payment_method from buy  where  Id_Buy = '$IdBuy'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $paymentMethod=$rows["payment_method"];
    }
    return $paymentMethod;
 }

 function getQuantityBuy($idProduct, $idBuy){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select Quantity from buy_products where Id_Product='$idProduct' and Id_Buy='$idBuy'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $product_name = $rows["Quantity"];
        return $product_name;
    }
}


?>