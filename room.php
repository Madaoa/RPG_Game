<?php
require_once('Personnages/Guerrier.php');
require_once('Personnages/Magicien.php');
require_once('Personnages/Paladin.php');
require_once('Core/Game.php');
require_once('Monstres/Squelette.php');
require_once('Monstres/Bandit.php');
require_once('Monstres/Titan.php');
require_once('Arme/Baguette.php');
require_once('Arme/BaguetteDeFeu.php');
require_once('Arme/Epee.php');
require_once('Arme/Hache.php');
require_once('Arme/Masse.php');
require_once('Arme/Sceptre.php');

session_start();
if ( isset( $_SESSION['personnage'] ) )
{
    $personnage = unserialize($_SESSION['personnage']);
};
if ( isset( $_SESSION['jeu'] ) )
{
    $jeu = unserialize($_SESSION['jeu']);
}else{
    $jeu = new Game();
};

if (!isset($_POST['step'])){
    $step=0;
}else{
    $step=$_POST['step'];
}

?>


<?php
@include('Vues/header.html');
?>

<h1>Vous êtes à la salle <?php echo $jeu->salle(); ?> </h1>

<?php
if($jeu->salle() < 10){


//APPARITION DU MONSTRE
    if($jeu->apparitionMonstre() AND $step== 0){
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
        $step=1;
        echo 'Il n\'y a pas de monstre. <br>';

    }

    // APPARITION DU COFFRE
    if($step== 1 AND $jeu->apparitionCoffre()){
        echo 'Vous apercevez un coffre ...';
        switch ($jeu->selectArme()) {
            case 0:
                $arme= new Baguette();
                echo " une ".$arme->nom()." s'y trouve ! <br>";
                $personnage->equip_dmgArme($arme);
                break;
            case 1:
                $arme= new BaguetteDeFeu();
                echo " une ".$arme->nom()." s'y trouve ! <br>";
                $personnage->equip_dmgArme($arme);
                break;
            case 2:
                $arme= new Epee();
                echo " une ".$arme->nom()." s'y trouve ! <br>";
                $personnage->equip_dmgArme($arme);
                break;
            case 3:
                $arme= new Hache();
                echo " une ".$arme->nom()." s'y trouve ! <br>";
                $personnage->equip_dmgArme($arme);
                break;
            case 4:
                $arme= new Masse();
                echo " une ".$arme->nom()." s'y trouve ! <br>";
                $personnage->equip_dmgArme($arme);
                break;
            case 5:
                $arme= new Sceptre();
                echo " un ".$arme->nom()." s'y trouve ! <br>";
                $personnage->equip_dmgArme($arme);
                break;
        }
        $_SESSION['personnage'] = serialize($personnage);
        $step=2;
echo'
<form method="POST" action="room.php">
<input type="hidden" name="step" value="3">
<input type="submit" value="Chercher une porte">
</form>';

    }else if ($step== 1){
        $step=3;
        echo 'Il n\'y a pas de coffre. <br>';
    }

// APPARITION PORTE

    if($step== 3){
        echo 'Vous cherchez une porte ...
        <form method="POST" action="escalier.php">';

      for ($i = 1; $i<=$jeu->apparitionPorte(); $i++){
        echo '<input type="submit" value="Ouvrir la porte '.$i.'">';
      }
echo '</form>';
        $_SESSION['jeu'] = serialize($jeu);
        $_SESSION['personnage'] = serialize($personnage);


    }

}else{
    echo
//    '<form action="boss.php" method="POST">
//            <input type="submit" value="Je veux défier le TITAN !">
//     </form>';
    'DANS UN PROCHAIN DLC, LE TITAN !';
}

@include('Vues/footer.html')
?>


<?php
echo "<h1>Fiche technique</h1>". "<br>"	;

echo 'Votre classe : ' . $personnage->classe(). '<br>';

echo 'Points de vie : ' . $personnage->vie(). '<br>';

echo 'Attaque : ' . $personnage->attaque(). '<br>';

echo 'Magie : ' . $personnage->magie(). '<br>';

echo 'Arme : ' .$personnage->nomArme().' +'. $personnage->dmgArme(). '<br>';


?>
</body>
</html>

