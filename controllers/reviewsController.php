<?php
    function getProductReviews($product_id)
    {
        $connectionLink = dbConnection();
        $query = "select u.name, r.date, r.points, r.comment from review as r join user as u on u.id = r.user_id where r.product_id = '$product_id'";
        $result = $connectionLink->query($query);
        $reviews = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $reviews[] = $row;
        }
        mysqli_close($connectionLink);
        return $reviews;
    }
    function getCountProductReviews($product_id){
        $connectionLink = dbConnection();
        $query_result = mysqli_query($connectionLink, "select count(*) from review where product_id='$product_id'");
        $rows = mysqli_fetch_array($query_result);
        if($rows != null){
            $count_reviews = $rows[0];
            mysqli_close($connectionLink);
            return $count_reviews;
        }
        else{
            mysqli_close($connectionLink);
            return 0;
        }
    }
    function createReview($user_id, $product_id, $points, $comment){
        $connectionLink = dbConnection();
        $date = date("Y/m/d");
        $sql = "insert into review(product_id, user_id, date, points, comment) values ('$product_id','$user_id','$date', '$points', '$comment')";
        if (mysqli_query($connectionLink, $sql)){
            echo "<p class='success-text w-100'>¡Reseña agregada correctamente, gracias por tu opinion!</p>";
        } else {
            echo "<p class='error-text w-100'>Vaya, parece que hubo un problema al agregar tu reseña</p>";
        }
        mysqli_close($connectionLink);
    }
?>