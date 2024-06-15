<?php

abstract class Figura{
    abstract protected function getColor();
    abstract protected function setColor($color);

    public function describe() {
        return sprintf("Hola, soy un %s %s\n", $this->getColor(), get_class($this));
    }
}




?>