<?php 
$query = $db->prepare("INSERT INTO recommanded(user_id, restaurant_id) VALUE (:restaurant_id, :user_id ) ");
$parameters = [
    "restaurant_id" => "",
    "user_id" => $_SESSION["id"]
    ];
$query->execute($parameters);

HEADER "";

?> 

<?php 
$query = $db->prepare("DELETE FROM recommanded WHERE user_id = user_id WHERE restaurant_id = :restaurant_id ");
$parameters = [
    "restaurant_id" => "",
    "user_id" => $_SESSION["id"]
    ];
$query->execute($parameters);

HEADER "";
?> 
