<?php
require_once('Personnage.php');

class Magicien extends Personnage
{
    public
        $_classe = 'Magicien',
        $_attaque = 0,
        $_defense = 1000,
        $_magie = 5000,
        $_vie = 5000;

//    // GETTERS //
//
//    public function attaque()
//    {
//        return $this->_attaque;
//    }
//    public function classe()
//    {
//        return $this->_classe;
//    }
//
//    public function magie()
//    {
//        return $this->_magie;
//    }
//
//    public function defense()
//    {
//        return $this->_defense;
//    }
//
//    public function vie()
//    {
//        return $this->_vie;
//    }
//
//    public function pasmoinsdezero()
//    {
//        if ($this->_vie < 0) {
//            $this->_vie = 0;
//        }
//    }
//
//    public function agroPhysique($cible)
//    {
//        $cible->degats($this->attaque());
//        echo 'Votre '.$this->classe().' attaque physiquement le '.$cible->nom().' ! <br> '.$cible->nom().' subit '.$this->attaque().' points de dégat !';
//    }
//    public function agroMagique($cible)
//    {
//        $cible->_vie -= $this->magie();
//        $cible->pasmoinsdezero();
//        echo 'Votre '.$this->classe().' incante un sort au '.$cible->nom().' ! <br> '.$cible->nom().' subit '.$this->magie().' points de dégat !';
//
//    }
//    public function mort()
//    {
//        $this->vie() <= 0;
//    }

}