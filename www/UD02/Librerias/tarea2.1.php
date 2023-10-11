<?php
/**Realiza los seguintes pasos:

    1. Crea un fichero PHP a modo de librería con todas las funciones creadas.
    2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once` dentro del código de la librería de funciobes como un comentario del código fuente.
    3. Descarga [**esta plantilla**](/03/template-307.zip) y divide el `index.php` de tal forma que tengas distintos recursos repartidos en ficheros:

    Fichero         | Contiene el `div` con `id`
    :-              |:-
    `logo.php`      |`id="logo"`
    `menu.php`      |`id="menu"`
    `pictures.php`  |`id="pictures"`
    `content.php`   |`id="content"`
    `sidebar.php`   |`id="sidebar"`
    `footer.php`    |`id="footer"`

    Modifica el `index.php` para que cargue los recursos indicados en el paso anterior
    */

    // 1. Crea un fichero PHP a modo de librería con todas las funciones creadas.
    /* 
        Para poder realizar este apartado, generamos un nuevo archivo libreria.php donde guardaremos todas las funciones
        para después poder utilizarlas, una vez hayamos importado la libreria.
    */
    /* 2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once` dentro del código de la librería de funciobes como un comentario del código fuente.

    Función include() -> Se incluye e interpreta el contenido del fichero
    Función require() -> La diferencia con include es que produce un error fatal en caso de fallo
    Función include_once() -> Si ya se ha incluido el fichero anteriormente, no se vuelve a incluir
    Función require_once() -> Al igual que con include_once, si anteriormente se incluyó el fichero
    no se vuelve a incluir.
    */

    include("libreria.php");
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ejercicio 1 - Librerias en PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h1>Trabajando con librerias - Mostrando los resultados de funciones con librerias en PHP</h1>
   <?php esDigito("b"); esDigito(6); ?><hr/>
   <?php echo longitudCadena("programacion"); ?>
   <?php echo potencia(8,3); ?>
   <?php echo esVocal("a"); echo esVocal("b"); ?><hr/>
   <?php echo esPar(20); echo esPar(13); ?>
   <?php echo cadenaMayusculas("festivo"); ?>
   <?php imprimirZonaHoraria(); ?>
   <?php saleSol(); ?>
</body>
</html>