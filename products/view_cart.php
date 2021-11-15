<?php
include_once "/xampp/htdocs/ecommerce/controllers/productController.php";
GetProductsInCart();
header("Location: /ecommerce/cart/cart.php");
?>