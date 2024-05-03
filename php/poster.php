<?php
// Connexion à la base de données

// Récupération des données du formulaire
$username = $_POST['username'];
$message = $_POST['message'];

// Insertion du message dans la base de données

// Redirection vers la page du forum
header("Location: forum.php");
exit;
?>