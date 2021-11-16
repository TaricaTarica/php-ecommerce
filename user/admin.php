<?php 
    include "../head.php"; 
    include "../navbar.php";
?>
<?php 
    require("../controllers/productController.php");
    $products=getProducts();
?>  
    
<h2 class="indigo-text center-align">Stock de Mercaderia</h2>

<div class="container" style="margin-bottom: 2rem;">
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($products as &$product){                    
        ?>
                <tr>
                <td><?php echo getProductName($product) ?></td>
                <td><?php echo getProductStock($product) ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>