<?php
/*Escribir una página web que dados unos segundos (recogidos en un formulario) 
exprese su equivalente en semanas, días, horas, minutos y segundos.
*/

$numero;
if(isset($_POST['numero'])){
    $numero = $_POST['numero'];
   
    
}

if(isset($_POST['enviar'])){
    if(is_numeric($numero)){
        $semanas = (((($numero / 7) / 60) / 60) / 24);
        echo "$numero segundos son: $semanas semanas<br />";
        $dias = ((($numero / 24) / 60) / 60);
        echo "$numero segundos son: $dias días<br />";
        $horas = (($numero /60) /60);
        echo "$numero segundos son: $horas horas<br />";
        $minutos = ($numero / 60);
        echo "$numero segundos son: $minutos minutos<br />";
        $segundos = $numero;
        echo "$numero segundos son $segundos segundos<br />";


    }
}   



?>