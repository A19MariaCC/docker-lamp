<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Alta de donante</h1>
    <?php
        include("lib/base_datos.php");
        include("lib/funcionalidades.php");
        $conPDO = conexion();
        select_db_donacion($conPDO);

        if(isset($_POST["enviar"])){
            if(!empty($_POST["nombre"])){
                $nombre = test_input($_POST["nombre"]);
            }else{
                echo "Debes introducir un nombre";
            }
            if(!empty($_POST["apellidos"])){
                $apellidos = test_input($_POST["apellidos"]);
            }else{
                echo "Debes introducir apellidos";
            }
            if(!empty($_POST["edad"])){
                if(is_numeric($_POST["edad"]) && $_POST["edad"]>=18){
                    $edad = test_input($_POST["edad"]);
                }elseif(!empty($_POST["edad"]) && $_POST["edad"]<18){
                    echo "Debes ser mayor de 18 años para poder donar";
                }else{
                    echo "Debes introducir un valor numérico para la edad";
                }
            }
            if(!empty($_POST["grupoS"])){
                $grupoSanguineo = test_input($_POST["grupoS"]);
            }else{
                echo "Debes introducir un grupo sanguíneo";
            }
            if(!empty($_POST["codPostal"])){
                if(is_numeric($_POST["codPostal"]) && strlen($_POST["codPostal"])== 5){
                    $codPostal = test_input($_POST["codPostal"]);
                }else{
                    echo "Debes introducir un valor numérico de 5 dígitos para el código postal";
                }
            }
            if(!empty($_POST["movil"]) && is_numeric($_POST["movil"]) && strlen($_POST["movil"]) == 9) {
                $movil = test_input($_POST["movil"]);
            }else{
                echo "Debes introducir un móvil de 9 dígitos";
            }

            if(isset($nombre) && isset($apellidos) && isset($edad) && isset($grupoSanguineo) && isset($codPostal) && isset($movil)){
                alta_donantes($conPDO, $nombre, $apellidos, $edad, $grupoSanguineo, $codPostal, $movil);
                echo "Donante registrado con éxito";
            }
        }





    ?>
    <div>
        <p>Formulario para dar de alta un donante</p>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <p><label for="nombre">Nombre: </label>
            <input type="text" placeholder="Nombre" aria-label="Nombre" name="nombre"></p>
            <p><label for="apellidos">Apellidos: </label>
            <input type="text" placeholder="Apellidos" aria-label="Apellidos" name="apellidos"></p>
            <p><label for="edad">Edad: </label>
            <input type="text" placeholder="Edad" aria-label="Edad" name="edad"></p>
            <p><label for="grupoSanguineo">Grupo Sanguíneo: </label>
            <select name="grupoS">
                <option value="0-">0-</option>
                <option value="0+">0+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select>
            </p>
            <p><label for="codPostal">Código Postal:</label>
            <input type="text" name="codPostal"></p>
            <p><label for="movil">Teléfono móvil:</label>
            <input type="text" name="movil"></p>
            <input type="submit" name="enviar" value="Enviar"> 
        </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>