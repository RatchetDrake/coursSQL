<?php
// Récupération des informations du livre
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT id, titre, ISBN, resume FROM livre WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
