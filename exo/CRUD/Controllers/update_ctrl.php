<?php
// Traitement du formulaire lors de sa soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Validation de l'ISBN
        if (!preg_match('/^\d+$/', $_POST['ISBN'])) {
            throw new Exception("L'ISBN doit contenir uniquement des chiffres.");
        }

        // Préparation de la requête d'update
        $stmt = $conn->prepare("UPDATE livre SET titre = :titre, ISBN = :ISBN, resume = :resume WHERE id = :id");

        // Liaison des paramètres
        $stmt->bindParam(':titre', $_POST['titre']);
        $stmt->bindParam(':ISBN', $_POST['ISBN']);
        $stmt->bindParam(':resume', $_POST['resume']);
        $stmt->bindParam(':id', $_POST['id']);

        // Exécution de la requête
        $stmt->execute();

        echo "Livre mis à jour avec succès.";
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    } catch(Exception $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// Récupération des informations du livre à modifier
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT id, titre, ISBN, resume FROM livre WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>