<?php
        require "lib/base_datos.php";
        require "lib/utilidades.php";
        session_start();

        if(isset($_SESSION["nombre"])){
            header('Location: index.php');
        }

        $mensajes = array();
        $nombre = "";
        $password = "";

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
            if(!empty($_POST["nombre"]) && is_string($_POST["nombre"]) && strlen($_POST["nombre"]) <=50){
                $nombre = test_input($_POST["nombre"]);
            }else{
                $mensajes[] = array("error","Introduce un nombre válido: texto y menos de 50 carácteres.");
            }
            if(!empty($_POST["password"]) && is_string($_POST["password"]) && strlen($_POST["password"])<=100){
                $password = test_input($_POST["password"]);
            }else{
                $mensajes[] = array("error", "Introduce un password válido: texto y menos de 100 carácteres.");
            }
        }

        //login 
        if(empty($mensajes)){
            if(isset($_POST["login"]) && isset($nombre) && isset($password)){
                login($nombre,$password);
                if(is_logged()){
                    $mensajes[] = array("success", "Usuario validado correctamente.");
                    header('Location: index.php');
                }else{
                    $mensajes[] = array("error", "Nombre o contraseña incorrecta.");
                }

            }
        }
        
           
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <h1>Login usuarios</h1>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <?= get_mensajes_html_format($mensajes);?>
      <div class="form-group">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <label for="userName">Nombre: </label>
            <input type="text" name="nombre" placeholder="Introduce un hombre de usuario"><?php if(isset($userNameErr)) echo $userNameErr;?>
            <br><br>
            <label for="password">Contraseña: </label>
            <input type="password" name="password">
            <input type="submit" name="login" value="Login"><br/>
        </form>
      </div>
      <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
    </body>
    </html>