<?php

include "lib/base_datos.php";
include "lib/utilidades.php";
include "lib/donaciones.php";

$conexion = get_conexion();
seleccionar_bd_donacion($conexion);

if(isset($_POST["enviar"])){
if(isset($_POST["desde"]) && isset($_POST['hasta'])){
    $desde = test_input($_POST["desde"]);
    $hasta = test_input($_POST["hasta"]);
    $donaciones = get_donaciones_entre_fechas($conexion, $desde, $hasta);
}else{
    $donaciones = array();
}
}

cerrar_conexion($conexion);
?>
<!doctype html>
<html lang="en">
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

  <h1>Listado de donaciones entre fechas</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Desde: <input type="date" name="desde"> <br>
    Hasta: <input type="date" name="hasta"> <br>
    <input type="submit" name="enviar" value="Enviar"> 
  </form>
  <table class='table table-hover table-sm text-center'>
        <thead class='thead-light'>
          <tr>
              <th scope='col'>Nombre</th>
              <th scope='col'>Apellidos</th>
              <th scope='col'>Fecha de donación</th>
              <th scope='col'>Fecha próxima donación</th>
          </tr>
          </thead>
          <tbody>
 
<?php
    imprimir_donaciones($donaciones);
?>
  </tbody>
  </table>
  <footer>
      <p><a href='index.php'>Página de inicio</a></p>
  </footer>
</body>
</html>