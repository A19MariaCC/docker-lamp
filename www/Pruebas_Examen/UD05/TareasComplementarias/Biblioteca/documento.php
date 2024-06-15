<?php

/*
  // La clase documento.

  Los distintos documentos podrán ser de los siguientes formatos: libro, revista y dvd.

  Cada documento estará identificado por un id y el formato de documento que es.
  De los libros además nos interesa el título, nombre del autor, número de páginas y año publicación.
  De las revistas nos interesa número de páginas y año de publicación.
  De los dvd nos interesa: número de dvd's incluídos, año de publicación y formato del dvd.
 */

 class Documento {
    private $id;
    protected $formato;
    private $aniopub;

    public function __construct($id, $formato, $aniopub){
        $this->id = $id;
        $this->formato = $formato;
        $this->aniopub = $aniopub;
        
    }

    public function __destruct(){
        echo "Se ha eliminado un documento!!<br/>";
        
    }

    public function modificarAnio($nuevoAnio){
        $this->aniopub = $nuevoAnio;
    }

    public function mostrarDatos(){
        echo "Información del documento con id: $this->id.<br/>";
        echo "Formato: $this->formato.</br>";
        echo "Año de publicación: $this->aniopub.</br>";
    }

    public function getFormato(){
        return $this->formato;
    }

    public function getId(){
        return $this->id;
    }

 }



?>