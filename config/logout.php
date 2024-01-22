<?php
session_start(); // Démarre la session
session_destroy(); // Détruit la session

header("Location: ../index.php"); // Redirige vers la page de connexion
exit();
?>
