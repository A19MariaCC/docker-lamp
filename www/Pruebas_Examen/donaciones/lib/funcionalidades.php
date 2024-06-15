<?php
//función para validar los datos recibidos en formulario
function test_input($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = $datos = htmlspecialchars($datos);
    return $datos;
}




?>