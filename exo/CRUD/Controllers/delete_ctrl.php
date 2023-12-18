<?php
include("../functions/bdd.php");
// Vérification et récupération de l'ID du livre à supprimer
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Préparation de la requête de suppression
        $stmt = $conn->prepare("DELETE FROM livre WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        $stmt->execute();

        // Redirection vers la page principale
        header("Location: ../index.php");
        exit();
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    echo "ID du livre non spécifié.";
}
?>
