<?php


abstract class Vehiculo
{
    protected $marca;
    protected $modelo;
    
    public function __construct($marca, $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    abstract protected function arrancar();

    abstract protected function detener();

    abstract protected function estado();

    public function obtenerDescripcion()
    {
        return $this->marca . " " . $this->modelo;
    }

    public function estadoActual()
    {
        return "El " . $this->obtenerDescripcion() . " está actualmente " . $this->estado() . ".";
    }
}
