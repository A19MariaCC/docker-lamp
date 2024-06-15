<?php
    class Empleado {

        //PROPIEDADES
        public $nombre;
        public $salario;
        public static $numEmpleados = 0;
    
        //MÉTODOS
        public function setNombre($nombre) {
            $this->nombre=$nombre;  
        }
        public function getNombre(){
            return $this->nombre;
        }

        //El construtor de la clase empleado asignará un salario de entrada y un nombre, que se pasarán como argumentos. 
        //El salario de entrada no podrá superar los 2000 euros.
        public function __construct($nombre, $salario){
            $this->nombre = $nombre;
            //Cada vez que se cree un empleado se debe aumentar la variable $numEmpleados.
            self::$numEmpleados++;

            if($salario <=2000){
                $this->salario = $salario;
            }else{
                $this->salario = 2000;
            }
        }
        //Crea un método getSalario() que devuelva el salario del objecto que lo llame.
        public function getSalario(){
            return $this->salario;
        }

        public static function getNumEmpleados(){
            return self::$numEmpleados;
        }
    }


?>