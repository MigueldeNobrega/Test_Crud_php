<?php

$usuario = "root";
$password = "";
$conexion = new PDO("mysql:host=localhost; dbname=crud_php_mdn", $usuario, $password);

//PDO proporciona una capa de abstracción de acceso a datos, lo que significa que, independientemente de la base de datos que se esté utilizando, se emplean las mismas funciones para realizar consultas y obtener datos.