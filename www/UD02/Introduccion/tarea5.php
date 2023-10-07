<?php
    /*Escribe un programa que pase de grados Fahrenheit a Celsius. 
    Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, se multiplica por 5 y se divide entre 9. */
    $far = 100.00; //Variable que almacena los grados Fahrenhait
    $cel = ($far - 32)*5/9; //Aplicamos la fórmula para convertir grados Fahrenheit a grados Celsius y lo almacenamos en la variable $cel
    echo "Grados Fahrenheit a Celsius: ".$cel."ºC"."<br/>"; // Mostrar en la página web

    /* Crea un programa en PHP que declare e inicialice dos variables x e y con los valores 20 y 10 respectivamente y muestre la suma, la resta, la multiplicación, 
    la división y el módulo de ambas variables. (Optativo) Haz dos versiones de este ejercicios.

    Guarda los resultados en nuevas variables.
    Sin utilizar variables intermedias.
    */
    $x = 20;
    $y = 10;

    echo "<p>Versión usando variables intermedias</p>";
    // Versión usando variables intermedias
    // Suma
    $suma = $x + $y;
    echo "Operación de suma: ".$suma."<br/>";
    // Resta
    $resta = $x - $y;
    echo "Operación de resta: ".$resta."<br/>";
    // Multiplicación
    $multiplicacion = $x * $y;
    echo "Operación de la multiplicación: ".$multiplicacion."<br/>";
    // División
    $division = $x / $y;
    echo "Operación de la división: ".$division."<br/>";
    // Módulo
    $modulo = $x % $y;
    echo "Operación de módulo: ".$modulo."<br/>";

    echo "<p>Versión sin usar variables intermedias</p>";
    // Versión sin utilizar variables intermedias
    echo "Operación de suma: ".$x + $y."<br/>";
    echo "Operación de resta: ".$x - $y."<br/>";
    echo "Operación de la multiplicación: ".$x * $y."<br/>";
    echo "Operación de la división: ".$x / $y."<br/>";
    echo "Operación de módulo: ".$x % $y."<br/>";

    // Escribe un programa que imprima por pantalla los cuadrados de los 30 primeros números naturales.
    echo "<p>Calcular el cuadrado de los 30 primeros números naturales</p>";

    for ($i=1;$i<=30;$i++) {
    echo "El cuadrado de ".$i." es ".($i*$i)."<br/>";
    }
    /* Hacer un programa php que calcule el área y el perímetro de un rectángulo (área=base*altura y (perímetro=2*base+2*altura). 
    Debéis declarar las variables base=20 y altura=10. */
    echo "<p>Calcular el área de un rectángulo</p>";

    $base=20;
    $altura=10;
    $area = $base*$altura;
    echo "<p>Área de un rectángulo: $area</p>";

    echo "<p>Calcular el perímetro de un rectángulo</p>";
    $perimetro = 2*$base+2*$altura;
    echo "<p>Perímetro de un rectángulo: $perimetro</p>";
?>