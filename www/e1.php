<?php
function isPar($pares){
    $resultado = array();
    for($i=0; $i<count($pares); $i++){
            if(is_integer($pares[$i]) && $pares[$i]%2 == 0){
                 $resultado[$i] = "true";
            }else{
                $resultado[$i] = "false";
            }
        }
    return print_r($resultado);
}

function isImpar($pares){
    $resultado = array();
    for($i=0; $i<count($pares); $i++){
            if(is_integer($pares[$i]) && $pares[$i]%2 != 0){
                $resultado[$i] = "true";
            }else{
                $resultado[$i] = "false";
            }
        }
        
    return print_r($resultado);
}

?>