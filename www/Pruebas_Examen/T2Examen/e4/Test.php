<?php

require_once 'Perro.php';
require_once 'Gato.php';

// Crear una instancia de Perro y probar los métodos
$miPerro = new Perro("Fido", 3);
echo "Nombre: " . $miPerro->obtenerNombre() . "\n";
echo "Sonido: " . $miPerro->emitirSonido() . "\n";
echo "Edad: " . $miPerro->getEdad() . " años\n";

// Crear una instancia de Gato y probar los métodos
$miGato = new Gato("Lupi", 2);
echo "Nombre: " . $miGato->obtenerNombre() . "\n";
echo "Sonido: " . $miGato->emitirSonido() . "\n";
echo "Edad: " . $miGato->getEdad() . " años\n";