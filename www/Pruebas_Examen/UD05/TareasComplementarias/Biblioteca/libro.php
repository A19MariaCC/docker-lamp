<?php
require_once "documento.php";

class Libro extends Documento{
    private $titulo;
    private $autor;
    private $numPaginas;


    public function __construct($id, $formato, $aniopub, $titulo, $autor,$numPaginas){
        parent::__construct($id, $formato, $aniopub);
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->numPaginas = $numPaginas;
    }

    public function mostrarDatos(){
        parent::mostrarDatos();
        // Si ponemos los atributos de documento como privados no heredaremos esos atributos 
        // y no podremos poner echo "Valor de atributo Formato: $this->formato"; 
		// Ya que no conoce ese atributo.
		// Si lo ponemos como public si, y como protected también.
        echo "Otro formato: $this->formato.<br/>";
        echo "Título del libro: $this->titulo.<br/>";
        echo "Autor: $this->autor.<br/>";
        echo "Número de páginas: $this->numPaginas<br/>";
        
    }
    

}



?>