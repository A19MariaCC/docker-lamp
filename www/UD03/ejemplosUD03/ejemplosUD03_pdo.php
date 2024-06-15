<?php
/** PDO */
$servername = "db";
$username = "root";
$password = "test";

try{
    //1. Conexión a la base de datos
    $conPDO = new PDO("mysql:host=$servername;dbname=myDBPDO",$username, $password);

    //2. Forzar las excepciones
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La conexión es correcta <br />";
    //3. Crear la base de datos
    $sql = "CREATE DATABASE IF NOT EXISTS myDBPDO";

    $conPDO->exec($sql);
    echo "Base de datos creada correctamente<br>";
    //4. Crear tabla
    $sentencia = "CREATE TABLE IF NOT EXISTS clientes(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellido VARCHAR(30) NOT NULL,
        email VARCHAR(50)
    )";
    $conPDO->exec($sentencia);
    echo "La tabla fue creada correctamente<br />";

    //5. Insertar registro
    /*$sent = "INSERT INTO clientes (nombre, apellido, email)
    VALUES ('Pepe', 'Sobrino', 'pepe@iessanclemente.net')";
    $conPDO->exec($sent);
    echo "Se ha insertado el registro correctamente.";
    */
    //5.1 Consulta preparada
    //Preparar la consulta
    /*$stmt = $conPDO->prepare("INSERT INTO clientes (nombre, apellido, email)
    VALUES (:nombre, :apellido, :email)");
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':apellido',$apellido);
    $stmt->bindParam(':email',$email);

    $nombre ="Juan";
    $apellido ="Sobirno";    
    $email = "juan@edu.com";

    $stmt->execute();

    $nombre ="Ayla";
    $apellido ="Sobirno";    
    $email = "ayla@edu.com";
    
    $stmt->execute();
    echo "Los datos fueron insertados";
    */

    $stmt = $conPDO->prepare("SELECT id, nombre, apellido FROM clientes");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<table><tr><th>ID</th><th>Name</th><th>Apellido</th></tr>";
    while($row = $stmt->fetch()){
        echo "<tr>";
        echo "<td>". $row['id']. "</td> "; 
        echo "<td>". $row['nombre']. "</td> ";
        echo "<td>". $row['apellido']. "</td> ";
        echo "</tr>";
    }
    echo "</table>";

}catch(PDOException $e){
    echo $sql."<br />".$e->getMessage();
}


//6. Cerrar la conexión
$conPDO = null;
?>