<?php
require "../config/connexion.php";
if (isset($_POST["email"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["password"])) {
    if ($_POST["password"] !== $_POST["verifPassword"]) {
        header("Location: ../index.php?route=inscription&password=false");
    } else {
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            'email' => $_POST['email']
            ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) { 
            header("Location: ../index.php?route=inscription&email=set");
        }else{
        $hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
         $query = $db->prepare('INSERT INTO users (email, password, first_name, last_name)
         VALUES(:email, :password, :first_name, :last_name)');
         $parameters = [
             'email' => $_POST['email'],
             'password' => $hash,
             'first_name' => $_POST['firstName'],
             'last_name' => $_POST['lastName']
             ];
         $query->execute($parameters);
         header("Location: ../index.php");
    }
    }
}
?>