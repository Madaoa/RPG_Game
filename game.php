<?php
session_start();
require_once('Personnages/Guerrier.php');
require_once('Personnages/Magicien.php');
require_once('Personnages/Paladin.php');
@include('Vues/header.html');
?>
<div class="container flex">
<h2 class="game_title">Vous avez choisi le <?php echo $_POST['classe'] ?></h2>
    <form action="room.php" method="POST" class="game">
        <input type="submit" value="Entrer dans le donjon !" >
    </form>


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

?>
    <hr>
    <?php
echo "<h1>Fiche technique</h1>". "<br>"	;
?>
    <div class="row">
        <div class="col-lg-6 grey push-lg-3">
        <?php

echo '<p>Votre classe : ' . $perso->classe(). '</p>';

echo '<p>Points de vie : ' . $perso->vie(). '</p>';

echo '<p>Attaque : ' . $perso->attaque(). '</p>';

echo '<p>Magie : ' . $perso->magie(). '</p>';


?>
        </div>
    </div>
</div>
<?php
@include('Vues/footer.html');
?>

