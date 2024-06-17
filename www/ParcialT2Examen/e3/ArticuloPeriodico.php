<?php

require_once "Articulo.php";
class ArticuloPeriodico extends Articulo{


    public function imprimirEnTabla(){
        echo "<table>";
        echo "<tr><td>Periódico- ".$this->getTitulo()."</td>";
        echo "<tr><td>".$this->getContenido()."</td>";
        echo "<tr><td>".$this->getAutor()."</td>";
        echo "</tr>";
        echo "</table>";

    }

    public function imprimirEnLista(){
        echo "<ul>";
        echo "<li>Periódico- ".$this->getTitulo()."</li>";
        echo "<li>".$this->getContenido()."</li>";
        echo "<li>".$this->getAutor()."</li>";
        echo "</ul>";
    }

}




?>