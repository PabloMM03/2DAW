<?php

function insertarDatos($conn){
        // Se obtiene un nuevo valor para la clave primaria
    $id = getPrimaryKey($conn);

        // Se prepara la consulta INSERT y se vinculan los parámetros

        // $query = "INSERT INTO personas(id,nombre) VALUES (?,?)";

    //  $conn->prepare($query);
    //  $insert = $conn->prepare($query);
    //  $insert->bind_param("ss", $id, $_POST['clientes_nombre']);
    //  $insert->execute();

    $query = "INSERT INTO personas(id, nombre) VALUES (?, ?)";
    $conn->prepare($query)->execute([ $id, isset($_POST['clientes_nombre']) ? $_POST['clientes_nombre'] : null ]);
    

}

function getPrimaryKey($conn){

    $claves = $conn->query("SELECT id FROM personas ORDER BY id DESC");

    $clave = $claves->fetch_array();

    $claveID = $clave[0];
    $claveID = $claveID + 1;
    
    return $claveID;
}



function conectar(){

    $conn = new mysqli('localhost', 'root', '', 'personas');
    $error = $conn->connect_errno;

        if($error !=0){
            $mensaje_error = "Error en la conexion";
            echo $mensaje_error;
        }else{
            return $conn;
        }
}




?>