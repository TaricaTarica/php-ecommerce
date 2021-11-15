<?php 
    include "../head.php"; 
    include "../navbar.php";
?>
<?php 
    require("../controllers/productController.php");
    $products=getProducts();
?>  
    
<h2 class="indigo-text center-align">Stock de Mercaderia</h2>

<div>
    <table class="center" style="width:50%" >
        <thead>
            <tr>
                <th>Producto</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($products as &$product){                    
        ?><br>
                <tr>
                <td><?php echo getProductName($product) ?></td>
                <td><?php echo getProductStock($product) ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>


<div class="flex-center input-field col s12 ">
    <select>
      <option value="" disabled selected>Choose your option</option>
      <option value="1">Option 1</option>
      <option value="2">Option 2</option>
      <option value="3">Option 3</option>
    </select>
    <label>Materialize Select</label>
</div>

<?php include "../footer.php"; ?>