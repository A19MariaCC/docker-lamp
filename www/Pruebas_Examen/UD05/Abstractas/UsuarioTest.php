<?php

require_once 'Usuario.php';

// Crear un usuario
$usuario = new Usuario('1', 'Juan', 'Pérez');
$usuario->accion();
echo "\n";