<?php

require_once "Figura.php";

use e3\Figura;
class Rectangulo extends Figura{

    // Debe tener dos atributos privados, ancho y alto.

    private $ancho;
    private $alto;

    //Un constructor que permita construir objetos cambiando ancho y alto
    public function __construct($ancho, $alto){
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function dibujar(){
        echo "Dibujando un rectángulo de ancho: $this->ancho y alto: $this->alto<br>";
    }
    //El método agrandar multiplica alto y ancho por el factor indicado.
    public function agrandar($factor){
        $this->ancho*=$factor;
        $this->alto*=$factor;
    }
    //El método encoger divide el ancho y el alto por el factor indicado.
    public function encoger($factor){
        $this->ancho/=$factor;
        $this->alto/=$factor;
    }
}


?>