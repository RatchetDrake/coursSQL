<?php
    session_start();
    if (empty($_SESSION)) {
        header('Location: ../application.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <title>Bug</title>
</head>
<body>
    <form action="">
        <label for="owner">ton prenom mon chum 🤙</label>
        <input type="text" name="owner" id="owner">

        <label for="severity">LE degré de danger 1=(ça passe) 5=(Crise planetaire dans le caleçon)</label>
        <select name="severity" id="severity">
            <option value="sev1">je suis le bug un peu sympa, genre tu peux taper la discute on s'entendra grave bien et tout. sinon ta fait quoi de beau aujourd'hui mon loulou tu t'es bien brossé les dents ?</option>
            <option value="sev2">je suis un peu plus chiant un peu comme un chihuahua</option>
            <option value="sev3">je suis le dédé un peu bourré</option>
            <option value="sev4">je suis julien après avoir fait acte de zoophilie sur approximativement 8 animaux en meme temps</option>
            <option value="sev5">je suis le désastre de type oh raie lit 🖕</option>
        </select>

        <label for="summary">Sommaire 🤙</label>
        <input type="text" name="summary" id="summary">

        <label for="description">La description de ce magnifique bug qui pourrais mettre fin a une si belle application</label>
        <input type="text" name="description" id="description">

        <input type="submit" value="❌">
    </form>
</form>
</body>
</html>