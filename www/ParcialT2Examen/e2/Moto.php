<?php

require_once "Vehiculo.php";

class Moto extends Vehiculo{
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
        return $this->estado = "Arrancada";
    }

    public function detener(){
        return $this->estado = "Parada";
    }

    public function estado(){
        return $this->estado;
    }
    
}





?>