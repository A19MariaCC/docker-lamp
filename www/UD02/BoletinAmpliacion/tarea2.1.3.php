<?php
    /*Indica cuál sería la salida del siguiente programa:
    $n = 5;
    $t = ++$n * --$n;
    echo “n = $n, t = $t\n”;
    printf(“%d %d %d”, ++$n, ++$n, ++$n);
    */
    $n = 5;
    $t = ++$n * --$n; 
    echo "n = $n, t = $t\n"; //Aquí $n la imprime a 5 y después la incrementa y $t es igual a 30, el incremento de $n en 1, 
    //es decir 6 x el decremento de $n, es decir, 5
    printf("%d %d %d", ++$n, ++$n, ++$n); //$n vale 6, 7 y 8




?>