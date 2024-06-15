<?php
class Constantes{
    const MENSAJE_SALIDA = "Adiós, nos veremos pronto";

    public function message(){
        echo self::MENSAJE_SALIDA;
    }
}

echo Constantes::MENSAJE_SALIDA;
$constante = new Constantes();
$constante->message();
?>