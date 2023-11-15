<?php
include("lib/base_datos.php");
//Obter conexión
$conexion = get_conexion();
//Seleccionar a bd
select_db_tienda($conexion);
//Ler o id de $_GET
$id = filtrado($_GET["id"]);
//Executar consulta de borrado (delete)
eliminar_usuario($conexion,$id);
echo "Usuario eliminado correctamente";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda IES San Clemente</title>
</head>
<body>
<footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>
</html>
<?php
    cerrar_conexion($conexion);
?>