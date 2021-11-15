<?php 
//require("/xampp/htdocs/ecommerce/config/dbConnection.php");
require("../controllers/userController.php");
include "../head.php"; 

function getProductName($idProduct){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select name from product where id='$idProduct'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $product_name = $rows["name"];
        mysqli_close($connectionLink);
        return $product_name;
    }
    else{
        mysqli_close($connectionLink);
        return 'Product not found.';
    }
}

function getProductDescription($idProduct){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select description from product where id='$idProduct'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $product_description = $rows["description"];
        mysqli_close($connectionLink);
        return $product_description;
    }
    else{
        mysqli_close($connectionLink);
        return 'Product not found.';
    }
}

function getProductPrice($idProduct){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select price from product where id='$idProduct'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $product_price = $rows["price"];
        mysqli_close($connectionLink);
        return $product_price;
    }
    else{
        mysqli_close($connectionLink);
        return 'Product not found.';
    }
}
function getProductStock($idProduct){
    $connectionLink = dbConnection();
    $query_result = mysqli_query($connectionLink, "select stock from product where id='$idProduct'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $product_stock = $rows["stock"];
        mysqli_close($connectionLink);
        return $product_stock;
    }
    else{
        mysqli_close($connectionLink);
        return 'Product not found.';
    }
}

function getProductImagesSrc($idProduct)
{
    
    $connectionLink = dbConnection();
    $query = "select imgSrc from product_image where idProduct='$idProduct'";
    $result = $connectionLink->query($query);
    $product_images = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $product_images[] = $row["imgSrc"];
    }
    mysqli_close($connectionLink);
    return $product_images;
}
function getProducts(){
    $connectionLink = dbConnection();
    $sentencia = mysqli_query($connectionLink,"select id from product");
    $products = array();
    while($filas = mysqli_fetch_array($sentencia)){
        $products[]=$filas["id"];
    }
    return $products;
}

function getProductsSearch($search){
    $connectionLink = dbConnection();
    $sentencia = mysqli_query($connectionLink,"select id from product where name like '%$search%'");
    $products = array();
    while($filas = mysqli_fetch_array($sentencia)){
        $products[]=$filas["id"];
    }
    return $products;
}

function productInCart($idProducto)
{
    $ids = getIdsOfProductsInCart();
    foreach ($ids as $id) {
        if ($id == $idProducto) return true;
    }
    return false;
}

function getIdsOfProductsInCart()
{
    $bd = dbConnection();
    LoginIfNotStarted();
    $sentencia = $bd->prepare("SELECT Id_Product FROM cart_users WHERE Id_User = ?");
    $idSesion = session_id();
    $sentencia->execute([$idSesion]);
    return $sentencia;
}

function LoginIfNotStarted(){
    if (!isset($_SESSION["loggedUser"])) {
       echo "<script>alert('Para agregar al carrito, debes iniciar sesión.');document.location='/ecommerce/user/login.php'</script>";
    }
}

function addProductToCart($idProduct){
    $link = dbConnection();
    LoginIfNotStarted();
    if($_SESSION){
        $logged_user = getLoggedUser();
        $user_id = $logged_user->id;
        $name = getProductName($idProduct);

        $disponible = getProductStock($idProduct) - getQuantityProduct($idProduct);

        if($disponible>0){
            if(itemInCart($idProduct)){
                mysqli_query($link,"UPDATE cart_users SET Quantity=Quantity+1 WHERE Id_User='$user_id' and Id_Product='$idProduct'");

            }else{
                mysqli_query($link,"insert into cart_users  (Id_User,Id_Product,Quantity) VALUES('$user_id', '$idProduct', '1')");
            }
        }else{
            echo "<script>alert('Ya no hay más stock del producto $name.');document.location='/ecommerce/cart/cart.php'</script>";
        }
        mysqli_close($link);
    }
}

