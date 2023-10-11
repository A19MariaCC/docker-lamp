<?php
/* Indica cuál sería la salida del siguiente programa:

    - $m = 99;
    - $n = ++$m;
    - echo “m = $m, n = $n\n”;
    - $n = $m++;
    - echo “m = $m, n = $n\n”;
    - printf(“m = %d \n”, $m++); // printf é unha func. de C para imprimir que se pode empregar en PHP.
    - printf(“m = %d \n”,++$m);

    */

    $m = 99;
    $n = ++$m;
    echo "m = $m, n = $n.<br />"; //La variable $m vale 100 y la variable $n vale también 100 porque hemos incrementado en 1 $m
    $n = $m++; //Incrementamos la variable $m en 1, por tanto $m vale 101 y $n sigue valiendo 100 porque primero la imprime y luego la incrementa
    echo "m = $m, n = $n.<br />"; 
    printf("m = %d \n", $m++); // Aquí $m sigue valiendo 101 porque primero la imprime y después la incrementa
    printf("m = %d \n",++$m); // Aquí $m vale 103 porque le suma el incremento anterior y el actual y en este caso primero la incrementa, es decir 103
    // y después la imprime
?>