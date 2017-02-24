<?php
require_once('Personnages/Guerrier.php');
require_once('Personnages/Magicien.php');
require_once('Personnages/Paladin.php');
require_once('Core/Game.php');
require_once('Monstres/Squelette.php');
require_once('Monstres/Bandit.php');
require_once('Monstres/Titan.php');
session_start();
if ( isset( $_SESSION['personnage'] ) )
{
    $personnage = unserialize($_SESSION['personnage']);

};
if (!isset($jeu)){
    $jeu = new Game();
}
if (!isset($_POST['monstre_vaincu'])){
    $monstre_vaincu=0;
}

?>

<?php
@include('Vues/header.html');
echo "<h1>Fiche technique</h1>". "<br>"	;

echo 'Votre classe : ' . $personnage->classe(). '<br>';

echo 'Points de vie : ' . $personnage->vie(). '<br>';

echo 'Attaque : ' . $personnage->attaque(). '<br>';

echo 'Magie : ' . $personnage->magie(). '<br>';


?>
<h1>Vous êtes à la salle <?php echo $jeu->salle(); ?> </h1>

<?php
if($jeu->salle() < 10){


//APPARITION DU MONSTRE
    if($jeu->apparitionMonstre() AND $monstre_vaincu== 0){
        echo 'Vous rencontrez un monstre ...';
        switch ($jeu->selectMonstre()) {
            case 0:
                $ennemi= new Squelette();
                echo " et c'est un squelette ! <br>";

                break;
            case 1:
                $ennemi= new Bandit();
                echo " et c'est un bandit !<br>";

                break;
        }
        $_SESSION['ennemi'] = serialize($ennemi);
        $_SESSION['personnage'] = serialize($personnage);
        echo
        '<form action="battle.php" method="POST">
            <input type="submit" value="Engager le combat !">
        </form>';
    }else{
        $monstre_vaincu=1;
    }

    // APPARITION DU COFFRE
    if($monstre_vaincu== 1){
        echo 'Vous apercevez un coffre ...';
        switch ($jeu->selectCoffre()) {
            case 0:
                $ennemi= new Squelette();
                echo " et c'est un squelette ! <br>";

                break;
            case 1:
                $ennemi= new Bandit();
                echo " et c'est un bandit !<br>";

                break;
        }
        $_SESSION['ennemi'] = serialize($ennemi);
        $_SESSION['personnage'] = serialize($personnage);
        echo
        '<form action="battle.php" method="POST">
            <input type="submit" value="Engager le combat !">
        </form>';
    }




}else{
    echo
    '<form action="boss.php" method="POST">
            <input type="submit" value="Je veux défier le TITAN !">
     </form>';
}

@include('Vues/footer.html')
?>

