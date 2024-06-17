<?php

require_once "Vehiculo.php";

class Coche extends Vehiculo{
    private $estado;

    public function __construct($marca, $modelo, $estado){
        parent::__construct($marca, $modelo);
        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    public function arrancar(){
        return $this->estado = "Arrancado";
    }

    public function detener(){
        return $this->estado = "Parado";
    }

    public function estado(){
        return $this->estado;
    }
    
}





?>