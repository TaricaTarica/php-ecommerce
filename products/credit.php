<?php 
    include "../head.php"; 
    include "../navbar.php";
?>

<?php 
$amount = $_POST["amount"];
$pay_method = $_POST["pay_method"];
?>

<br>

<div class="container">
<h2 class="indigo-text center-align">Tarjeta de Crédito</h2>
    <div class="flex-center">
        <form id="credit-card" name="credit-card" action="checkout.php" method="post" class="w-50 center mb-2">
            <div class="row">
                <div class="input-field col s12">
                    <input type="hidden" name="amount" value="<?php echo $amount?>">
                    <input type="hidden" name="pay_method" value="<?php echo $pay_method?>">
                    <input id="credit-card" name="credit-card" type="text" required="" aria-required="true" class="validate ">
                    <label for="credit-card">Número de tarjeta</label>
                </div>
            </div>
            
            <h4 class="center-align">Monto total a pagar: $<?php echo number_format($amount, 2)?></h4>
            <br>
            <button id="credit-card" name="credit-card" type="submit" class="waves-effect waves-light btn indigo">Finalizar compra</button>
        </form>
    </div>
</div>



