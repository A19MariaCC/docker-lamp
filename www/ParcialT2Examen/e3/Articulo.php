<?php
require_once 'Imprimible.php';

class Articulo implements Imprimible{

    private $titulo;
    private $contenido;
    private $autor;

    public function __construct($titulo, $contenido, $autor){
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->autor = $autor;
    }


        public function getTitulo()
        {
            return $this->titulo;
        }
    
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }
    
        public function getContenido()
        {
            return $this->contenido;
        }
    
        public function setContenido($contenido)
        {
            $this->contenido = $contenido;
        }
    
        public function getAUtor()
        {
            return $this->autor;
        }
    
        public function setAutor($autor)
        {
            $this->autor = $autor;
        }

        public function imprimirEnTabla(){
            echo "<table>";
            echo "<tr><td>".$this->titulo."</td>";
            echo "<tr><td>".$this->contenido."</td>";
            echo "<tr><td>".$this->autor."</td>";
            echo "</tr>";
            echo "</table>";

        }

        public function imprimirEnLista(){
            echo "<ul>";
            echo "<li>".$this->titulo."</li>";
            echo "<li>".$this->contenido."</li>";
            echo "<li>".$this->autor."</li>";
            echo "</ul>";
        }
    }


