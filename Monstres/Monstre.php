<?php

class Monstre
{

    public $_id,
        $_nom,
        $_attaque,
        $_vie;

    public function id(){
        return $this->_id;
    }
    public function nom(){
        return $this->_nom;
    }
    public function attaque(){
        return $this->_attaque;
    }
    public function vie(){
        return $this->_vie;
    }

    public function pasmoinsdezero()
    {
        if ($this->vie() < 0) {
            $this->_vie = 0;
        }
    }
    public function agro($cible)
    {
        $degats = $this->attaque() - $cible->defense();
        $cible->_vie -= $degats;
        $cible->pasmoinsdezero();
        echo 'Le '.$this->nom().' frappe '.$cible->classe().' ! <br> '.$cible->classe().' subit '.$this->attaque().' points de dégat !';

    }
    public function degats($degats)
    {
        $this->_vie -= $degats;
    }
    public function mort()
    {
        if ($this->_vie == 0){
            return true;
        }
    }
}
?>