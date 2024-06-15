<?php

require_once "Animal.php";

class Gato extends Animal{

    public function emitirSonido(){
        return "¡Miau!, ¡miau!";
    }

    /*public function obtenerNombre(){
        parent::obtenerNombre();
        echo "Nombre: $this->nombre";
    }
        */
}