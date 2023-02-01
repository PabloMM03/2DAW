<?php

function insertarDatos($conexion){
    $id = getPrimaryKey($conexion);
    // $imagen = nuevaImagen($id);

$query = 'INSERT INTO personas(id, nombre) VALUES (?,?)';

$insert = $conexion->prepare($query);

$insert->bind_param("ss", $id, $_POST['clientes_nombre'] );
$insert->execute();


}

function getPrimaryKey($conexion){

$claves = $conexion->query('SELECT id FROM personas ORDER BY id DESC');

$clave = $claves->fetch_array();

$claveID = $clave[0];
$claveID = $claveID + 1;

return $claveID;

}

// function nuevaImagen($id){
    
  
//     $nombre_imagen = "imagen_cliente_$id.jpg"; 
//     $imagenes = $_FILES['imagen_Cliente']['tmp_name']; 
//     $carpeta_destino = "./imagenes/" . $nombre_imagen; 

//     move_uploaded_file($imagenes, $carpeta_destino);

//     return $nombre_imagen;
// }