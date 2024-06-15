<?php

    abstract class ClasePadre{
        public $nombre;
        public function __construct($nombre){
            $this->nombre = $nombre;
        }
        
        abstract public function message2() : string;
    }
    
    class ClaseHija1 extends ClasePadre{
        public function message2() : string{


            return "Hola, soy la clase hija1". $this->nombre;
        }
    }

    class ClaseHija2 extends ClasePadre{
        public function message2() : string{


            return "Hola, soy la clase hija2". $this->nombre;;
        }
    }

    $claseHija = new ClaseHija1("HijaNum1");
    echo $claseHija->message2();
    $claseHija2 = new ClaseHija2("HijaNum2");
    echo $claseHija2->message2();



?>