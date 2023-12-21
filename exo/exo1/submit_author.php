// submit_author.php
<?php
$servername = "localhost";
$username = "RatchetDrake";
$password = "Azerty";
$dbname = "application";

// Créez la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparez la requête SQL en utilisant le bon nom de table et de colonnes
$stmt = $conn->prepare("INSERT INTO attachement (author, body) VALUES (?, ?)");
if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Récupérez les données du formulaire
$author_name = $_POST['author_name'];
$body = $_POST['body']; // Assurez-vous que ce champ existe dans votre formulaire HTML

// Liez les paramètres à la requête
$stmt->bind_param("ss", $author_name, $body);

// Exécutez la requête et vérifiez le résultat
if ($stmt->execute()) {
    echo "New author created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>