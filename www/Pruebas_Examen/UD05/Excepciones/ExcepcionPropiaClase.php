<?php
    require_once 'ExcepcionPropia.php';

    class ExcepcionPropiaClase{
        public static function testNumber($num){
            if($num === 0){
                throw new ExcepcionPropia("El número no puede ser cero");
            }
        }
    }




?>