<?php
include("../functions/bdd.php");
include("../Controllers/read_ctrl.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Afficher un Livre</title>
    <link rel="stylesheet" href="../functions/style.css">
</head>
<body>
    <?php if (isset($livre)): ?>
        <h2>Informations du Livre</h2>
        <ul>
            <li>ID: <?php echo $livre['id']; ?></li>
            <li>Titre: <?php echo htmlspecialchars($livre['titre']); ?></li>
            <li>ISBN: <?php echo htmlspecialchars($livre['ISBN']); ?></li>
            <li>Résumé: <?php echo htmlspecialchars($livre['resume']); ?></li>
        </ul>
    <?php else: ?>
        <p>Livre non trouvé.</p>
    <?php endif; ?>
    <a href="../index.php">Page d'accueil</a>

</body>
</html>
