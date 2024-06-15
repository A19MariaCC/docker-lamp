<?php

class Participante {
    private $nombre;
    private $edad;

    function __construct($nombre, $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getNombre(){
        return $this->nombre;
    }
    function setEdad($edad){
        $this->edad = $edad;
    }

    function getEdad(){
        return $this->edad;
    }
}





?>