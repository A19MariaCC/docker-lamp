<?php

require_once 'CalculosCentroEstudiosTrait.php';
require_once 'MostrarCalculosTrait.php';

class NotasTrait{
    use CalculosCentroEstudiosTrait;
    use MostrarCalculosTrait;

    private $notas;

    public function __construct($notas){
        $this->notas = $notas;
    }

    public function calcularYMostrar()
    {
        $aprobados = $this->numeroDeAprobados($this->notas);
        $suspensos = $this->numeroDeSuspensos($this->notas);
        $notaMedia = $this->notaMedia($this->notas);

        $this->saludo();
        $this->showCalculusStudyCenter($aprobados, $suspensos, $notaMedia);
    }

}

?>