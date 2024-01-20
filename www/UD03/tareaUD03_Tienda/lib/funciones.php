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

    function comprobar_usuario($conexion, $nombre, $pass){
        $sql = "SELECT nombre, pass FROM usuarios WHERE nombre='$nombre'";
        $resultados = $conexion->query($sql) or die($conexion->error);

        $usuario_bd = mysqli_fetch_assoc($resultados);

        if($usuario_bd && password_verify($pass, $usuario_bd['pass'])){
           $usuario['nombre']=$nombre;
           //$usuario['rol']=0;
           return $usuario;
        }else return false;
      
      }


?>