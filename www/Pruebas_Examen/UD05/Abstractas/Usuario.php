<?php
require_once "Persona.php";

class Usuario extends Persona{


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    public function accion(){
        echo "Soy el usuario {$this->nombre} {$this->apellidos}";
    }

}




?>