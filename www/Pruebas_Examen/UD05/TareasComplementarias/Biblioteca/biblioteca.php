<?php
/**
 * Descripción de la clase.
 * Clase biblioteca que genera menús horizontales o verticales.
 * @author     Rafa Veiga
 * @version    1.0
 * 
 * Se desea gestionar un sistema de bibliotecas.
 *
 * Cada biblioteca contendrá los siguientes datos: nombre de la biblioteca, dirección y teléfono.
 * Cada biblioteca almacenará un número ilimitado de documentos.
 *
 * Los distintos documentos podrán ser de los siguientes formatos: libro, revista y dvd.
 * Cada documento estará identificado por un id y el formato de documento que es.
 * De los libros además nos interesa el nombre del autor, número de páginas y año publicación.
 * De las revistas nos interesa número de páginas y año de publicación.
 * De los dvd nos interesa: número de dvd's, año de publicación y formato del dvd.
 *
 * La biblioteca tiene que permitir:
 * - Dar de alta cq. tipo de documento en cualquier formato de los permitidos.
 * - Listar todos los documentos que hay en la biblioteca.
 * - Listar los documentos de un formato específico.
 * - Dar de baja un documento por su id.
 * - Mostrar la información de la biblioteca.
 * - También se permitirá conocer el número de bibliotecas creadas en todo momento.
 *
 * De cada documento podremos:
 * - Imprimir todos sus datos.
 * - Modificar su año de publicación.
 *
 * Realizar las clases correspondientes y un ejemplo de utilización de dichas clases.
 */

    class Biblioteca{
        private $nombre;
        private $direccion;
        private $numTelefono;
        private $documentos; // Array que contendrá todos los documentos de cada biblioteca.
        // Declarar propiedades o métodos de clases como estáticos los hacen accesibles 
        // sin la necesidad de instanciar la clase.
        // Una propiedad declarada como static no puede ser accedida con un objeto de clase 
        // instanciado (aunque un método estático sí lo puede hacer). 
        // Debido a que los métodos estáticos se pueden invocar sin tener creada una instancia del objeto,
        // la pseudo-variable $this no está disponible dentro de los METODOS declarados como estáticos. 
        // Las propiedades estáticas no pueden ser accedidas a través del objeto utilizando el operador 
        // flecha. Hay que usar operador de ámbito ::
        public static $numBibliotecas = 0;

        public function __construct($nombre, $direccion, $numTelefono){
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->numTelefono = $numTelefono;
            // Los atributos o métodos estatic no son accesibles utilizando el operador ->
		    // Hay que acceder a ellos a través del operador de resolución de ámbito ::
		    // Si es una variable sería:  self::$variable
		    // Si es una constante sería: self::CONSTANTE
            self::$numBibliotecas++;   
        }

        public function __destruct(){
            // Los atributos o métodos static no son accesibles utilizando el operador ->
		    // Hay que acceder a ellos a través del operador de resolución de ámbito ::
		    // Si es una variable sería:  self::$variable
		    // Si es una constante sería: self::CONSTANTE
		    // Si es un método se accede desde afuera con clase::metodo();
            self::$numBibliotecas--;   
        }

        /**
	        * Da de alta un documento en la biblioteca.
	        * 
	        * @param objeto $documento
	    */
        public function darAlta($documento){
            $this->documentos[] = $documento;
        }
        /**
	        * Lista los documentos de una biblioteca por el tipo de documento que se le pasa.
	        * 
	        * @param string $formato Por defecto *
	    */
        public function listarDocumentos($formato = "*"){
            foreach($this->documentos as $undocumento){
                if($formato == "*" || ($undocumento->getFormato() == $formato)){
                    echo $undocumento->mostrarDatos();
                    echo "<hr>";
                }
            }
        }

        /**
	        * Da de baja un documento por su id.
	        * 
	        * @param int $id Identificador del documento a dar de baja.
	        */
	    public function darBaja($id) {
		// Una forma de hacerlo
		/*
		    for ($i=0;$i<count($this->documentos);$i++){
		        if ($this->documentos[$i]->getId() == $id)
		            unset($this->documentos[$i]);

		        }
		*/

		// Otra forma de hacerlo con el foreach
		// Hay que hacerlo con clave=>valor para poder eliminar una posición determinada del array.
		foreach ($this->documentos as $clave => $valor) {
			if ($valor->getId() == $id) {
				unset($this->documentos[$clave]);
			}
		}
	    }

    /**
	 * Muestra la información de la biblioteca.
	 */
	public function mostrarInfo() {
		echo "Información de la Biblioteca:<br/>";
		echo "Nombre: $this->nombre.<br/>";
		echo "Dirección: $this->direccion.<br/>";
		echo "Teléfono: $this->numTelefono.<hr/>";
	}

    }



?>