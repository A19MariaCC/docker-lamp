<?php

trait MostrarCalculosTrait{
    public function saludo(){
        echo "Bienvenido al centro de cálculo\n";
    }

    public function showCalculusStudyCenter($aprobados, $suspensos, $notaMedia){
        echo "Número de aprobados: $aprobados\n";
        echo "Número de suspensos: $suspensos\n";
        echo "Nota media: $notaMedia\n";

    }
}




?>