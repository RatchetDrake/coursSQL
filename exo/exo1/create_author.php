<!-- create_author.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Author</title>
</head>
<body>
    <h1>Create Author</h1>
    <form action="submit_author.php" method="post">
        Author Name: <input type="text" name="author_name" required><br>
        Body Text: <textarea name="body"></textarea><br> <!-- Ajoutez ce champ si vous souhaitez permettre à l'utilisateur d'entrer du texte -->
        <input type="submit" value="Create Author">
    </form>
</body>
</html>
