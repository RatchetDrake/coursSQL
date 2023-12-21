<?php
$host = 'localhost';
$db   = 'bateau'; // Le nom de votre base de données
$user = 'RatchetDrake'; // Votre nom d'utilisateur pour la base de données
$pass = 'Azerty'; // Votre mot de passe pour la base de données
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


// Fonction pour récupérer tous les bateaux
function fetchAllBateaux() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM bateaux');
    return $stmt->fetchAll();
}

// Fonction pour récupérer un bateau par ID
function fetchBateauById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM bateaux WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

// Ajoutez ici d'autres fonctions pour interagir avec la base de données si nécessaire.

?>
