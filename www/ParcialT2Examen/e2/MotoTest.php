<?php

// Incluir la clase Moto
require_once "Moto.php";
$moto = new Moto("Honda", "modelo","arrancada");
echo $moto->arrancar()."<br>";
echo $moto->estadoActual()."<br>";
echo $moto->detener()."<br>";
echo $moto->estadoActual()."<br>";


?>