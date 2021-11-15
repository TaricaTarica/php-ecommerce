<?php
require "/xampp/htdocs/ecommerce/controllers/productController.php";
checkout($_POST["amount"], $_POST["pay_method"]);
?>

<script>
    window.location.replace('/ecommerce/user/account.php');
</script>