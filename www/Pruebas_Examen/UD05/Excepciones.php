<?php
    function inverso($x){
        if(!$x){
            throw new Exception("División por cero");
        }
        return 1/$x;
    }

    try{
        echo inverso(5);
        echo inverso(0);
    }catch(Exception $e){
        echo "Excepción capturada ".$e->getMessage();

    }
    



?>