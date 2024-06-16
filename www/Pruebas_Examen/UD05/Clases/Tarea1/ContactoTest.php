<?php

require_once "contacto.php";
$contactoSabela = new Contacto("Sabela", "Sobrino", 670081458);
$contactoIvan = new Contacto("Ivan", "Gomez", 650971459);
$contactoAlberto = new Contacto("Alberto", "García", 673962456);

echo "Se muestran los valores del objeto 1: <br>\n";
echo $contactoSabela -> get_name() . "<br>\n";
echo $contactoSabela -> get_apellido() . "<br>\n";
echo $contactoSabela -> get_NumTelefono() . "<br>\n";

$contactoSabela-> muestraInformacion();

echo "Se muestran los valores del objeto 2: <br>\n";
echo $contactoIvan -> get_name() . "<br>\n";
echo $contactoIvan -> get_apellido() . "<br>\n";
echo $contactoIvan -> get_NumTelefono() . "<br>\n";

$contactoIvan-> muestraInformacion();

echo "Se muestran los valores del objeto 3: <br>\n";
echo $contactoAlberto -> get_name() . "<br>\n";
echo $contactoAlberto -> get_apellido(). "<br>\n";
echo $contactoAlberto -> get_NumTelefono() . "<br>\n";
$contactoAlberto-> muestraInformacion();

?>