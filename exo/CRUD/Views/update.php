<?php
include("../functions/bdd.php");
include("../Controllers/update_ctrl.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier un Livre</title>
    <link rel="stylesheet" href="../functions/style.css">
</head>
<body>
    <?php if (isset($livre)): ?>
        <h2>Modifier un Livre</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input type="hidden" name="id" value="<?php echo $livre['id']; ?>">
            Titre: <input type="text" name="titre" value="<?php echo htmlspecialchars($livre['titre']); ?>" required><br>
            ISBN: <input type="text" name="ISBN" value="<?php echo htmlspecialchars($livre['ISBN']); ?>" required><br>
            Résumé: <textarea name="resume" required><?php echo htmlspecialchars($livre['resume']); ?></textarea><br>
            <input type="submit" value="Modifier">
        </form>
    <?php else: ?>
        <p></p>
    <?php endif; ?>
    <a href="../index.php">Page d'accueil</a>
</body>
</html>
