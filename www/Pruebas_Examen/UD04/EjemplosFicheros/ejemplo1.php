<?php

//Función readfile
//echo readfile("diccionario.txt");

$fichero = fopen("diccionario.txt", "r") or die("Imposible abrir el fichero!");
echo fread($fichero, filesize("diccionario.txt"));
fclose($fichero);




?>