<?php
session_start();
require "../config/connexion.php";

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $query = $db->prepare('SELECT * FROM users WHERE email = :email');
    $parameters = [
        'email' => $_POST['email']
        ];
    $query->execute($parameters);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
         $hash = $user["password"];
        $passwordUncrypted = password_verify($_POST["password"], $hash);
        if ($passwordUncrypted) {
            $_SESSION["user"] = $user["first_name"] . " " . $user["last_name"];
            $_SESSION["id"] = $user["id"];
            header("Location: ../index.php?route=list_resto");
            
        } else { 
            header("Location: ../index.php?route=login&password=false");
        }   
    }else{
        header("Location: ../index.php?route=login&email=false");
    }
}
