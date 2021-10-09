<?php 
    include "head.php"; 
    include "navbar.php";
?>
<div class="container">
    <h2 class="indigo-text center-align">Tu carrito</h2>
    <div class="row">
        <div class="col s12 m12 l12">
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>((prod.image))</td>
                    <td>Computadora</td>
                    <td>$10</td>
                    <td>
                        <input class="cart-product-quantity" id="cart-product-quantity" name="cart-product-quantity" type="number" /> 
                    </td>
                    <td>$(Precio x cantidad)</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col s6 m6 l6 right">
            <div class="right mt-2">
                <button id="update-cart" name="update-cart" class="waves-effect waves-light btn indigo">Actualizar carrito</button>
                <button id="checkout" name="checkout" class="waves-effect waves-light btn indigo">Checkout</button>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>