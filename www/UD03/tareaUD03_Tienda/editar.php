<?php
    include("lib/base_datos.php");

    //Conexión
    $conexion = get_conexion();
    //Seleccionar bd
    select_db_tienda($conexion);

    //Obter os datos de $_POST
    if (isset($_POST["editar"])) {
        $id_user = $_POST["id_user"];
        $nombre = filtrado($_POST["name"]);
        $apellidos = filtrado($_POST["apellidos"]);
        $edad = filtrado($_POST["edad"]);
        $provincia = filtrado($_POST["provincia"]);
      
        //Executar UPDATE
        editar_usuario($conexion, $id_user, $nombre, $apellidos,$edad, $provincia);
      }
?>
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
    <h1>Editar usuario </h1>
    <?php
        //Obter id de $_GET
        if (isset($_GET["id"])) {
            //Recuperamos los datos del uuario 
            $id_user = $_GET["id"];
             //Consultar datos de ese id
            $user = get_usuario($conexion, $id_user);  
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de edición</p>
    <!-- o "action" chama a editar.php de xeito reflexivo-->
    <?php
    if($user->num_rows>0){
        $row = $user->fetch_assoc();
    ?>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="id_user" value="<?php echo $id_user ?>"/>
    <!--Mostramos en cada casilla los datos del usuario para modificarlos con echo $row -->
        Nombre: <input type="text" name="name" value=<?php echo $row['nombre'] ?>>
        Apellidos: <input type="text" name="apellidos" value=<?php echo $row['apellidos'] ?>>
        Edad: <input type="text" name="edad" value=<?php echo $row['edad'] ?>>
      <label for="provincia">Provincia: </label>
      <select name="provincia">
        <?php if($row['provincia']=="corunha"){ ?> 
            <option value="corunha" selected>A Coruña</option>
        <?php } else {  ?>
            <option value="corunha" >A Coruña</option>
        <?php }  ?>
        <?php if($row['provincia']=="lugo"){ ?> 
            <option value="lugo" selected>Lugo</option>
        <?php } else {  ?>
            <option value="lugo" >Lugo</option>
        <?php }  ?>
        <?php if($row['provincia']=="ourense"){ ?> 
            <option value="ourense" selected>Ourense</option>
        <?php } else {  ?>
            <option value="ourense" >Ourense</option>
        <?php }  ?>
        <?php if($row['provincia']=="pontevedra"){ ?> 
            <option value="pontevedra" selected>Pontevedra</option>
        <?php } else {  ?>
            <option value="pontevedra" >Pontevedra</option>
        <?php }  ?>
        <br>
      </select>
      <input type="submit" name="editar" value="Modificar Usuario">
      <?php }
        }
    
    ?>
        </form>
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