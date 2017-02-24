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
    $ennemi = unserialize($_SESSION['ennemi']);
    $personnage = unserialize($_SESSION['personnage']);

};


@include('Vues/header.html');
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 push-lg-3">
            <h1>Mode Combat ! </h1>

            <?php
            if(!isset($_POST['flag'])){
                $flag = 0;
            }else{
                $flag=1;
            } ?>

            <?php
            if($personnage->mort()){
                echo 'Vous avez perdu... <br>
<a href="index.php">Retourner à l\'écran titre</a>';
            }


            else if($ennemi->mort()){
                echo 'Vous avez gagné !<br>
        <form method="POST" action="room.php">
            <input type="hidden" name="monstre_vaincu" value="1" >
            <input type="submit">            
        </form>';

            }


            else if($flag== 0){
                echo '
        <form action="battle.php" method="POST" class="atk">
              <input type="hidden" name="flag" value="1" >
              <input type="submit" value="Attaquer" name="move">
              <input type="submit" value="Incantation" name="move">
        </form>';}


            else{
                ?>
                <div class="col-lg-12 text_indic">
                <?php
                if(isset($_POST['move'])){
                    if($_POST['move']=="Attaquer"){
                        $personnage->agroPhysique($ennemi);
                        echo '<br>';
                        $ennemi->agro($personnage);

                    }else if($_POST['move']=="Incantation"){
                        $personnage->agroMagique($ennemi);
                        echo '<br>';
                        $ennemi->agro($personnage);
                    }}
                    ?>
                </div>
                <?php
                echo'
        <form action="battle.php" method="POST" class="atk">
              <input type="hidden" name="flag" value="1" >
              <input type="submit" value="Attaquer" name="move" >
              <input type="submit" value="Incantation" name="move" >
        </form>';
            }
            ?>
            </div>

        </div>
        <hr>

        <?php
        echo "<h1>Fiche technique</h1>". "<br>"	;
        ?>
        <div class="row">
            <div class="col-lg-6 grey">

        <?php
        echo '<h3>Personnage</h3>';
        echo 'Votre classe : ' . $personnage->classe(). '<br>';

        echo 'Points de vie : ' . $personnage->vie(). '<br>';

        echo 'Attaque : ' . $personnage->attaque(). '<br>';

        echo 'Magie : ' . $personnage->magie(). '<br>';

?>
        </div>
            <div class="separate"></div>
        <div class="col-lg-6 grey">
        <?php

        echo '<h3>Ennemi</h3>';

        echo 'Nom : ' . $ennemi->nom(). '<br>';

        echo 'Points de vie : ' . $ennemi->vie(). '<br>';

        echo 'Attaque : ' . $ennemi->attaque(). '<br>';







        ?>
        </div>
        </div>
        <?php

        $_SESSION['ennemi'] = serialize($ennemi);

        $_SESSION['personnage'] = serialize($personnage);

        ?>
    </div>
<?php
@include('Vues/footer.html')
?>