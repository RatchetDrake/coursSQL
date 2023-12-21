<?php
include('../Function/db.php');

$message = '';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (!$id) {
    header('Location: ListeBateaux.php');
    exit();
}

// Récupérer les informations du bateau pour pré-remplir le formulaire
$stmt = $pdo->prepare("SELECT * FROM bateaux WHERE id = :id");
$stmt->execute(['id' => $id]);
$bateau = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération et nettoyage des données du formulaire
    $nom = $_POST['nom'];
    $modele = $_POST['modele'];
    $taille = $_POST['taille'];
    $proprietaire = $_POST['proprietaire'];

    try {
        // Mise à jour du bateau
        $sql = "UPDATE bateaux SET nom = :nom, modele = :modele, taille = :taille, proprietaire = :proprietaire WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nom' => $nom, 'modele' => $modele, 'taille' => $taille, 'proprietaire' => $proprietaire, 'id' => $id]);
        
        $message = 'Bateau modifié avec succès.';
        // Redirection vers la page d'accueil ou de liste
        header('Location: ListeBateaux.php');
        exit();
    } catch (PDOException $e) {
        $message = "Erreur: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Bateau</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier un Bateau</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post" action="ModifBateaux.php?id=<?php echo $id; ?>">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required value="<?php echo htmlspecialchars($bateau['nom']); ?>">
        </div>
        <div>
            <label for="modele">Modèle :</label>
            <input type="text" id="modele" name="modele" required value="<?php echo htmlspecialchars($bateau['modele']); ?>">
        </div>
        <div>
            <label for="taille">Taille :</label>
            <input type="number" id="taille" name="taille" step="0.01" required value="<?php echo htmlspecialchars($bateau['taille']); ?>">
        </div>
        <div>
            <label for="proprietaire">Propriétaire :</label>
            <input type="text" id="proprietaire" name="proprietaire" required value="<?php echo htmlspecialchars($bateau['proprietaire']); ?>">
        </div>
        <div>
            <button type="submit">Modifier</button>
        </div>
    </form>
</body>
</html>
