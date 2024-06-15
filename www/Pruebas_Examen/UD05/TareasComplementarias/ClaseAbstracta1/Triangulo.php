<?php

require_once "Figura.php";

class Triangulo extends Figura{

    private $color = null;

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
    }
}



?>