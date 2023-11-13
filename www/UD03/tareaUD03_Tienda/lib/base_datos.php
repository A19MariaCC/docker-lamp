<?php
 function get_conexion(){
    $conexion = new mysqli('db', 'root', 'test');
    //2. Comprobar la conexión
    if($conexion->connect_errno !=null){
        die("Fallo en la conexión: ".$conexion->connect_error."Con numero". $conexion->connect_errno);
    }
    return $conexion;
  }


    //Crear base de datos
  function crear_bd_tienda($conexion){
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    if($conexion->query($sql)){
        echo "Base de datos creada correctamente";
    }else{
        echo "Error creando la base de datos".$conexion->error;
    }
}
  //Seleccionar base de datos
  function select_db_tienda($conexion){
    $conexion->select_db('tienda');
  }

  //Crear tabla usuario
  function crear_tabla_usuario($conexion){
    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    edad INT NOT NULL,
    provincia VARCHAR(50)
    )";

    if($conexion->query($sql)){
      echo "Tabla creada correctamente";
    }else{
      echo "Error creando la tabla".$conexion->error;
    }
  }

  function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

  //Insertar usuarios
  function alta_usuarios($conexion, $nombre, $apellidos, $edad, $provincia){
    $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, apellidos, edad, provincia)
    VALUES(?, ?, ?, ?)");
    $stmt->bind_param('ssis',$nombre, $apellidos, $edad, $provincia);
    $stmt->execute() or die($conexion->error);
    $conexion->close();
  }
  //Listar usuarios
  function listar_usuarios($conexion){
    $sql = "SELECT id, nombre, apellidos,edad, provincia FROM usuarios";
    return  $conexion->query($sql);
  
  }
  //Cerrar conexión
 function cerrar_conexion($conexion){
    $conexion->close();
  }



?>