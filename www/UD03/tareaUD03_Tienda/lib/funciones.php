<?php
  //Validación de datos formulario
  function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}
    //Validación formato de imagen 
    function compruebaExtension($archivo){
        if($archivo != "jpg" && $archivo != "png" && $archivo != "jpeg" && $archivo != "gif") {
            return false;
        } else {
            return true;
            }
    }
    //Validación de tamaño de archivo
    function comprobaTamanho($archivo){
        if($archivo <5000000) {
            return true;
        } else {
            return false;
        }
    }


?>