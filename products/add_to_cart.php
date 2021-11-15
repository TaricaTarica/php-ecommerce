<?php
require "/xampp/htdocs/ecommerce/controllers/productController.php";
addProductToCart($_POST["id"]);?>

<script>
    window.location.replace('/ecommerce/cart/cart.php');
</script>

