<?php
require_once('./Arme/arme.php');

class Personnage
{
    public
        $_classe,
        $_attaque,
        $_magie,
        $_defense,
        $_vie,
        $_nomArme = "Aucune",
        $_dmgArme = 0;


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
    public function nomArme()
    {
        return $this->_nomArme;
    }
    public function dmgArme()
    {
        return $this->_dmgArme;
    }


    public function equip_dmgArme($arme)
    {

        // CAS MAGICIEN

        if ($this->classe() == "Magicien"){
            if ($this->_dmgArme < $arme->bonusMagique())
                {
                    $this->_nomArme = $arme->nom();
                    $this->_dmgArme = $arme->bonusMagique();
                    echo 'Vous équipez '.$arme->nom(). ' !';
                }
            else if ($this->_dmgArme == $arme->bonusMagique())
            {
                echo 'Vous équipez déjà '.$this->_nomArme.' !';
            }
            else{
                echo 'Cette arme ne vous est pas utile !';

            }
        }

        // CAS GUERRIER

        else if ($this->classe() == "Guerrier"){
            if ($this->_dmgArme < $arme->bonusAttaque())
                {
                    $this->_nomArme = $arme->nom();
                    $this->_dmgArme = $arme->bonusAttaque();
                    echo 'Vous équipez '.$arme->nom(). ' !';
                }
            else if ($this->_dmgArme == $arme->bonusAttaque())
            {
                echo 'Vous équipez déjà '.$this->_nomArme.' !';
            }
            else{
                echo 'Cette arme ne vous est pas utile !';

            }
        }
        // CAS PALADIN
        else if ($this->classe() == "Paladin"){
            if ($this->_dmgArme < $arme->bonusAttaque() OR $this->_dmgArme < $arme->bonusMagique())

            {
                if($arme->bonusMagique() >= $arme->bonusAttaque()) {
                    $bonus = $arme->bonusMagique();
                }else{
                    $bonus = $arme->bonusAttaque();

                }
                $this->_nomArme = $arme->nom();
                $this->_dmgArme = $bonus;
                echo 'Vous équipez '.$arme->nom(). ' !';
            }
            else if ($this->_dmgArme == $arme->bonusMagique() OR $this->_dmgArme == $arme->bonusAttaque() )
            {
                echo 'Vous équipez déjà '.$this->_nomArme.' !';
            }
            else{
                echo 'Cette arme ne vous est pas utile !';

            }
        }

        }




    public function pasmoinsdezero()
    {
        if ($this->_vie < 0) {
            $this->_vie = 0;
        }
    }
    public function agroPhysique($cible)
    {
        $cible->_vie -= $this->attaque() + $this->_dmgArme;
        $cible->pasmoinsdezero();
        echo 'Votre '.$this->classe().' attaque physiquement le '.$cible->nom().' ! <br> '.$cible->nom().' subit '.$this->attaque().' + ('.$this->_dmgArme.') points de dégat !';
    }
    public function agroMagique($cible)
    {
        $cible->_vie -= $this->magie() + $this->_dmgArme;
        $cible->pasmoinsdezero();
        echo 'Votre '.$this->classe().' incante un sort sur le '.$cible->nom().' ! <br> '.$cible->nom().' subit '.$this->magie().' + ('.$this->_dmgArme.') points de dégat !';

    }

    public function mort()
    {
        if ($this->_vie == 0){
            return true;
        }
    }
}