function deleteProductToCart($Id_Product){
    $link = dbConnection();
    $logged_user = getLoggedUser();
    $user_id = $logged_user->id;
    
    if(getQuantityProduct($Id_Product)==1){
        mysqli_query($link,"delete from cart_users  where  Id_Product	 = '$Id_Product' and Id_User = '$user_id'");
    }
    else{
        mysqli_query($link,"UPDATE cart_users SET Quantity=Quantity-1 WHERE Id_User='$user_id' and Id_Product='$Id_Product'");
    }
    
 }

 function itemInCart($idProduct){
    $link = dbConnection();
    $retorno = false;

    $cart = GetProductsInCart();
    foreach ($cart as &$product){
        if($product == $idProduct){
            $retorno = true;
        }
    }
    return $retorno;
}

 function getQuantityProduct($idProduct){
    $link = dbConnection();
    $logged_user = getLoggedUser();
    $user_id = $logged_user->id;
    $query_result=mysqli_query($link,"select  Quantity from cart_users  where  Id_User = '$user_id' and Id_Product = '$idProduct'");
    $rows = mysqli_fetch_array($query_result);
    if($rows != null){
        $quantity=$rows["Quantity"];
    }
    return $quantity;

 }

 function GetProductsInCart(){
    $link = dbConnection();
    LoginIfNotStarted();
    if($_SESSION){
        $logged_user = getLoggedUser();
        $user_id = $logged_user->id;
        $sentencia=mysqli_query($link,"select  Id_Product from cart_users  where  Id_User = '$user_id'");
        $products= array();
        while($filas = mysqli_fetch_array($sentencia)){
            $products[]=$filas["Id_Product"];
        }
        return $products;
    }
 }

 function EmptyCart(){
    $link = dbConnection();
    if($_SESSION){
        $logged_user = getLoggedUser();
        $user_id = $logged_user->id;
        mysqli_query($link,"delete from cart_users  where  Id_User = '$user_id'");
    }  
 }

 function checkout($amount, $paymentMethod){
    
    if($amount!=0){//CARRITO NO VACIO
        $link = dbConnection();
        if($_SESSION){
            $logged_user = getLoggedUser();
            $user_id = $logged_user->id;

            //PRODUCTOS CARRITO
            $sentencia=mysqli_query($link,"select  Id_Product, Quantity from cart_users  where  Id_User = '$user_id'");
            $products= array();
            while($filas = mysqli_fetch_array($sentencia)){
                $products[]=$filas;
            }

            //CHEQUEO STOCK
            $compra = true;
            foreach($products as &$product){
                $disponible = getProductStock($product["Id_Product"]) - getQuantityProduct($product["Id_Product"]);
                if($disponible<0){
                    $compra = false;
                }
            }

            if($compra){//SI HAY STOCK
                //FECHA COMPRA
                date_default_timezone_set('America/Montevideo');
                $fecha = date('d-m-y h:i:s');
                
                //INSERTAR COMPRA
                mysqli_query($link,"insert into buy  (Id_User, Date, Amount, payment_method) VALUES('$user_id', '$fecha','$amount', '$paymentMethod')");
            
                //INSERTAR PRODUCTOS
                $result=mysqli_query($link,"select  Id_Buy from buy  where  Id_User = '$user_id' and Amount = '$amount'");
                $ids = array();
                while($filas = mysqli_fetch_array($result)){
                    $ids[]=$filas["Id_Buy"];
                }
                $idBuy = max($ids);

                foreach($products as &$product){
                    $auxProd = $product["Id_Product"];
                    $auxQuan = $product["Quantity"];
                    mysqli_query($link,"insert into buy_products  (Id_Buy, Id_Product, Quantity) VALUES('$idBuy', '$auxProd', '$auxQuan')");
                }

                //RESTAR STOCK
                foreach ($products as &$product){
                    $cantidad = getQuantityProduct($product["Id_Product"]);
                    $auxProd = $product["Id_Product"];
                    mysqli_query($link,"UPDATE product SET stock=stock-$cantidad WHERE id='$auxProd'");
                }
                
                //VACIAR CARRITO
                EmptyCart();
            }else{//SI NO HAY STOCK
                echo "<script>alert('Ya no hay más stock de alguno/s de los productos.');document.location='/ecommerce/cart/cart.php'</script>";
            }

        }
    }else{//CARRITO VACIO
        echo "<script>alert('El carrito no puede estar vacío.');document.location='/ecommerce/cart/cart.php'</script>";
    }
 }

?>