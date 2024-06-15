<?php
    class Alien{
        private $nombre;
        public static $numberOfAliens = 0;

        function __construct($nombre){
            $this->nombre = $nombre;
            self::$numberOfAliens++;
        }

        public function setNombre($nombre) {
            $this->nombre=$nombre;  
        }
        public function getNombre(){
            return $this->nombre;
        }

        public static function getNumberOfAliens(){
            return self::$numberOfAliens;
        }
    }



?>