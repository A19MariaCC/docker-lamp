<?php
/**
* Descripción da clase.
* Clase Menu que xera menús horizontais ou verticales.
* @author     Autor
* @version    1.0
*/

class Menu {
	private $opciones=array();
	private $direccion;

	public function __construct($dir) {
		$this->direccion=$dir;
	}

	public function insertar($opcion) {
		$this->opciones[]=$opcion;
	}

	public function dibujar() {
		for($f = 0; $f<count($this->opciones); $f++) {
		  $this->opciones[$f]->dibujar();
		  if (strtolower($this->direccion)=="vertical")
			echo "<br/>";
		  else
		    echo " ";
		}
	}
}
