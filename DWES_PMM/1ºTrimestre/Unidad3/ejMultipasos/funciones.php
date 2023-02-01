<?php

function conectarBBDD(){
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "ejtienda";

    
    $conexion = @new mysqli($db_host,$db_user,$db_password,$db_name);
    $error = $conexion->connect_errno;
    
    if($error !=0){
        $mensaje_error =  "<p>Error de conexión a la base de datos.</p>";
        echo $mensaje_error;
        exit();
    }else{   
     return $conexion;
    }
}   