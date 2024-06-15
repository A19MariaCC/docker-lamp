<?php
//Interfaz
    interface Animal{
        public function hacerSonido();
    }
//Clase que implementa la interfaz
    class Gato implements Animal{
        public function hacerSonido(){
            echo "Meow";
        }
    }

    //Variable
    $gato = new Gato();
    $gato->hacerSonido();


?>