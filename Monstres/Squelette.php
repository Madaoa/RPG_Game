<?php
require_once('Monstre.php');

class Squelette extends Monstre
{

    public $_id = 0,
        $_nom = 'Squelette',
        $_vie = 5000,
        $_attaque = 1250;

//    public function id(){
//        return $this->_id;
//    }
//    public function nom(){
//        return $this->_nom;
//    }
//    public function attaque(){
//        return $this->_attaque;
//    }
//    public function vie(){
//        return $this->_vie;
//    }
//    public function mort()
//    {
//        $this->vie() <= 0;
//    }
//    public function pasmoinsdezero()
//    {
//        if ($this->vie() < 0) {
//            $this->_vie = 0;
//        }
//    }
//
//    public function agro($cible)
//    {
//        $degats = $this->attaque() - $cible->defense();
//        $cible->_vie -= $degats;
//        $cible->pasmoinsdezero();
//        echo 'Le '.$this->nom().' frappe '.$cible->classe().' ! <br> '.$cible->classe().' subit '.$this->attaque().' points de dégat !';
//
//    }

}



?>