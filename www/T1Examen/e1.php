<?php
function isPar($pares){
    $resultado = [];
    for($i=0; $i<count($pares); $i++){
        for($j=0; $j<count($resultado); $j++){
            if($pares[$i]%2 == 0){
                return $resultado[$j] = true;
            }else{
                return $resultado[$j] = false;
            }
        }
        
    }
    return $resultado;
}
isPar(2, 7, 22, "verdadero");
function isImpar($pares){
    $resultado = [];
    for($i=0; $i<count($pares); $i++){
        for($j=0; $j<count($resultado); $j++){
            if($pares[$i]%2 != 0){
                $resultado[$j] = true;
            }else{
                $resultado[$j] = false;
            }
        }
        
    }
}

?>