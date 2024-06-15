<?php

require_once 'Jugador.php';

// Crear objetos de Jugador
$jugador1 = new Jugador("Lionel Messi", 34, "Delantero");
$jugador2 = new Jugador("Cristiano Ronaldo", 37, "Delantero");

// Cambiar nombre y edad del jugador 1
$jugador1->setNombre("Neymar Jr");
$jugador1->setEdad(30);
$jugador1->setPosicion("Defensa");

// Mostrar información de los participantes
echo "Información de los jugadores:\n";
echo "Jugador 1: {$jugador1->getNombre()}, {$jugador1->getEdad()}, {$jugador1->getPosicion()}\n";
echo "Jugador 2: {$jugador2->getNombre()}, {$jugador2->getEdad()}, {$jugador2->getPosicion()}\n\n";