<?php
/*Escribe aquí la función conectar, y todas aquellas que consideres oportunas para la realización del examen*/

function Conectar($servidor, $usuario, $contrasena, $basedatos) {
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
    return $conexion;
}
?>
