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
<h2 class="indigo-text center-align">PayPal</h2>
    <div class="flex-center">
        <form id="paypal" name="paypal" action="checkout.php" method="post" class="w-50 center mb-2">
            <div class="row">
                <div class="input-field col s12">
                    <input type="hidden" name="amount" value="<?php echo $amount?>">
                    <input type="hidden" name="pay_method" value="<?php echo $pay_method?>">
                    <input id="paypal-email" name="paypal-email" type="email" required="" aria-required="true" class="validate ">
                    <label for="paypal-email">Email</label>
                </div>
            </div>

            <h4 class="center-align">Monto total a pagar: $<?php echo number_format($amount, 2)?></h4>
            <br>
            <button id="paypal" name="paypal" type="submit" class="waves-effect waves-light btn indigo">Finalizar compra</button>
        </form>
    </div>
</div>



