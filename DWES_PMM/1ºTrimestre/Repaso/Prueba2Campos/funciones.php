<?php

function insertarDatos($conexion){
    $id = getPrimaryKey($conexion);
     $imagen = nuevaImagen($id);

$query = 'INSERT INTO campos2(id, nombre, ciudad, edad, imagen) VALUES (?,?,?,?,?)';

$insert = $conexion->prepare($query);

$insert->bind_param("sssis", $id, $_POST['clientes_nombre'], $_POST['clientes_Ciudad'], $_POST['clientes_Edad'], $imagen);
$insert->execute();


}

function getPrimaryKey($conexion){

$claves = $conexion->query('SELECT id FROM campos2 ORDER BY id DESC');

$clave = $claves->fetch_array();

$claveID = $clave[0];
$claveID = $claveID + 1;

return $claveID;

}

 function nuevaImagen($id){
    
  
    $nombre_imagen = "imagen_cliente_$id.jpg"; 
     $imagenes = $_FILES['clientes_Imagen']['tmp_name']; 
     $carpeta_destino = "./imagenes/" . $nombre_imagen; 

     move_uploaded_file($imagenes, $carpeta_destino);

     return $nombre_imagen;
 }