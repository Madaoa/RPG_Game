<?php


class Arme {

    public $_nom,
            $_puissance,


    public function puissance() {
        return $this->_puissance;
    }

    public function attack() {
        $this->causerDegat();
    }

}


?>



