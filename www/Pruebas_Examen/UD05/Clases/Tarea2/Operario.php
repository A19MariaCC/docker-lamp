<?php

require_once "Empleado.php";
/* Crea una clase Operario en un fichero Operario.php que sea clase hija de Empleado. 
Con las siguientes características:

Tendrá una propiedad privada “turno”.
*/
class Operario extends Empleado{
    private $turno;

    //Deberá ejecutar el constructor de la clase padre añadiendo la variable turno.
    public function __construct($nombre, $salario, $turno){
        parent::__construct($nombre, $salario);
        $this->setTurno($turno);
    }

    //Crear el setter para turno.  Los valores para esta variable sólo pueden ser "diurno" o "nocturno".
    function setTurno($turno){
        if(strtolower($turno) == strtolower("Diurno")){
            $this->turno = "Diurno";
        }elseif(strtolower($turno) == strtolower("Nocturno")){
            $this->turno = "Nocturno";
        }else{
            return false;
        }
    }
    public function getTurno()
    {
        return $this->turno;
    }
}



?>