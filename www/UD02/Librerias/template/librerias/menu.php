<?php
/* En este archivo establecemos el menú de nuestro sitio web, por lo que tenemos 
que incluirlo en el archivo principal de nuestra web usando el include */
function menu() {
    echo "<ul>
		<li class='current_page_item'><a href='#'>Homepage</a></li>
		<li><a href='#'>Blog</a></li>
		<li><a href='#'>Photos</a></li>
		<li><a href='#'>About</a></li>
		<li><a href='#'>Contact</a></li>
	</ul>";
}

?>