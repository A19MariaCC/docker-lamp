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

  //Modificar la tabla usuarios para añadir el campo de password
  function modificar_tabla_usuarios($conexion){
    $sql = "ALTER TABLE usuarios ADD pass VARCHAR(500) NOT NULL AFTER apellidos";
    if($conexion->query($sql)){
      echo "Tabla usuarios modificada correctamente";
    }else{
      echo "No se ha podido modificar la tabla usuarios".$conexion->error;
    }
    
  }
 
  //Insertar usuarios
  function alta_usuarios($conexion, $nombre, $apellidos, $password, $edad, $provincia){
    $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, apellidos, pass, edad, provincia)
    VALUES(?, ?, ?, ?, ?)");
    $cifrado = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param('sssis',$nombre, $apellidos, $cifrado, $edad, $provincia);
    $stmt->execute() or die($conexion->error);
    $conexion->close();
  }

  //Listar usuarios
  function listar_usuarios($conexion){
    $sql = "SELECT id, nombre, apellidos, pass, edad, provincia FROM usuarios";
    return  $conexion->query($sql);
  
  }
  //Obtener datos de un usuario
  function get_usuario($conexion, $id){
    $sql = "SELECT id, nombre, apellidos,pass, edad, provincia FROM usuarios WHERE id=$id";
    return  $conexion->query($sql);
  
  }
  //Editar usuario
  function editar_usuario($conexion, $id, $nombre,$password, $apellidos,$edad, $provincia) {
    $sql = "UPDATE usuarios SET nombre='$nombre' ,apellidos='$apellidos' ,pass='$password', edad='$edad',provincia='$provincia' WHERE id=$id;";
    return $conexion->query($sql) or die($conexion->error); 
    
  }
  //Eliminar usuario
  function eliminar_usuario( $conexion,$id){
    $sql = "DELETE FROM usuarios where id=$id";
    return $conexion->query($sql) or die($conexion->error);
  
  }

  //Añadir las contraseñas a los usuarios
  function actualizarPass($conexion){
    $sql = "UPDATE usuarios SET pass='abc123' WHERE id=1";
    return $conexion->query($sql) or die($conexion->error);

  }

  // Crea una nueva tabla llamada productos. Sólo una vez, en el caso de que ya esté creada no volver a crearla. 
 function crear_tabla_productos($conexion){
  $sql = "CREATE TABLE IF NOT EXISTS productos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    precio FLOAT(8) NOT NULL,
    unidades FLOAT(8) NOT NULL,
    imagen LONGBLOB
    )";

    
    if($conexion->query($sql)){
      echo "<br/>Tabla productos creada correctamente";
    }else{
      echo "Error creando la tabla".$conexion->error;
    }
    
 }

 //Insertar producto
 function alta_producto($conexion, $nombre, $descripcion, $precio, $unidades, $foto){
  $foto = "archivos/modern-tap-11548791165ou82s36zqx.png";
  $stmt = $conexion->prepare("INSERT INTO productos(nombre, descripcion, precio, unidades, imagen)
  VALUES(?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdds",$nombre, $descripcion, $precio, $unidades, $foto);
  $stmt->execute() or die($conexion->error);
  $stmt->close();
}

  //Cerrar conexión
 function cerrar_conexion($conexion){
    $conexion->close();
  }

  
 



?>