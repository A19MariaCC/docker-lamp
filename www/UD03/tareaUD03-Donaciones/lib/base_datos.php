<?php
    function conexion(){
        $servername = "db";
        $username = "root";
        $password = "test";
        
        try {
            $conPDO = new PDO("mysql:host=$servername",$username,$password);
            // Forzamos las excepciones
            $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conPDO;
           
        
        } catch(PDOException $e) {
            echo "Fallo en la conexión: " . $e->getMessage();
        } 
    }

    function crear_bd_donacion($conPDO){
        try{
            $sql = "CREATE DATABASE IF NOT EXISTS donacion";
            $conPDO->exec($sql);
            echo "La base de datos fué creada correctamente<br/>";
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function select_db_donacion($conPDO){
        $sql = "USE donacion";
        try{
            $conPDO->query($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function crear_tabla_donantes($conPDO){
        $sql = "CREATE TABLE IF NOT EXISTS donantes(
            id INT(6) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(30) NOT NULL,
            apellidos VARCHAR(30) NOT NULL,
            edad INTEGER NOT NULL,
            grupoSanguineo VARCHAR(3) NOT NULL,
            codPostal INT(5) NOT NULL,
            telefonoMovil INT(9) NOT NULL,
            CHECK (edad >=18)
            )";
        try{
            $conPDO->exec($sql);
            echo "La tabla donantes fue creada correctamente<br />";
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function crear_tabla_administradores($conPDO){
        $sql = "CREATE TABLE IF NOT EXISTS administradores(
            nombre VARCHAR(50) PRIMARY KEY ,
            contrasena varchar(200) NOT NULL
            )";

        try{
            $conPDO->exec($sql);
            echo "La tabla administradores fue creada correctamente<br />";
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function crear_tabla_historico($conPDO){
        $sql = "CREATE TABLE IF NOT EXISTS historico(
            idDonante INT(6) NOT NULL,
            fechaDonacion DATE NOT NULL,
            proximaDonacion DATE NOT NULL,
            CONSTRAINT pk_donante PRIMARY KEY (idDonante, fechaDonacion),
            CONSTRAINT fk_donante FOREIGN KEY (idDonante) REFERENCES donantes(id) ON DELETE CASCADE
            )";
          try{
            $conPDO->exec($sql);
            echo "La tabla histórico fue creada correctamente<br />";
        }catch(PDOException $e){
            echo $e->getMessage();
        } 
    }

    function alta_donantes($conPDO, $nombre, $apellidos, $edad, $grupoSanguineo, $codPostal, $movil){
        $stmt = $conPDO->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupoSanguineo, codPostal, telefonoMovil)
        VALUES (:nombre, :apellidos,:edad,:grupoSanguineo,:codPostal,:movil)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':grupoSanguineo', $grupoSanguineo);
        $stmt->bindParam(':codPostal', $codPostal);
        $stmt->bindParam(':movil', $movil);

        $stmt->execute();
    }

    function listar_donantes($conPDO){
        $stmt = $conPDO->prepare("SELECT id, nombre, apellidos, edad, grupoSanguineo, codPostal, telefonoMovil FROM donantes");
        $stmt->execute();
        return $stmt;
      
    }

    function donar($conPDO, $idDonante, $fechaDonacion){
        
        $proximaDonacion = date("Y-m-d",strtotime($fechaDonacion."+ 4 month"));
        $stmt = $conPDO->prepare("INSERT INTO historico (idDonante, fechaDonacion, proximaDonacion)
        VALUES (:idDonante, :fechaDonacion, :proximaDonacion)");
        $stmt->bindParam(':idDonante', $idDonante);
        $stmt->bindParam(':fechaDonacion', $fechaDonacion);
        $stmt->bindParam(':proximaDonacion', $proximaDonacion);
        $stmt->execute();
        echo "Donación registrada con éxito";
    }
    function cerrar_conexion($conPDO){
        $conPDO = null;
      }
    
      function borrar_donante($conPDO, $idDonante){
        $stmt = $conaPDO->prepare("DELETE donantes,historico FROM donantes JOIN historico ON donantes.id = historico.idDonante WHERE donantes.id = $idDonante");
        $stmt->execute(); 
      }

?>