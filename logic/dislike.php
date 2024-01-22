<?php 
require "../config/connexion.php";
$query = $db->prepare("DELETE FROM recommanded WHERE user_id = :user_id AND restaurant_id = :restaurant_id ");
$parameters = [
    "restaurant_id" => $_POST["restaurant_id"],
    "user_id" => $_POST["user_id"]
    ];
$query->execute($parameters);
header("Location : ../index.php?route=list_resto");
?> 
