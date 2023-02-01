<?php

function conectarBBDD(){

    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassw = '';
    $dbName = 'ejtienda';

    $conexion = new mysqli($dbHost,$dbUser,$dbPassw,$dbName);
    $error = $conexion->connect_errno;

    if($error !=0){
        $mensaje_error = '<p>Error en la conexion de la base de datos</p>';
        echo $mensaje_error;
        exit();
    }else{
        return $conexion;
    }
}


function getPrimaryKey($conexion){
    //Primero hacíamos un select de todos los ids de los departamentos ordenados
    
    if($results = $conexion->query('SELECT cod FROM producto ORDER BY cod DESC')){
      $array_results = $results->fetch_array();
      $cod = reset($array_results);
      preg_match('/d([0-9]{3})/', $cod , $matches, PREG_OFFSET_CAPTURE);
      $cod = reset($matches[1]);
      $cod = $cod + 1;
      
      $cod = sprintf("%'.03d", $cod);
          
      return 'd'.$cod; 
    }
    
   
  
  }
