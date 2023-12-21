<?php
include('../Function/db.php'); // Inclure le fichier de connexion à la base de données

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $modele = $_POST['modele'];
    $taille = $_POST['taille'];
    $proprietaire = $_POST['proprietaire'];

    // Commencez une transaction
    $pdo->beginTransaction();
    try {
        // Insérer un nouveau bateau et récupérer l'ID
        $sqlBateau = "INSERT INTO bateaux (nom, modele, taille, proprietaire) VALUES (:nom, :modele, :taille, :proprietaire)";
        $stmt = $pdo->prepare($sqlBateau);
        $stmt->execute(['nom' => $nom, 'modele' => $modele, 'taille' => $taille, 'proprietaire' => $proprietaire]);
        $id_bateau = $pdo->lastInsertId();

        // Insérer un nouveau carnet d'entretien associé au bateau
        $sqlCarnet = "INSERT INTO carnet_entretien (id_bateau, type, periodicite, last, next) VALUES (:id_bateau, 'moteur', 1, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR))";
        $stmt = $pdo->prepare($sqlCarnet);
        $stmt->execute(['id_bateau' => $id_bateau]);

        // Valider la transaction
        $pdo->commit();
        $message = 'Bateau et carnet d\'entretien ajoutés avec succès.';
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        $pdo->rollBack();
        $message = "Erreur: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Bateau</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un nouveau Bateau</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post" action="AjoutBateaux.php">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="modele">Modèle :</label>
            <input type="text" id="modele" name="modele" required>
        </div>
        <div>
            <label for="taille">Taille :</label>
            <input type="number" id="taille" name="taille" step="0.01" required>
        </div>
        <div>
            <label for="proprietaire">Propriétaire :</label>
            <input type="text" id="proprietaire" name="proprietaire" required>
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
    <a href="../Views/ListeBateaux.php">Liste des bateaux</a>
</body>
</html>