<?php

trait CalculosCentroEstudiosTrait{
    public function numeroDeAprobados($notas){
        $aprobados = 0;
        foreach ($notas as $nota) {
            if ($nota >= 5) {
                $aprobados++;
            }
        }
        return $aprobados;
    }

    public function numeroDeSuspensos($notas)
    {
        return count($notas) - $this->numeroDeAprobados($notas);
    }

    public function notaMedia($notas)
    {
        return array_sum($notas) / count($notas);
    }
}



?>