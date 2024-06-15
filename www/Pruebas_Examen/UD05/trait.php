<?php

trait Saludo {
    public function saludar(){
        parent::saludar();
        echo "Mundo!";
    }
}

class ClaseBase{
    public function saludar(){
        echo "¡Hola ";
    }

}

class Derivada extends ClaseBase{
    use Saludo;
}

$derivada = new Derivada();
$derivada->saludar();


?>