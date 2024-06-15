<?php

require_once "documento.php";

class DVD extends Documento{
    private $numUnidades;
    private $formatoDVD;

    public function __construct($id, $formato, $aniopub, $numUnidades, $formatoDVD){
        parent::__construct($id, $formato, $aniopub);
        $this->numUnidades = $numUnidades;
        $this->formatoDVD = $formatoDVD;
    }

    public function mostrarDatos(){
        echo "Número de DVD's que contiene: $this->numUnidades.<br/>";
		echo "Formato del DVD: $this->formatoDVD.<br/>";
    }
}





?>