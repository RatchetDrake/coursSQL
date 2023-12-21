<?php
// connexion.php contiendra vos fonctions de connexion à la base de données.
include('../Function/db.php');

// Récupérer la liste des bateaux de la base de données
$bateaux = fetchAllBateaux(); // Cette fonction devrait être définie dans db.php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Bateaux</title>
    <!-- Lien vers votre feuille de style CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des Bateaux</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Modèle</th>
                <th>Taille</th>
                <th>Propriétaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bateaux as $bateau): ?>
            <tr>
                <td><?php echo htmlspecialchars($bateau['nom']); ?></td>
                <td><?php echo htmlspecialchars($bateau['modele']); ?></td>
                <td><?php echo htmlspecialchars($bateau['taille']); ?></td>
                <td><?php echo htmlspecialchars($bateau['proprietaire']); ?></td>
                <td>
                    <a href="ModifBateaux.php?id=<?php echo $bateau['id']; ?>">Modifier</a>
                    <a href="../Views/SupprimerBateaux.php?id=<?php echo $bateau['id']; ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="AjoutBateaux.php">Ajouter un nouveau bateau</a>
</body>
</html>
