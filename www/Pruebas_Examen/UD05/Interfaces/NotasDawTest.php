<?php

require_once 'NotasDaw.php';

// Crear objeto de la clase NotasDaw
$notas_daw = new NotasDaw([7, 8, 5, 4, 6]);

// Mostrar resultados
echo "Lista de notas: " . $notas_daw->toString() . "\n";
echo "Número de aprobados: " . $notas_daw->numeroDeAprobados() . "\n";
echo "Número de suspensos: " . $notas_daw->numeroDeSuspensos() . "\n";
echo "Nota media: " . $notas_daw->notaMedia() . "\n";