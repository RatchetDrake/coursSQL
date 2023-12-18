<?php
include("../Controllers/create_ctrl.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Livre</title>
    <link rel="stylesheet" href="../functions/style.css">
</head>
<body>
    <h2>Ajouter un Livre</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Titre: <input type="text" name="titre" required><br>
        ISBN: <input type="text" name="ISBN" required><br>
        Résumé: <textarea name="resume" required></textarea><br>
        <input type="submit" value="Créer">
    </form>
    <a href="../index.php">Page d'accueil</a>
</body>
</html>
