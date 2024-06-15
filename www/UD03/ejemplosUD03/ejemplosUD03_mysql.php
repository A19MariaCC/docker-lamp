<?php
/** MYSQL Orientado a objetos */
//1. Crear la conexión
@$conexion = new mysqli('db','root','test');
//2. Comprobar la conexión

if($conexion->connect_errno != null){
    die("Fallo en la conexión: ".$conexion->connect_error."Con numero". $conexion->connect_errno);

}
echo "Conexión correcta<br />";

//3. Crear la base de datos
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if($conexion->query($sql)){
    echo "Base de datos creada correctamente<br/>";
}else{
    echo "Error creando la base de datos".$conexion->error;
}
$conexion->select_db('myDB');
echo "Cambio de base de datos<br/>";

//4. Crear una tabla
$sql = "CREATE TABLE IF NOT EXISTS clientes(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50)
)";
if($conexion->query($sql)){
    echo "Tabla creada correctamente<br />";
}else{
    echo "Error creando la tabla".$conexion->error;
}
//5. Insertar datos
/*$sql = "INSERT INTO clientes (nombre, apellido, email)
VALUES ('Pepe','Sobrino', 'pepe@iessanclemente.net')";
if($conexion->query($sql)){
    echo "Se ha creado un nuevo registro";
}else{
    echo "No se pudo crear el registro".$conexion->error;
}
*/
//5.1 Consultas preparadas
$stmt = $conexion->prepare("INSERT INTO clientes (nombre, apellido, email)
VALUES (?,?,?)");
$stmt->bind_param("sss",$nombre, $apellido,$email);
//5.2 Establecer parámetros y ejecutar
$nombre = "alejandro";
$apellido = "Garcia";
$email = "alejandro@edu.com";
$stmt->execute(); 

$nombre = "Julian";
$apellido = "Garcia";
$email = "julian@edu.com";
$stmt->execute(); 

echo "Nuevos registros creados correctamente";

$stmt->close();
//6. Consulta registros
$sql = "SELECT id, nombre, apellido FROM clientes";
$resultados = $conexion->query($sql);
if($resultados->num_rows > 0){
    echo "<table><tr><th>ID</th><th>Name</th><th>Apellido</th></tr>";
    while($row = $resultados->fetch_assoc()){
        echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td></tr>";
    }
    echo "</table>";
}else{
    echo "No se encuentran registros en la tabla clientes";
}

//7. Cierre de la conexión
$conexion->close();






?>