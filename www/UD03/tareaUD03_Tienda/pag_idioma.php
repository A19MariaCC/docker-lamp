<?php
session_start();

/* Ejercicio 2
Crea una página en la que el usuario pueda seleccionar su idioma a través de un combo 
(introducir al menos los idiomas; gallego, castellano e inglés) y muestre la siguiente
frase en el idioma correspondiente: Bienvenido a mi página!. */

if(isset($_POST['enviar'])) {
    $idioma = $_POST['idioma'];
    setcookie("idioma",$idioma, time()+86400);
}
?>
<html>
    <head>
        <title>Página de idioma</title>
        <meta charset="utf-8">
    </head>
    <body>
            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
                <select name="idioma" id="idioma">
                    <option value="es">Español</option>
                    <option value="gal">Gallego</option>
                    <option value="en">Inglés</option>
                </select>
                <input type="submit" value="enviar" name="enviar">
            </form>
            <?php
            if(!isset($_COOKIE['idioma'])) {
                echo "Selecciona un idioma";
            } else {
                switch($_COOKIE['idioma']) {
                    case "es":
                        echo "<p>Bienvenido/a a mi página.</p>";
                        break;
                    case "gal": 
                        echo "<p>Benvido/a a miña páxina.</p>";
                        break;
                    case "en":
                        echo "<p>Wellcome to my website.</p>";
                        break;
                }
            }
            ?>
    </body>
</html>