<?php

require_once "Mascota.php";

abstract class Animal implements Mascota{
    protected $nombre;
    protected $edad;

    public function __construct($nombre, $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;  
    }
  

    public function obtenerNombre(){
        return $this->nombre;
    }

    public function getEdad(){
        return $this->edad;
    }

    abstract public function emitirSonido();



}



?>