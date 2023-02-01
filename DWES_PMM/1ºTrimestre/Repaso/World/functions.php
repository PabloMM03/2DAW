<?php

function obtenerClave($conexion){


    $claves = $conexion->query('SELECT ID FROM city ORDER BY ID DESC');

    $clave = $claves->fetch_array();

    $ultimaClave = $clave[0];
    $ultimaClave = $ultimaClave+1;

    if ($ultimaClave % 2 === 0 && $ultimaClave % 5 === 0) {
        $ultimaClave = $ultimaClave . "0";
    }

    return $ultimaClave;
}