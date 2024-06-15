<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<title>Herencia en PHP5</title>
	</head>
	<body>
		<?php
		include_once("biblioteca.php");
		include_once("documento.php");

		$biblioteca1 = new Biblioteca("Fonseca", "Rua Fonseca s/n", 981525878);
		echo "Número de bibliotecas creadas:".Biblioteca::$numBibliotecas."<br/>";

		$biblioteca1->mostrarInfo();

        // ($id,$formato,$aniopub,$titulo,$autor,$numpaginas)
		$libro = new Libro(1, "libro", 2012, "Ajax in Action", "Marcelino", 520);
		$biblioteca1->darAlta($libro);
		$libro = new Libro(2, "libro", 2010, "jQuery para novatos", "Pepe Perez", 150);
		$biblioteca1->darAlta($libro);
		$libro = new Libro(3, "libro", 2011, "PHP5 OO", "Arturo", 99);
		$biblioteca1->darAlta($libro);

        // ($id,$formato,$aniopub,$numdvds,$formatodvd)
		$dvd = new Dvd(4, "dvd", 2005, "Debian 6.0", 1, "ISO");
		$biblioteca1->darAlta($dvd);

		$dvd = new Dvd(5, "dvd", 2006, "Mecano", 1, "mp3");
		$biblioteca1->darAlta($dvd);

        // ($id,$formato,$aniopub,$titulo,$numpaginas)
		$revista = new Revista(6, "revista", 2004, "Hola", 56);
		$biblioteca1->darAlta($revista);
		$biblioteca1->listarDocumentos();


		$biblioteca2 = new Biblioteca("Fonseca II", "Rua Fonseca s/n", 981525878);
		echo "Número de bibliotecas creadas:".Biblioteca::$numBibliotecas . "<br/>";

		$biblioteca1->darBaja(2);
		$biblioteca1->listarDocumentos();
		$biblioteca1->listarDocumentos("dvd");

		print_r(get_class_methods($biblioteca1)); // Métodos de CLASE.
		echo "<hr/>";

		print_r(get_class_vars('biblioteca')); // Variables de CLASE.
		echo "<hr/>";

		unset($biblioteca2);
		echo "Número de bibliotecas creadas:".biblioteca::$numBibliotecas."<br/>";
		?>
	</body>
</html>