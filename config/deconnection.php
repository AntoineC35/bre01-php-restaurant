<?php
session_start(); // Démarre la session
session_destroy(); // Détruit la session

header("Location: index.phtml"); // Redirige vers la page de connexion
exit();
?>
