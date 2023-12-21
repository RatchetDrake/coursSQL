// submit_bug.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Bug</title>
</head>
<body>
    <?php
    $software_id = isset($_GET['software_id']) ? $_GET['software_id'] : 'Unknown'; // Utilisez une valeur par défaut ou gérez l'absence de l'ID
    ?>
    <h1>Submit Bug for Software ID: <?php echo $software_id; ?></h1>
    html
Copy code
<!-- Dans submit_bug.php -->
<!-- Dans submit_bug.php -->
<form action="submit_bug_action.php" method="post">
    Author: <input type="text" name="author" required><br>
    Owner: <input type="text" name="owner" required><br>
    Bug Summary: <input type="text" name="summary" required><br>
    Bug Description: <textarea name="description" required></textarea><br>
    <input type="hidden" name="software_id" value="<?php echo $software_id; ?>">
    <input type="submit" value="Submit Bug">
</form>
</body>
</html>
