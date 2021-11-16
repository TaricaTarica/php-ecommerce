<?php 
    include "../head.php"; 
    include "../navbar.php";
    require("/xampp/htdocs/ecommerce/controllers/userController.php");

    $logged_user = getLoggedUser();
    $user_id = $logged_user->id;

    $buysId = getBuysUser();
    
    $precioTotal = 0;

?>

<h2 class="indigo-text center-align">Tu cuenta</h2>

<div class="flex-center">
    <ul class="collection">
        <li class="collection-item avatar">
            <img src="/ecommerce/imgs/fotoperfil.png" class="circle">
            <span class="title hide-on-med-and-down">Datos personales</span>
            <li class="collection-item"><div>Nombre: <?php echo getUserName($user_id)?><a ><i class="material-icons right">account_circle</i></a></div></li>
            <li class="collection-item"><div>Apellido: <?php echo getUserSurname($user_id)?><a ><i class="material-icons right">account_circle</i></a></div></li>
            <li class="collection-item"><div>Email: <?php echo getUserMail($user_id)?><a ><i class="material-icons right">contact_mail</i></a></div></li>
        </li>
    </ul> 

</div>

<h2 class="indigo-text center-align">Historial de compras</h2>

<div class="container">
    <table style="margin-bottom: 4rem;">
        <thead>
            <tr>
                <th>Fecha y hora</th>
                <th>Productos</th>
                <th>Monto total</th>
                <th>Forma de pago</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($buysId as &$buyId){                    
            ?>
            <tr>
                <td><?php echo getBuyDate($buyId) ?></td>
                <td>
                    <?php
                        $productsBuy = getProductsBuy($buyId);
                        foreach($productsBuy as &$product){
                            echo "(";
                            echo getQuantityBuy($product, $buyId);
                            echo ") ";
                            echo getProductBuyName($product);
                            
                            ?>
                            <?php
                        }
                    ?>
                </td>
                <td><?php echo getBuyAmount($buyId) ?></td>
                <td><?php echo getPaymentMethod($buyId) ?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php include "../footer.php"; ?>