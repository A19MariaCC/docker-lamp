<?php

// Incluir la clase Coche
require_once "ArticuloRevista.php";
require_once "ArticuloPeriodico.php";

$revista = new ArticuloRevista("Casa Diez", "Decoración","Desconocido");
echo $revista->imprimirEnTabla();
echo $revista->imprimirEnLista();

$periodico = new ArticuloPeriodico("Cinco Días", "Economía","Desconocido");
echo $periodico->imprimirEnTabla();
echo $periodico->imprimirEnLista();




?>