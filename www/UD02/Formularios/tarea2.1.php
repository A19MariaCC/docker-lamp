<?php
    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
 * Nombre: `xxxxxxxxx`
 * Apellidos: `xxxxxxxxx`
 * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
 * Su nombre tiene caracteres `X`.
 * Los 3 primeros caracteres de tu nombre son: `xxx`
 * La letra A fue encontrada en sus apellidos en la posición: `X`
 * Tu nombre en mayúsculas es: `XXXXXXXXX`
 * Sus apellidos en minúsculas son: `xxxxxx`
 * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
 * Tu nombre escrito al revés es: `xxxxxx`
*/

if(isset($_POST['nombre']) && (isset($_POST['apellidos']))){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
}

if(isset($_POST['enviar'])){
    echo "Nombre: ".$nombre."<br />";
    echo "Apellidos: ".$apellidos."<br />";
    echo "Nombre y apellidos: $nombre $apellidos"."<br />";
    echo "Su nombre tiene caracteres ".mb_strlen($nombre)."<br />";
    echo "Los 3 primeros caracteres de tu nombre son: ".substr($nombre,0,3)."<br />";
    echo "La letra A fue encontrada en sus apellidos en la posición: ".strpos($apellidos,'A')."<br />";
    echo "Tu nombre en mayúsculas es: ".strtoupper($nombre)."<br />";
    echo "Sus apellidos en minúsculas son: ".strtolower($apellidos)."<br />";
    echo "Su nombre y apellido en mayúsculas: ".strtoupper($nombre)." ".strtoupper($apellidos)."<br />";
    echo "Tu nombre escrito al revés es: ".strrev($nombre)."<br />";
}   
?>