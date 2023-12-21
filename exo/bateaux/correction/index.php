<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les bateaux</title>
    <style>
        table {
            margin: 50px auto;
        }
        table,tr,th,td {
            border: 1px solid #747779;
            border-collapse: collapse;
            padding: 20px;            
        }
        th, td {   
            font-weight: bolder;
            text-align: center;         
            width: 200px;
        }
        th {
            color: blue;
        }
    </style>
</head>
<body>
    <form action="" method='POST'>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Modèle</th>
                <th>Taille</th>
                <th>Propriètaire</th>
                <th>Actions</th>
            </tr>
            <?php
                require_once('./Controllers/read_ctrl.php');
                foreach($ListBateau as $bateau) {
                    echo "<tr>";
                    foreach ($bateau as $colonne) {
                        echo "<td>$colonne</td>";
                    }
                    echo "<td>
                    <button name='update' value='" . $bateau['id'] . "'>Modifier</button>
                    <button formaction='' name='delete' value='" . $bateau['id'] . "'>Supprimer</button>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </form>
</body>
</html>