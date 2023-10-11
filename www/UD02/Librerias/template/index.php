<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="header" class="container">

	<div id="logo">
		<?php
			/* Incluimos el archivo PHP que hemos generado y que añadimos donde queremos
		que se muestre nuestro archivo logo.php */ 
		include("../template/librerias/logo.php");
		logo(); // Llamada a la función logo() definida en el archivo logo.php 
		?>
	</div>
	
	<div id="menu">
	<?php 
		/* Ahora incluimos la librería en la que establecemos el menú de nuestro sitio
		web */
		include("../template/librerias/menu.php"); // Ruta a la que debemos mirar para mostrar la web
		menu(); // Llamamos a la función menu definida en el archivo menu.php 
		?>
	</div>
	
</div>

<div id="pictures">
	<?php 
		/* Ahora establecemos la impresión de las imágenes importando del archivo
		pictures.php */
		include("../template/librerias/pictures.php");
		pictures(); // Llamada a la función pictures() definida en el archivo pictures.php 
	?>
</div>

<div id="page">
	<div id="bg1">
		<div id="bg2">
			<div id="bg3">
			
				<div id="content">
					<?php 
					// Añadimos la función del contenido en esta posición de la web
					// Para lo que utilizamos un include para añadi la función.
					include("../template/librerias/content.php");
						content(); // Llamada a la función content() definida en el archivo content.php 
					?>
				</div>
				
				<div id="sidebar">
					<?php 
					// Añadimos el archivo sidebar.php para que lo muestre en la situación
					// especifica, que en este caso es la barra lateral de nuestro sitio web
					// Al igual que en el anterior apartado llamamos a la función definida en
					// el archivo sidebar.php
					include("../template/librerias/sidebar.php");
						sidebar(); // Llamada a la función sidebar() definida en el archivo sidebar.php 
					?>
				</div>
				
			</div>
		</div>
	</div>
</div>

<div id="footer">
<?php 
	// En este apartado establecemos el archivo footer.php, que tenemos que incluir también 
	// para que después pueda ser llamada la función definida en el archivo de la libreria
	// Como en las anteriores ocasiones, debemos llamar a la función definida en ese archivo
	// footer.php
	include("../template/librerias/footer.php");
		pie(); // Llamada a la función pie() definida en el archivo footer.php ?>
</div>

</body>
</html>
