<?php 
require("/xampp/htdocs/ecommerce/config/dbConnection.php");

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
?>