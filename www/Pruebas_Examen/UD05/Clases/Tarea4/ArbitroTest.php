<?php

require_once 'Arbitro.php';

// Crear objetos de Árbitro
$arbitro1 = new Arbitro("Howard Webb", 50, 20);
$arbitro2 = new Arbitro("Pierluigi Collina", 62, 30);

// Cambiar años de arbitraje del árbitro 2
$arbitro2->setAniosArbitraje(35);

echo "Información de los árbitros:\n";
echo "Árbitro 1: {$arbitro1->getNombre()}, {$arbitro1->getEdad()}, {$arbitro1->getAniosArbitraje()} años arbitraje\n";
echo "Árbitro 2: {$arbitro2->getNombre()}, {$arbitro2->getEdad()}, {$arbitro2->getAniosArbitraje()} años arbitraje\n";