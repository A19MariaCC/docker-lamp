<?php

class Fruit {

    //Atributos
    private $name;
    private $color;
    private $peso;

    //Constructores
    function __construct($name){
        $this->name = $name;
    }


    //Métodos
    function set_name($name){
        $this->name = $name;
    }

    function get_name(){
        return $this->name;
    }

    protected function intro(){
        echo "El nombre de la fruta es: ".$this->name;
    }

}

class Fresa extends Fruit{
    public $precio;

    public function __construct($name, $precio){
        $this->name = $name;
        $this->precio = $precio;
    }
 
    function message(){
        echo "Soy una fruta o soy una fresa?";
        echo "El precio:".$this->precio;
        $this->intro();
    }

}

$fresa = new Fresa("fresa", 30);
$fresa->message();
//$fresa->intro();


$apple = new Fruit("Manzana");
//$apple->set_name("Manzana");


$banana = new Fruit("Banana");
//$banana->set_name("Banana");

echo $apple->get_name();
echo $banana->get_name();


?>


