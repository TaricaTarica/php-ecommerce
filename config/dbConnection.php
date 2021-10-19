<?php
function dbConnection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "ecommerce";
    $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    return $link;
}
?>
