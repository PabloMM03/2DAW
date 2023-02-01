<?php

    function conectar(){

        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'ejtienda';

        $conexion = @new mysqli($dbHost, $dbUser, $dbPass, $dbName);
        $error = $conexion->connect_errno;

        if($error !=0){
            $mensaje_error = "Error en la conexion";
            echo $mensaje_error;
        }else{
            return $conexion;
        }


    }
