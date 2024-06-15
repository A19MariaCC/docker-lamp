<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--<form action="accion.php" method="POST">
        <p>Su nombre: <input type="text" name="name" /></p>
        <p>Su edad: <input type="text" name="edad" /></p>
        <p><input type="submit" value="Enviar"/></p>
    </form>-->

<h2>PHP Ejemplo de validación de Formularios</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
  Nombre: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comentario: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Género:
  <input type="radio" name="gender" value="female">Mujer
  <input type="radio" name="gender" value="male">Hombre
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Enviar">  
</form>
</body>
</html>

<?php

    $nombreError = "";
    $emailError = "";
    $webError = "";
    $comentarioError = "";
    $generoError = "";
    //echo $_POST['name']
    $name;
    $email;
    $web;
    $comentario;
    $genero;

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        if(empty($_POST['name'])){
            $nombreError= "El campo nombre es obligatorio";
        }else{
            $name = test_input($_POST['name']);
        }

        if(empty($_POST['email'])){
            $emailError= "El campo email es obligatorio";
        }else{
            $email = test_input($_POST['email']);
        }
        if(empty($_POST['website'])){
            $webError= "El campo website es obligatorio";
        }else{
            $web = test_input($_POST['website']);
        }

        if(empty($_POST['comment'])){
            $comentarioError= "";
        }else{
            $comentario = test_input($_POST['comment']);
        }
        if(empty($_POST['gender'])){
            $generoError= "El campo género es obligatorio";
        }else{
            $genero = test_input($_POST['gender']);
        }
       
        /*$email = test_input($_POST['email']);
        $web = test_input($_POST['website']);
        $comentario = test_input($_POST['comment']);
        $genero = test_input($_POST['gender']);

        echo $name;

        echo $mensajeError;
        */
        echo $name;
        echo $nombreError;
        echo $email;
        echo $emailError;
        echo $web;
        echo $webError;
        echo $comentario;
        echo $comentarioError;
        echo $genero;
        echo $generoError;
    }
   // $name = $_POST['name'];
   // echo test_input($name);
    function test_input($dato){
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);

        return $dato;
    }

?>