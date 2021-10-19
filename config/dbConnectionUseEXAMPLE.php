<?php
include("conex.php");
$link=Conectarse();
$nom=$_GET['nomb'];
$resultado=mysqli_query($link,"select * from persona where nombre=‘$nom’ ");
while($filas = mysqli_fetch_array($resultado)){
$id=$filas["id"];
$n=$filas["nombre"];
$a=$filas["apellido"];
$e=$filas["edad"];
$c=$filas["cedula"];
$d=$filas["domicilio"];
echo $id." ".$n." ".$a." ".$e." ".$c." ".$d."<br>";
}
mysqli_close($link);




/* INSERT */
mysqli_query($link,"insert into pesona  (nombre, apellido) VALUES('$nombre','$apellido'");

/* GET SINGLE RESULT */
//https://www.php.net/manual/es/function.mysql-fetch-row.php

?>
