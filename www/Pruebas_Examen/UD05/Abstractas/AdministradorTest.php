<?php

require_once 'Administrador.php';

// Crear un administrador
$administrador = new Administrador('2', 'María', 'González');
$administrador->accion();
echo "\n";