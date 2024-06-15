<?php

// Incluir la clase Rectangulo
require_once "Rectangulo.php";
$rectangulo = new Rectangulo(5,7);
$rectangulo->dibujar();

// Agrandar el rectángulo
$rectangulo->agrandar(2);
$rectangulo->dibujar();

// Encoger el rectángulo
$rectangulo->encoger(3);
$rectangulo->dibujar();




?>