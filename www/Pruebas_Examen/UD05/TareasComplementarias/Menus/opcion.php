<?php

/**
* Clase Opcion que crea unha opción cun texto, enlace e cor de fondo.
* @author     Autor
* @version    1.0
*/
class Opcion {
	private $titulo;
	private $enlace;
	private $colorFondo;

	public function __construct($tit, $enl, $color) {
		$this->titulo = $tit;
		$this->enlace = $enl;
		$this->colorFondo = $color;
	}

	public function dibujar() {
		echo '<a style="background-color:'.$this->colorFondo.'" href="'.$this->enlace.'">'.$this->titulo.'</a>';
	}
}

?>
