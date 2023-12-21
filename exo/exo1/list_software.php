<!-- list_software.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Software</title>
</head>
<body>
    <h1>List of Software</h1>
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

$sql = "SELECT software.id, software.name, component.name AS component_name, package.name AS package_name 
        FROM software 
        LEFT JOIN component ON software.id = component.software_id 
        LEFT JOIN package ON software.id = package.software_id";
$result = $conn->query($sql);

echo "<h1>List of Software</h1>";

if ($result && $result->num_rows > 0) {
    // Affichez les données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "Software: " . $row["name"]. " - Component: " . $row["component_name"]. " - Package: " . $row["package_name"]. " - <a href='submit_bug.php?software_id=" . $row["id"] . "'>Report Bug</a><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>