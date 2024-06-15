<?php

require_once "Animal.php";

class Perro extends Animal{

    public function emitirSonido(){
        return "!Guau¡ !guau¡";
    }

    /*public function obtenerNombre(){
        parent::obtenerNombre();
        echo "Nombre: $this->nombre";
    }
        */

   
}




?>