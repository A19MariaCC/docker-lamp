<?php
//función para validar los datos recibidos en formulario
function test_input($datos){
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}
//función para validar la contraseña recibida por formulario
function validar_clave($clave){
    $error_clave = "''";
    if(strlen($clave)<6){
        $error_clave = "La clave debe tener al menos 6 caracteres";
        return false;
    }
    if(strlen($clave) > 16){
        $error_clave = "La clave no puede tener más de 16 caracteres";
        return false;
     }
    if(!preg_match('`[a-z]`',$clave)){
        $error_clave = "La clave debe tener al menos una letra minúscula";
        return false;
    }
    if(!preg_match('`[A-Z]`',$clave)){
        $error_clave = "La clave debe tener al menos una letra mayúscula";
        return false;
    }
    if(!preg_match('`[0-9]`',$clave)){
        $error_clave = "La clave debe tener al menos un caracter numérico";
        return false;
    }
    return true;
}
?>