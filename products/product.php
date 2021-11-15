<?php 
    include "../head.php"; 
    include "../navbar.php";

    require("../controllers/productController.php");
    require("../controllers/reviewsController.php");
    $product_id = $_GET['id'];

    $productName = getProductName($product_id);
    $productDescription = getProductDescription($product_id);
    $productPrice = getProductPrice($product_id);
    $productStock = getProductStock($product_id);
    $productImages = getProductImagesSrc($product_id);

    $productReviews = getProductReviews($product_id);
    $countProductReviews = getCountProductReviews($product_id);
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
                    <p><a href="#review-container"><?php echo $countProductReviews; ?> reseñas.</a></p>
                </div>
                <div class="col s6 m6 l6">
                    <h5>$ <?php echo $productPrice; ?></h5>
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $product_id ?>">
                        <br>
                        <button id="product-add-to-cart-btn" name="product-add-to-cart-btn" type="submit" class="waves-effect waves-light btn indigo">Agregar al carrito</button>
                    </form>
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
    <div id="review-container" class="review-container">
        <div class="review-container-item">
            <h4>Crear reseña</h4>
            <?php if($_SESSION){ 
                if(isset($_POST['review-button'])){
                    if(isset($_POST['review-points']) && isset($_POST['review-comment'])){
                        $logged_user = getLoggedUser();
                        $user_id = $logged_user->id;
                        $points = $_POST['review-points'];
                        $comment = $_POST['review-comment'];
                        createReview($user_id, $product_id, $points, $comment);
                    }
                    else{
                        echo  '<p class="error-text w-100">Los campos son obligatorios!</p>';
                    }
                    
                }    
                
            ?>
                <div class="row">
                    <form action="" method="post" class="col s12">
                        <div class="row">
                        <div class="input-field col s12">
                            <select id="review-points" name="review-points">
                                <option value="" disabled selected>Seleccionar puntaje</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label for="review-points">Puntaje</label>
                        </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="review-comment" name="review-comment" data-length="120" class="materialize-textarea"></textarea>
                                <label for="review-comment">Comentario</label>
                            </div>
                        </div>
                        <div class="row right">
                            <button id="review-button" name="review-button" type="submit" class="waves-effect waves-light btn indigo">Agregar reseña</button>
                        </div>
                    </form>
                </div>
            <?php } else { ?>
                <div class="row">
                    <p>Debes <a href="/ecommerce/user/login.php">iniciar sesión</a> para agregar una reseña.</p>
                </div>
            <?php } ?> 
        </div>
        <div class="review-container-item">
            <h4>Reseñas</h4>
            <div class="reviews-list">
                <ul class="collection">
                    <?php foreach($productReviews as &$review){ ?>
                        <li class="collection-item avatar">
                            <i class="material-icons circle">person</i>
                            <span class="title"><?php echo $review["name"]; ?></span>
                        <p>
                            <?php echo $review["date"]; ?>
                            <br>
                            <?php echo $review["comment"]; ?>
                        </p>
                        <span class="secondary-content">
                            <?php for($i = 0; $i < $review["points"]; $i++){ ?>
                                <i class="material-icons">grade</i>
                            <?php } ?>
                        </span>
                    </li>
                    <?php } ?>
                </ul>  
            </div>
              
        </div>
                      
    </div>
    
</div>

<?php include "../footer.php"; ?>