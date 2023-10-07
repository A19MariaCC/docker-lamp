<?php
    //Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea.
    $numeros = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; //Almacenamos los 10 primeros números pares en un array
    foreach($numeros as $numero){ //recorremos el array
        echo $numero."<br />"; //imprimimos cada número en una línea
    }

    /*Imprime los valores del array asociativo siguiente usando un foreach:
        $v[1]=90;
        $v[10] = 200;
        $v[‘hola’]=43;
        $v[9]=’e’;
        */
        echo "<p>Imprimir valores del array asociativo con un foreach</p>";
        $v[1]=90;
        $v[10] = 200;
        $v['hola']=43;
        $v[9]='e';
        foreach($v as $key => $valor){
            echo $valor."<br />";
        }



?>