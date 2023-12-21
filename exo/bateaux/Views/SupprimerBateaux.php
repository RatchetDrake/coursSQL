<?php
include('../Function/db.php');

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (!$id) {
    header('Location: ../Views/ListeBateaux.php');
    exit();
}

try {
    // Supprimer le carnet d'entretien associé au bateau
    $stmt = $pdo->prepare("DELETE FROM carnet_entretien WHERE id_bateau = :id");
    $stmt->execute(['id' => $id]);

    // Supprimer le bateau
    $stmt = $pdo->prepare("DELETE FROM bateaux WHERE id = :id");
    $stmt->execute(['id' => $id]);

    $message = 'Bateau supprimé avec succès.';
    // Redirection vers la page d'accueil ou de liste
    header('Location: ../Views/ListeBateaux.php');
    exit();
} catch (PDOException $e) {
    $message = "Erreur: " . $e->getMessage();
    // Afficher un message d'erreur ou rediriger l'utilisateur vers une page d'erreur
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Bateau</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Supprimer un Bateau</h1>
    <?php if (isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <!-- Un formulaire de confirmation ou un message indiquant que le bateau a été supprimé -->
</body>
</html>
