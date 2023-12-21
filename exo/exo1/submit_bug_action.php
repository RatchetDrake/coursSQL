// submit_bug_action.php
<?php
$servername = "localhost";
$username = "RatchetDrake";
$password = "Azerty";
$dbname = "application";

// Récupérez les données du formulaire
$author = $_POST['author'];
$owner = $_POST['owner'];
$summary = $_POST['summary'];
$description = $_POST['description'];

// Créez la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifiez si l'author existe dans attachement
$stmt = $conn->prepare("SELECT author FROM attachement WHERE author = ?");
$stmt->bind_param("s", $author);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // L'author n'existe pas, créez-le
    $insert_stmt = $conn->prepare("INSERT INTO attachement (author, body) VALUES (?, 'Default body')");
    $insert_stmt->bind_param("s", $author);
    $insert_stmt->execute();
    $insert_stmt->close();
}

// Insérez le bug dans la table bug
$insert_bug_stmt = $conn->prepare("INSERT INTO bug (author, owner, summary, description, status) VALUES (?, ?, ?, ?, 'unsolved')");
$insert_bug_stmt->bind_param("ssss", $author, $owner, $summary, $description);

if ($insert_bug_stmt->execute()) {
    echo "New bug reported successfully";
} else {
    echo "Error: " . $insert_bug_stmt->error;
}

$insert_bug_stmt->close();
$conn->close();
?>