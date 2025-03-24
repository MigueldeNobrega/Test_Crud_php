<?php

/**
 * Sube una imagen al servidor.
 * Verifica si se ha enviado un archivo de imagen a través del formulario.
 * Genera un nuevo nombre aleatorio para la imagen y la guarda en la carpeta './img/'.
 * return string Nombre del archivo de imagen subido o null si no se subió ninguna imagen.
 */
function subir_imagen() {
    if (isset($_FILES['imagen_usuario'])) {
        // Obtener la extensión del archivo
        $extension = explode('.', $_FILES['imagen_usuario']['name']);
        
        // Generar un nuevo nombre aleatorio para la imagen
        $nuevo_nombre = rand() . '.' . $extension[1];
        
        // Definir la ubicación donde se almacenará la imagen
        $ubicacion = './img/' . $nuevo_nombre;
        
        // Mover la imagen a la carpeta destino
        move_uploaded_file($_FILES['imagen_usuario']['tmp_name'], $ubicacion);
        
        return $nuevo_nombre;
    }
    return null;
}

/**
 * Obtiene el nombre de la imagen asociada a un usuario en la base de datos.
 * param int $id_usuario ID del usuario.
 * return string|null Nombre del archivo de imagen o null si no se encuentra.
 */

function obtener_nombre_imagen($id_usuario) {
    include('conexion.php');    
    // Preparar la consulta SQL para obtener la imagen del usuario
    $stmt = $conexion->prepare("SELECT imagen FROM usuarios WHERE id = ?");
    $stmt->execute([$id_usuario]);
    
    // Obtener el resultado
    $resultado = $stmt->fetchAll();
    
    // Retornar el nombre de la imagen si existe
    foreach ($resultado as $fila) {
        return $fila['imagen'];
    }
    return null;
}

/**
 * Obtiene el número total de registros en la tabla de usuarios.
 * 
 * @return int Número total de registros en la base de datos.
 */
function obtener_todos_registros() {
    include('conexion.php');    
    // Preparar la consulta SQL para contar todos los registros de usuarios
    $stmt = $conexion->prepare('SELECT * FROM usuarios');
    $stmt->execute();
    // Retornar la cantidad de registros encontrados
    return $stmt->rowCount();
}
