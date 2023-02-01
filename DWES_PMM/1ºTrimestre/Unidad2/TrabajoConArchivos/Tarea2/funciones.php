<?php

function insertarDatos($conexion){
    $id = getPrimaryKey($conexion);
    $Imagen = nuevaImagen($id);
        // Creamos la query que vamos a meter, con los ? porque irán las variables,mientras mas ? haya mas campos seran los introducidos
        $query =$conexion->prepare( 'INSERT INTO clientes(id, imagen, nombre) VALUES (?,?,?)');
        //Insertamos los datos 
        $insert = $query->execute([$id, $Imagen,  $_POST['nombre_Cliente']]);
    
}

function getPrimaryKey($conexion){
    //Obtenemos el id de cada cliente
    $claves = $conexion->query('SELECT id FROM clientes ORDER BY id DESC');

    $clave = $claves->fetch_array();
   
        $ClaveID = $clave[0];
        $ClaveID++; 
        return $ClaveID;   
   
}


function nuevaImagen($id){
    //Agregamos un nombre a la imagen que se añadira a la base de datos, posteriormente le indicamos la carpeta destino donde se guardara 
    $nombre_imagen = "perfil_cliente_$id.jpg"; 
    $imagenes = $_FILES['imagen_Cliente']['tmp_name']; 
    $carpeta_destino = "./perfiles/" . $nombre_imagen; 

    move_uploaded_file($imagenes, $carpeta_destino);

    return $nombre_imagen;
}



?>
