<?php

$name=$_POST['user-register-name'];
$surname=$_POST['user-register-surname'];
$mail=$_POST['user-register-email'];
$password=$_POST['user-register-password'];

include("dbConnection.php");
$link=dbConnection();
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

mysqli_close($link);

/* GET SINGLE RESULT */
//https://www.php.net/manual/es/function.mysql-fetch-row.php

?>
