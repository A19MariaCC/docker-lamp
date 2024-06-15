<?php 
session_start();
if(isset($_SESSION['usuario'])){
  header('Location: index.php');
}else{

  include("lib/funciones.php");
  include("lib/base_datos.php");
  $conexion = conexion();
  select_db_tienda($conexion);


    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
      if(!empty($_POST['nombre']) && is_string($_POST['nombre']) && strlen($_POST['nombre']) <= 50) {
        $nombre = test_input($_POST['nombre']);
      } else {
        $userNameErr = "Introduce un nombre válido: texto y menos de 50 carácteres.";
      }
      if(!empty($_POST['password']) && is_string($_POST['password']) && strlen($_POST['password']) <= 100) {
        $password = test_input($_POST['password']); //encriptamos la contraseña
      } else {
        $passwordErr = "Introduce una descripción válida: tezto y menos de 100 carácteres.";
      }
    }


  //login:
  if(isset($_POST['login']) && isset($nombre) && isset($password)) {
  login($conexion, $nombre);
  //Función login
  /*
  function login($conexion, $nombre){
  $sql = "SELECT nombre, pass FROM usuarios WHERE nombre='$nombre'";
  $resultados = $conexion->query($sql) or die($conexion->error);
  if ($resultados->num_rows) {
    while ($fila = $resultados->fetch_assoc()) {
    $_SESSION['nombre']=$fila['nombre'];
    $_SESSION['password']=$fila['pass'];
    }
  }
}
*/
    if(@password_verify($password,$_SESSION['password'])) {
      $_SESSION["usuario"] = $nombre;
      echo "Usuario validado correctamente";

    }else{
      $loginErr="Contraseña incorrecta";
    }
  }
}
  ?>

      <h1>Login usuarios</h1>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <div class="form-group">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
          <label for="userName">Nombre:  </label>
          <input type="text" name="nombre" placeholder="Introduce un hombre de usuario"><?php if(isset($userNameErr)) echo $userNameErr;?>
          <br><br>
          <label for="password">Contraseña: </label>
          <input type="password" name="password">   
          <?php 
            if(isset($loginErr)) { echo $loginErr;  }
          if(isset($passwordErr)) { echo $passwordErr;  }
          ?>
          <br><br>
          <input type="submit" name="login" value="Login">
          <br>
        </form>
      </div>

  <?php footer(); 
    cerrar_conexion($conexion);
  ?>