<?php
    require_once "Rectangulo.php";
    require_once "Triangulo.php";

    $triangulo = new Triangulo();
    $triangulo->setColor("verde");
    print $triangulo->describe();
    $rectangulo = new Rectangulo();
    $rectangulo->setColor("naranja");
    print $rectangulo->describe();



?>