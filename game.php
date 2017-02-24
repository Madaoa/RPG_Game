<?php
session_start();
require_once('Personnages/Guerrier.php');
require_once('Personnages/Magicien.php');
require_once('Personnages/Paladin.php');
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jeu RPG</title>
</head>
<body>
<h2>Vous avez choisi le <?php echo $_POST['classe'] ?></h2>

<?php
if($_POST['classe'] == "Guerrier"){
    $perso = new Guerrier();
    $_SESSION['personnage'] = serialize(new Guerrier());
}else if($_POST['classe'] == "Magicien" ){
    $perso = new Magicien();
    $_SESSION['personnage'] = serialize(new Magicien());
}else if($_POST['classe'] == "Paladin"){
    $perso = new Paladin();
    $_SESSION['personnage'] = serialize(new Paladin());


}else {
    echo "pas compris";
}


echo "<h1>Fiche technique</h1>". "<br>"	;

echo 'Votre classe : ' . $perso->classe(). '<br>';

echo 'Points de vie : ' . $perso->vie(). '<br>';

echo 'Attaque : ' . $perso->attaque(). '<br>';

echo 'Magie : ' . $perso->magie(). '<br>';


?>
<form action="room.php" method="POST">
<input type="submit" value="Entrer dans le donjon !">
</form>

</body>
</html>