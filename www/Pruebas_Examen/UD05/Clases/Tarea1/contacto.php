<?php
/*Crea una clase Contacto en un fichero Contacto.php, 
con las siguientes propiedades privadas: nombre, apellido y número de teléfono.
*/
    class Contacto {
    //Atributos
    private $nombre;
    private $apellido;
    private $numTelefono;

    //Define un constructor con 3 argumentos, que asigne los valores a las propiedades.
    //Constructores
    function __construct($nombre, $apellido, $numTelefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numTelefono = $numTelefono;
    }
   //Genera los getters y los setters para todas las propiedades 
     //GETTERS Y SETTERS
     function set_name($nombre){
        $this->nombre = $nombre;
    }

    function get_name(){
        return $this->nombre;
    }

    function set_apellidos($apellido){
        $this->apellido = $apellido;
    }

    function get_apellido(){
        return $this->apellido;
    }

    function set_numTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }

    function get_numTelefono(){
        return $this->numTelefono;
    }

    //y el método muestraInformacion() que imprima los valores de las propiedades.
    function muestraInformacion(){
        echo "Nombre: ".$this->nombre."<br/>
        Apellido: ".$this->apellido."<br/>
        Número de teléfono: ".$this->numTelefono."<br/>";

    }

    //Agrega un método __destruct() a la clase, que muestra en pantalla el objeto que se está destruyendo.
    function __destruct(){
        echo "<p>Se destruye el objeto de nombre ".$this->nombre. ", apellido  ".$this->apellido." y cuyo número de teléfono es ".$this->numTelefono."</p>";
    }


    }



?>