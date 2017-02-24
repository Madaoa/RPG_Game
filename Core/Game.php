<?php

class Game
{

    private $_salle = 1;

    public function salle()
    {
        return $this->_salle;
    }
    public function securiteSalle()
    {
        if ($this->_salle  == 1) {
            return true;
        }
    }
// AVANCER OU RECULER DANS LE JEU


    public function evolution()
    {
        $_roll = rand(0, 2);
        if ($_roll != 0 OR securiteSalle() == true) {
            $this->_salle++;
        } else {
            $this->_salle--;
        }
    }

    // FAIRE APPARAITRE UN EVENT

    public function apparitionMonstre()
    {
        $_roll = rand(0, 1);
        if ($_roll != 0) {
            return true;
        }
    }

    public function apparitionCoffre()
    {
        $_roll = rand(0, 1);
        if ($_roll != 0) {
            return true;
        }
    }

    public function apparitionPorte()
    {
        $_roll = rand(2, 4);
        return $_roll;
    }

    // SELECTION
    public function selectMonstre($boss = 0)
    {
       if($boss != 1){
           $_roll= rand(0,1);
           return $_roll;
       }else{
           return 2;
       }
    }
     public function selectArme()
    {
       $_roll= rand(0,1);
       return $_roll;
    }





}

?>