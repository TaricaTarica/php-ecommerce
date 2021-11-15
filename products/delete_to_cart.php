<?php
include_once "/xampp/htdocs/ecommerce/controllers/productController.php";
if (!isset($_POST["id"])) {
    exit("No hay id_producto");
}
deleteProductToCart($_POST["id"]);
# Saber si redireccionamos a tienda o al carrito, esto es porque
# llamamos a este archivo desde la tienda y desde el carrito
    header("Location: /ecommerce/cart/cart.php");
?>