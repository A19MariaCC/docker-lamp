<?php

/** MYSQL Procedimental */
//1. Crear la conexión
$con = mysqli_connect('db','root','test', 'myDBProcedimiental');

//2. Comprobar la conexión
if(!$con){
    die("Fallo en la conexión: ".mysqli_connect_error());
}

echo "Conexión procedimental correcta<br />";

//3. Crear la base de datos
$sql = "CREATE DATABASE IF NOT EXISTS myDBProcedimiental";

if(mysqli_query($con, $sql)){
    echo "Base de datos creada correctamente<br />";
}else{
    echo "Error creando base de datos".mysqli_error($con);
}

//4. Crear una tabla
$sql = "CREATE TABLE IF NOT EXISTS clientes(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )";

    if(mysqli_query($con, $sql)){
        echo "Se creó la tabla correctamente<br />";
    }else{
        echo "Error creando la tabla ".mysqli_error($con);
    }
//5. Insertar un registro
/*$sql = "INSERT INTO clientes (nombre, apellido, email)
    VALUES ('Pepe', 'Sobrino', 'pepe@iessanclemente.net')";
    if(mysqli_query($con, $sql)){
        echo "Se ha insertado un registro correctamente<br />";
    }else{
        echo "No se pudo insertar el registro".mysqli_error($con);
    }
*/
//5.1 Consultas preparadas
/*$stmt = $con->prepare("INSERT INTO clientes (nombre, apellido, email)
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
*/
//6. Consultar registros
$sql = "SELECT id, nombre, apellido FROM clientes";
$resultados = mysqli_query($con, $sql);
if(mysqli_num_rows($resultados) > 0){
    echo "<table><tr><th>ID</th><th>Name</th><th>Apellido</th></tr>";
    while($row = mysqli_fetch_assoc($resultados)){
        echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td></tr>"; 
    }
    echo "</table>";
}else{
    echo "No hay resultados";
}
//7. Cerrar conexión
mysqli_close($con);

?>