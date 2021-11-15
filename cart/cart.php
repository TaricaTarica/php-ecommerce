<?php 
    include "../head.php"; 
    include "../navbar.php";
?>
<?php 
    require("../controllers/productController.php");
    $products=GetProductsInCart();
    
    $precioTotal = 0;
?>  
    
<h2 class="indigo-text center-align">Tu carrito</h2>
<div class="container">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($products as &$product){                    
            ?><br>
                <tr>
                    <td><?php echo getProductName($product) ?></td>
                    <td>$<?php echo number_format(getProductPrice($product), 2) ?></td>
                    <td><?php echo getQuantityProduct($product) ?></td>

                    <?php 
                        $subTotal = getProductPrice($product) * getQuantityProduct($product);
                    ?>
                    <td>$<?php echo number_format($subTotal) ?></td>
                    <br>
                    <?php $precioTotal = $precioTotal+$subTotal;?>
                    <td>
                        <div>
                            <form action="/ecommerce/products/delete_to_cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $product ?>">
                                <button class="btn waves-effect waves-light red">
                                    <i class="material-icons right">delete</i>Quitar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php }?>
    </table>
    <div class="cart-total-price">
        <h5>Precio total: <span>$ <?php echo number_format($precioTotal, 2) ?></span></h5>
    </div>
    <div class="cart-buttons">
        <a href="/ecommerce/products/store.php" >
            <button id="back" name="back" class="waves-effect waves-light btn indigo">Seguir comprando</button>
        </a>
        <form action="/ecommerce/products/empty_cart.php">
            <button id="empty-cart" name="empty-cart" class="waves-effect waves-light btn indigo">Vaciar carrito</button>
        </form>
        <form action="/ecommerce/products/paymentMethods.php" method="post">
            <input type="hidden" name="amount" value="<?php echo $precioTotal?>">
            <button id="checkout" name="checkout" class="waves-effect waves-light btn indigo">Checkout</button>
        </form>
    </div>
</div>
<?php include "../footer.php"; ?>