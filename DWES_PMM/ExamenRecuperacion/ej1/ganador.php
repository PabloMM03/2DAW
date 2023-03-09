<?php
  require_once('./vars.php');
  require_once('./funciones.php');
  //Debes modificar este script para que se muestre el ganador, seleccionado (que es recibido por $_POST). Si no hay datos en $_POST debes mandar al usuario de vuelta a index.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Candidatos finalistas</title>
    <style>
        
    </style>
</head>
<body>
     <h1>¡Enhorabuena a Clark Kent!</h1>        
    <p><img src="./img/Henry_Cavill_by_Gage_Skidmore_2.jpg"></p>
    
  <?php

if (isset($_POST['seleccionar']) && !empty($_POST['seleccionar'])) {
  // Obtener la clave del candidato seleccionado

  $claveSeleccionada = $_POST['seleccionar'];

  // Obtener los datos del candidato seleccionado utilizando la clave
  $candidatoSeleccionado = $candidatos[$claveSeleccionada];

  // Mostrar los datos del candidato seleccionado
  echo '<h2>Candidato seleccionado</h2>';
  echo '<p>Nombre: ' . $candidatoSeleccionado['nombre'] . '</p>';
  echo '<img src="' . $candidatoSeleccionado['imagen_url'] . '">';
} else {
  // Si no hay datos en $_POST, enviar al usuario de vuelta a index.php
  header('Location: index.php');
  exit();
}




?>



</body>
</html>