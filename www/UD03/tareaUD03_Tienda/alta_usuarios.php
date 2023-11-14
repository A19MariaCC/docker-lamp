<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de usuario </h1>
    <?php
    include("lib/base_datos.php");
        //Comprobar se veñen datos polo $_POST
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["enviar"])){
        if(empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["edad"])){
            echo "Es necesario informar del nombre, apellidos y edad. Campos obligatorios";
        }else{
            $nombre = filtrado($_POST['nombre']);
            $apellidos = filtrado($_POST['apellidos']);
            $edad = filtrado($_POST['edad']);
            $provincia = filtrado($_POST['provincia']);

            //Conexión
            $conexion = get_conexion();
            //Seleccionar bd
            select_db_tienda($conexion);
            //Executar o INSERT
            alta_usuarios($conexion, $nombre, $apellidos, $edad, $provincia);
            echo "Usuario dado de alta correctamente";

        }
    }
        
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>
    <!--o "action" chama a dar_de_alta.php de xeito reflexivo-->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <p><label for="nombre">Nombre: </label>
            <input type="text" placeholder="Nombre" aria-label="Nombre" name="nombre"></p>
            <p><label for="apellidos">Apellidos: </label>
            <input type="text" placeholder="Apellidos" aria-label="Apellidos" name="apellidos"></p>
            <p><label for="edad">Edad: </label>
            <input type="text" placeholder="Edad" aria-label="Edad" name="edad"></p>
            <p><label for="provincia">Provincia: </label>
            <select name="provincia">
                <option value="corunha">A Coruña</option>
                <option value="lugo">Lugo</option>
                <option value="ourense">Ourense</option>
                <option value="pontevedra">Pontevedra</option>
            </select>
            </p>
            <input type="submit" name="enviar" value="Enviar">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>
</html>
