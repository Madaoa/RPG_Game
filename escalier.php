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
$jeu = unserialize($_SESSION['jeu']);

$jeu->evolution();

$_SESSION['jeu'] = serialize($jeu);
var_dump($_SESSION);
header('Location: room.php');
?>