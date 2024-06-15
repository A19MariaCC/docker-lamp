<?php
require "e1.php";
$pares = [1, 5,4, 10];
function imprimirArray($array){
    print "======================================= <br>";
    foreach($array as $key => $value){
        echo var_dump($value);
    }
    print "======================================= <br>";
}

imprimirArray($pares);
imprimirArray(isPar($pares));
imprimirArray(isImpar($pares));



?>