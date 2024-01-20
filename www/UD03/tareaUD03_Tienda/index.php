<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header('Location: login.php');
    }else{
    
        
  
/* Ejercicio 1. 
Cuenta el número de visitas que realiza un usuario a una página web. */
if(!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
  } else {
    $_SESSION['contador']++;
  }
  
  echo "Visita número:".  $_SESSION['contador'];
  
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php
        include("lib/base_datos.php");
        include("lib/funciones.php");
        //Obtener conexión
        $conexion = get_conexion();
        //crear_bd_tienda($conexion);
        crear_bd_tienda($conexion);
        //seleccionar_bd_tienda($conexion);
        select_db_tienda($conexion);
        //crear_tabla_usuario($conexion);
        crear_tabla_usuario($conexion);
        //modificar la tabla usuarios para añadir el campo password
        modificar_tabla_usuarios($conexion);
        //crear_tabla_productos($conexion);
        crear_tabla_productos($conexion);
    ?>
    <h1>Tienda IES San Clemente</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <p>
        <a class="btn btn-primary" href="alta_usuarios.php" role="button"> Alta usuarios</a>
        <a class="btn btn-primary" href="listar_usuarios.php" role="button"> Listar usuarios</a>
        <a class="btn btn-primary" href="alta_productos.php" role="button"> Alta productos</a>
        <a class="btn btn-primary" href="logout.php" role="button"> Logout</a>
    </p>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
<?php

}
?>