<?php
session_start();
session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jeu RPG</title>
</head>
<body>
<h2>Choisissez votre classe</h2>

<form method="post" action="game.php">
    <select name="classe">
        <option value="Guerrier">Guerrier</option>
        <option value="Magicien">Magicien</option>
        <option value="Paladin">Paladin</option>
    </select>
    <input type="submit">
</form>

</body>
</html>