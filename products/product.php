<?php 
    include "../head.php"; 
    include "../navbar.php";

    require("../controllers/productController.php");
    $product_id = $_GET['id'];

    $productName = getProductName($product_id);
    $productDescription = getProductDescription($product_id);
    $productPrice = getProductPrice($product_id);
    $productStock = getProductStock($product_id);
    $productImages = getProductImagesSrc($product_id);
?>
<div class="container">
    <div class="row">
        <div class="col s5 m5 l5">
            <div class="slider">
                <ul class="slides">
                    <?php
                        foreach($productImages as &$imgSrc){
                    ?>
                        <li>
                            <?php echo "<img src='$imgSrc'>" ?>
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col s7 m7 l7">
            <div class="row">
                <div class="col s6 m6 l6 n-pl">
                    <h5><?php echo $productName; ?></h5>
                    <p><b><?php echo $productStock; ?></b> en stock.</p>
                    <p><a href="#">{{ cantidad }} reseñas.</a></p>
                </div>
                <div class="col s6 m6 l6">
                    <h5>$ <?php echo $productPrice; ?></h5>
                    <button id="product-add-to-cart-btn" name="product-add-to-cart-btn" type="submit" class="waves-effect waves-light btn indigo">Agregar al carrito</button>
                </div>
            </div>
            <div class="row">
                <h6>Descripción</h6>
                <p>
                <?php echo $productDescription; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>