<?php
require_once 'CalculosCentroEstudios.php';
require_once 'Notas.php';

class NotasDaw extends Notas implements CalculosCentroEstudios{

    public function numeroDeAprobados(){
        $aprobados = 0;
        foreach($this->notas as $nota){
            if($nota >=5){
                $aprobados++;
            }
    }
    return $aprobados;
}

public function numeroDeSuspensos(){
    return count($this->notas) - $this->numeroDeAprobados();
}

public function notaMedia(){
    return array_sum($this->notas) / count($this->notas);
}

public function toString(){
   $listaDeNotas = "";
    foreach ($this->getNotas() as $nota) {
        $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas; 
}
}



?>