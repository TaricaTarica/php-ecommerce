<?php 
    include "../head.php"; 
    include "../navbar.php";
?>

<?php 
$amount = $_POST["amount"];
?>



<div class="container">
    <h2 class="indigo-text center-align">Formas de Pago</h2>
    <div class="row center-align">
        <div class="col-xs-12 col-md-12">
            <div class="col-md-12 payment-container"> 
                <div class="center-align">
                    <form action="paypal.php" method="post">
                    <input type="hidden" name="amount" value="<?php echo $amount?>">
                    <input type="hidden" name="pay_method" value="PayPal">
                        <button class="btn btn-info indigo ">PayPal<i class="material-icons right">local_parking</i></button>
                    </form>
                </div>    
                <div class="center-align">
                    <form action="credit.php" method="post">
                        <input type="hidden" name="amount" value="<?php echo $amount?>">
                        <input type="hidden" name="pay_method" value="Tarjeta de crédito">
                        <button class="btn btn-info indigo ">Tarjeta de Credito<i class="material-icons right">credit_card</i></button>
                    </form>
                </div>
                <div class="center-align">
                    <form action="bank.php" method="post">
                        <input type="hidden" name="amount" value="<?php echo $amount?>">
                        <input type="hidden" name="pay_method" value="Transferencia bancaria">
                        <button class="btn btn-info indigo ">Transferencia Bancaria<i class="material-icons right">monetization_on</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


