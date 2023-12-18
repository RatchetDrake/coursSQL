<?php
// Connexion à la base de données
$host = 'localhost'; // ou votre adresse de serveur
$dbname = 'crud'; // le nom de votre base de données
$username = 'RatchetDrake'; // votre nom d'utilisateur pour la base de données
$password = 'Azerty'; // votre mot de passe pour la base de données

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>