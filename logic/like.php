<?php 
require "../config/connexion.php";
var_dump($_POST);
$query = $db->prepare("INSERT INTO recommanded(user_id, restaurant_id) VALUE (:user_id, :restaurant_id ) ");
$parameters = [
    "restaurant_id" => $_POST["restaurant_id"],
    "user_id" => $_POST["user_id"]
    ];
$query->execute($parameters);

header("Location : ../index.php?route=list_resto");

?> 