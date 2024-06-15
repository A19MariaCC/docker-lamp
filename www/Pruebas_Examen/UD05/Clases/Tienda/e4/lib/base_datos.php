<?php

function get_conexion(){
    $conexion = new mysqli('db', 'root', 'test');
  
    if ($conexion->connect_errno != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $conexion->connect_errno);
    }

    //Primer error
    return $conexion;
}

function seleccionar_bd_tienda($conexion){
    //Segundo error
    return $conexion->select_db("tienda");
}

function ejecutar_consulta($conexion, $sql)
{
    $resultado = $conexion->query($sql);

    if ($resultado == false) {
        die($conexion->error);
    }

    return $resultado;
}

function crear_bd_tienda($conexion)
{
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_usuarios($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
          id INT(6) AUTO_INCREMENT PRIMARY KEY , 
          nombre VARCHAR(50) NOT NULL , 
          pass VARCHAR(100) NOT NULL,
          apellidos VARCHAR(100) NOT NULL ,
          edad INT (3) NOT NULL ,
          provincia VARCHAR(50) NOT NULL
          )";

    ejecutar_consulta($conexion, $sql);
}

function listar_usuarios($conexion)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}
 
function get_usuario($conexion, $id)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function editar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia)
{
    $sql = "UPDATE usuarios
            SET nombre='$nombre' ,apellidos='$apellidos' ,edad='$edad',provincia='$provincia'
            WHERE id=$id;";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}


function dar_alta_usuario($conexion, $nombre, $password, $apellidos, $edad, $provincia)
{
    $hasheado = password_hash($password,PASSWORD_DEFAULT);
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre,pass,apellidos,edad,provincia) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss", $nombre, $hasheado, $apellidos, $edad, $provincia);
    return $sql->execute() or die($conexion->error);
}

function borrar_usuario($conexion, $id)
{
    $sql = "DELETE FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

/**
 * Crea una nueva tabla llamada productos. Sólo una vez, en el caso de que ya esté creada no volver a crearla. 
 */
function crear_tabla_productos($conexion){
    $sql = "CREATE TABLE IF NOT EXISTS productos (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    precio FLOAT(8) NOT NULL,
    unidades FLOAT(8) NOT NULL,
    foto LONGBLOB)";

    ejecutar_consulta($conexion, $sql);

}

function altaProducto($conexion, $nombre, $descripcion, $precio, $unidades, $foto){
    $stmt = $conexion->prepare("INSERT INTO productos (nombre, descripcion, precio, unidades, foto) 
    VALUES (?, ?, ?, ?, ?)") or die($conexion->error);
    $stmt->bind_param("ssiis",$nombre, $descripcion, $precio, $unidades, $foto) or die($conexion->error);
    $stmt->execute() or die($conexion->error);
    $stmt->close();
}

function subir_fichero_producto_bbdd($nombre, $descripcion, $unidades, $precio, $nombre_archivo, $targetDir = "archivos/")
{
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    $targetFile = $targetDir.basename($nombre_archivo);
    $imgContenido = addslashes(file_get_contents($targetFile));
    if (dar_alta_producto($conexion, $nombre, $descripcion, $unidades, $precio, $imgContenido)) {
        $mensaje = array("success", "Producto dado de alta correctamente");
    } else {
        $mensaje = array("error", "Producto no dado de alta correctamente");
    }
    cerrar_conexion($conexion);
    return $mensaje;
}

function login($nombre, $password){
    if(!isset($_SESSION)){
        session_start();
    }
   $conexion = get_conexion();
   seleccionar_bd_tienda($conexion);
   $sql = "SELECT nombre, pass FROM usuarios WHERE nombre='$nombre'";

   $resultados = $conexion->query($sql) or die($conexion->error);

   if ($resultados->num_rows) {
       while ($fila = $resultados->fetch_assoc()) {
           if (@password_verify($password, $fila['pass'])) {
               $_SESSION['nombre'] = $fila['nombre'];
           }
       }
   }
   cerrar_conexion($conexion);
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}