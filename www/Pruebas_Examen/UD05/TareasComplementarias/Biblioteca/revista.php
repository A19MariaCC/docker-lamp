<?php

require_once "documento.php";

class Revista extends Documento{
    private $titulo;
    private $numPaginas;
    

    public function __construct($id, $formato, $aniopub, $titulo, $numPaginas){
        parent::__construct($id, $formato, $aniopub);
        $this->titulo = $titulo;
        $this->numPaginas = $numPaginas;
    }

    public function mostrarDatos(){
        parent::mostrarDatos();
        echo "Otro formato: $this->formato.<br/>";
        echo "Título: $this->titulo.<br/>";
        echo "Número de páginas: $this->numPaginas.<br/>";
        
    }
}



?>