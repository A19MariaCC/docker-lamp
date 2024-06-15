<?php

require_once 'Participante.php';

class Arbitro extends Participante
{
    protected $aniosArbitraje;

    public function __construct($nombre, $edad, $aniosArbitraje)
    {
        parent::__construct($nombre, $edad);
        $this->aniosArbitraje = $aniosArbitraje;
    }

    public function getAniosArbitraje()
    {
        return $this->aniosArbitraje;
    }

    public function setAniosArbitraje($aniosArbitraje)
    {
        $this->aniosArbitraje = $aniosArbitraje;
    }
}