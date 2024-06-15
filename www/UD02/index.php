<?php
    echo "Mi primer PHP";
    $datos = ['casa', 'coche', 'gato'];
    foreach($datos as $dato){
        echo $dato.' ';
    }

    $datos2 = [
        'propietario' => 'Antonio',
        'domicilio' => 'Santiago de Compostela',
        'idade' => 45
    ];
    var_dump($datos2);
    
    $array = array(1, 2, 3, 4);

    foreach ($array as $value) {
    echo $value;
    }
?>