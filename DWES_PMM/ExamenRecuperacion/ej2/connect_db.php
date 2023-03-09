<?php

// Completa aquí el código

function conectarBBDD(){

    $host = "localhost";
    $dbname = "examen_dwes_bbdd";
    $username = "root";
    $password = "";
    
    try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      // configura el modo de errores de PDO a excepciones
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Conexión a la base de datos exitosa";
      return $conn;
    } catch(PDOException $e) {
      echo "Error al conectarse a la base de datos: " . $e->getMessage();
    }

   

}






?>
