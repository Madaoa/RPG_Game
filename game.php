<?php
session_start();
require_once('Personnages/Guerrier.php');
require_once('Personnages/Magicien.php');
require_once('Personnages/Paladin.php');
@include('Vues/header.html');
?>
<div class="container flex">
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
</div>
<?php
@include('Vues/footer.html');
?>

