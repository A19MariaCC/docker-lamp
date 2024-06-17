## Acceso al equipo

Usuario: dawmddwcs

Contraseña: DWCSdwcs!

## Antes de empezar

* Debes saber tus credenciales de acceso a `GitHub` y a la web de `fpadistancia`.

* Se debe emplear el PC asignado en el aula del examen. No se puede utilizar ningún otro ordenador ni teléfono.

* Podéis utilizar todos los materiales que queráis.

* Está permitido el uso de internet a excepción de sistemas como ChatGPT o Copilot.

* Se realiza la grabación del examen para una posible revisión.

* Debes trabajar en la máquina virtual que tienes disponible en el equipo y que se llama `DWESDeveloperExamen`.

* Clona el repositorio que utilizas para éste módulo en la máquina virtual. Si no tienes repositorio deberás crearlo.

* Deberás autorizar a Visual Studio Code para utilizar tu cuenta de GitHub.

* Recuerda recrear los contenedores de docker.

* Dentro del directorio `www` de tu repositorio crea un directorio que se llame `ParcialT2Examen`.

* Asegúrate de que el profesor sea colaborador de tu repositorio (xulioxesus@gmail.com).

* Descomprime el contenido del archivo `contenidoParcialT2Examen.zip` de la tarea del examen en la carpeta `www/ParcialT2Examen/`. Puedes utilizar el comando unzip desde el terminal para hacerlo.

* No borres el fichero `Enunciado.md`.

* Haz commit una vez que esté preparado todo.

* También puedes hacer push a tu repositorio remoto.

## Ejercicio 1 - Ficheros (3.33 puntos)

Modifica la aplicación que se encuentra en la carpeta `e1`.

Cuando se envía el formulario se debe guardar la nota en el fichero `notas/notas.txt`. En cada línea de dicho fichero se encuentra el título de una nota y su contenido, separados por un `;`.

Modifica el index para que se muestren las notas contenidas en el fichero `notas/notas.txt` utilizando el formato que se indica en `index.php`.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 2 - Clases abstractas (3.33 puntos)

Dada la clase `Vehiculo` que se encuentra en el directorio `e2`.

Implementa la clases Coche y Moto de forma que hereden de Vehiculo e implementen todas sus operaciones abstractas:

- Deben tener un atributo privado: estado.
- Dicho estado toma los valores 'arrancado' y 'parado'
- Un constructor que permita construir objetos pasando como argumentos marca, modelo y estado.
- Las operaciones adecuadas de la clase padre.

Prueba las clases Moto y Coche en los ficheros de pruebas adecuados.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 3 - Interfaces y herencia (3.33 puntos)

En el directorio `e3`.

Define una interfaz `Imprimible` con las operaciones `imprimirEnTabla` y `imprimirEnLista`.

Define una clase `Articulo` que implemente la interfaz `Imprimible`. Dicha clase debe cumplir:

- tres atributos protegidos
    - titulo
    - contenido
    - autor
- el constructor apropiado para dar valores a los atributos.
- los getters para los atributos
- los setters para los atributos
- la implementación de imprimirEnTabla **devuelve** un string con los campos del artículo en formato html utilizando la etiqueta `<table>`.
- la implementación de imprimirEnLista **devuelve** un string con los campos del artículo en formato html utilizando la etiqueta `<ul>`.

Define una clase `ArticuloRevista` que herede de `Articulo` y añada el string "Revista - " delante del título.

Define una clase `ArticuloPeriodico` que herede de `Articulo` y añada el string "Periodico - " delante del título.

Prueba las clases `ArticuloRevista` y `ArticuloPeriodico` en un fichero llamado `Test.php`.


**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Finalizar y entregar el examen

* Realiza un push a tu repositorio.
* Entrega tu repositorio comprimido en la tarea disponible en el aula virtual.
* El nombre del fichero `ParcialT2Examen.zip`.
* Entrega la URL de tu repositorio en la tarea disponible en el aula virtual.