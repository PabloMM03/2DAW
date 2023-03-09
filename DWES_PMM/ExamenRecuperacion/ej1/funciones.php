<?php

/**
 * Función que, a partir de la lista de participantes, ubicada en la variable de ámbito global 
 * $participantes, genera un array de $n candidatos finalistas de manera aleatoria
 * 
 * @param $n: Número de candidatos que serán seleccionados
 * 
 * @return: Array con los $n candidatos seleccionados
 */

 function getCandidatos($n) {
  global $participantes;

  // Obtener el número total de participantes
  $totalParticipantes = count($participantes);

  // Verificar que el número de candidatos que se van a seleccionar es menor o igual que el número total de participantes
  if ($n > $totalParticipantes) {
    $n = $totalParticipantes;
  }

  // Crear un array vacío para almacenar los candidatos seleccionados
  $candidatosSeleccionados = array();

  // Seleccionar $n candidatos aleatorios
  for ($i = 0; $i < $n; $i++) {
    // Obtener un número aleatorio entre 0 y el número total de participantes
    $indiceAleatorio = rand(0, $totalParticipantes - 1);
    $participanteSeleccionado = $participantes[$indiceAleatorio];
    // Agregar el participante seleccionado al array de candidatos seleccionados
    $candidatosSeleccionados[] = $participanteSeleccionado;
    // Eliminar el participante seleccionado de la lista de participantes para evitar que se seleccione dos veces
    array_splice($participantes, $indiceAleatorio, 1);
    // Actualizar el número total de participantes
    $totalParticipantes--;
  }

  // Devolver el array de candidatos seleccionados
  return $candidatosSeleccionados;
}


 //IMPORTANTE: Crear aquí una función llamada getCandidatos que cumpla con la descripción anterior.

 /**
 * Función que, a partir de la lista de candidatos seleccionados, ubicada en la variable pasada como parámetro $candidatos, genera una cadena HTML con el formulario para poder elegir el ganador final
 * 
 * @param $candidatos: Un array con los seleccionados a ganador.
 * 
 * @return: Cadena con el formulario que se imprimirá en el html con los candidatos seleccionados.
 */

function getFormularioCandidatosMarkup($candidatos) {

  $output = '<form action="ganador.php" method="post">';
  foreach ($candidatos as $key => $candidato) {
      $output .= '<div class="candidatoContainer">';
      $output .= '<h2>' . $candidato['nombre'] . '</h2>';
      $output .= '<img src="' . $candidato['imagen_url'] . '"><br>';
      $output .= '<input type="submit" value="Seleccionar" name="seleccionar[' . $key . ']">';
      $output .= '</div>';
  }
  $output .= '</form>';

  return $output;
}
  // $output = '';
  // $output ='<form action="ganador.php" method="post">
  //   <div class="candidatoContainer">
  //     <h2>Clark Kent</h2>
  //     <img src="./img/Henry_Cavill_by_Gage_Skidmore_2.jpg"><br><input type="submit" value="Seleccionar" name="seleccionar[1]">
  //   </div>
  //   <div class="candidatoContainer">
  //     <h2>Bruce Wayne</h2>
  //     <img src="./img/Christianbale.jpg"><br><input type="submit" value="Seleccionar" name="seleccionar[2]">
  //   </div>
  //   <div class="candidatoContainer">
  //     <h2>Diana Prince</h2>
  //     <img src="./img/Diana_in_White.png"><br><input type="submit" value="Seleccionar" name="seleccionar[3]">
  //   </div>
  //   <div class="candidatoContainer">
  //     <h2>Barry Allen</h2>
  //     <img src="./img/Barry-Hallen.png"><br><input type="submit" value="Seleccionar" name="seleccionar[4]">
  //   </div>
  // </form>';
  // return $output;
// } 

