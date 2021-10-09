<?php 
    include "../head.php"; 
    include "../navbar.php";

    $product_id = $_GET['id'];
?>
<div class="container">
    <div class="row">
        <div class="col s5 m5 l5">
            <div class="slider">
                <ul class="slides">
                    <li>
                    <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
                    </li>
                    <li>
                    <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
                    </li>
                </ul>
            </div>
        </div>
        <div class="col s7 m7 l7">
            <div class="row">
                <div class="col s6 m6 l6 n-pl">
                    <h5>{{ Nombre del producto }}</h5>
                    <p><a href="#">{{ cantidad }} reseñas.</a></p>
                </div>
                <div class="col s6 m6 l6">
                    <h5>${{ Precio del producto }}</h5>
                    <button id="product-add-to-cart-btn" name="product-add-to-cart-btn" type="submit" class="waves-effect waves-light btn indigo">Agregar al carrito</button>
                </div>
            </div>
            <div class="row">
                <h6>Descripción</h6>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque aut veniam tempora placeat illum maiores! In assumenda dignissimos nobis incidunt veritatis cum error eius id voluptatibus ab? Autem, officia neque.
                </p>
            </div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>