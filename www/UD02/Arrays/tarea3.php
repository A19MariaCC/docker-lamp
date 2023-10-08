<?php
/* Realice los siguientes pasos:

    Cree una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive). 
    Uso de la función rand. Imprima la matriz creada anteriormente.*/
    $num;
    for($i=0; $i<30; $i++){
        $num[$i] = rand(0,20);
        echo $num[$i]."<br />";
        
    }
    print_r($num);



?>