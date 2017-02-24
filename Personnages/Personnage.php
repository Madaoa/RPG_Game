<?php
class Personnage
{
    public
        $_classe,
        $_attaque,
        $_magie,
        $_defense,
        $_vie;


    // GETTERS //

    public function attaque()
    {
        return $this->_attaque;
    }
    public function classe()
    {
        return $this->_classe;
    }

    public function magie()
    {
        return $this->_magie;
    }

    public function defense()
    {
        return $this->_defense;
    }

    public function vie()
    {
        return $this->_vie;
    }

    public function pasmoinsdezero()
    {
        if ($this->_vie < 0) {
            $this->_vie = 0;
        }
    }
    public function agroPhysique($cible)
    {
        $cible->_vie -= $this->attaque();
        $cible->pasmoinsdezero();
        $_SESSION['personnage'] = serialize($this);
        echo 'Votre '.$this->classe().' attaque physiquement le '.$cible->nom().' ! <br> '.$cible->nom().' subit '.$this->attaque().' points de dégat !';
    }
    public function agroMagique($cible)
    {
        $cible->_vie -= $this->magie();
        $cible->pasmoinsdezero();
        $_SESSION['personnage'] = serialize($this);

        echo 'Votre '.$this->classe().' incante un sort au '.$cible->nom().' ! <br> '.$cible->nom().' subit '.$this->magie().' points de dégat !';

    }

    public function mort()
    {
        if ($this->_vie == 0){
            return true;
        }
    }
}