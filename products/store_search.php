<?php 
    include "../head.php"; 
    include "../navbar.php";

?>
<br>
<h2 class="indigo-text center-align">Búsqueda</h2>

<?php 
    require("/xampp/htdocs/ecommerce/controllers/productController.php");
    $busqueda = $_GET['search'];
    $products=getProductsSearch($busqueda);
?>  

<div class="container store-container">
	<?php 
		foreach($products as &$product){
	?> 
	<div class="col s12 m7">
		<a href="/ecommerce/products/product.php?id=<?php echo $product; ?>">
			<div class="card">
				<div class="card-image">
					<?php $productImages = getProductImagesSrc($product); ?>
					<img src="<?php echo $productImages[0]; ?>">
				</div>
				<div class="card-content">
					<span class="card-title"><?php echo getProductName($product); ?></span>
					<p>$ <?php echo getProductPrice($product); ?></p>
				</div>
				<div class="card-action center">
					<form action="add_to_cart.php" method="post">
						<input type="hidden" name="id" value="<?php echo $product ?>">
						<button class="btn btn-success">Agregar al carrito</button>
					</form>
				</div>
			</div>
		</a>
	</div>
<?php } ?>
</div>

<?php include "../footer.php"; ?>