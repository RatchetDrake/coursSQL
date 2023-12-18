<?php // Traitement du formulaire lors de sa soumission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $host = 'localhost'; // ou votre adresse de serveur
    $dbname = 'crud'; // le nom de votre base de données
    $username = 'RatchetDrake'; // votre nom d'utilisateur pour la base de données
    $password = 'Azerty'; // votre mot de passe pour la base de données

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Validation de l'ISBN
        if (!preg_match('/^\d+$/', $_POST['ISBN'])) {
            throw new Exception("L'ISBN doit contenir uniquement des chiffres.");
        }

        // Préparation de la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO livre (titre, ISBN, resume) VALUES (:titre, :ISBN, :resume)");

        // Liaison des paramètres
        $stmt->bindParam(':titre', $_POST['titre']);
        $stmt->bindParam(':ISBN', $_POST['ISBN']);
        $stmt->bindParam(':resume', $_POST['resume']);

        // Exécution de la requête
        $stmt->execute();

        echo "Livre ajouté avec succès.";
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    } catch(Exception $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>