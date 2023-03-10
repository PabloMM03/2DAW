<?php
  function inicializa_productos(&$productos, $num_productos,$num_Paginas){
    
    $connection = @ new mysqli('localhost', 'root', '', 'ejtienda');
    $error = $connection->connect_errno;

    if ($error != null) {
      echo "<p>Error $error conectando a la base de datos: $connection->connect_error</p>";
      exit();
    }
    $resultado = $connection->query('SELECT * FROM producto LIMIT '.$num_productos);
    //echo '<pre>'.print_r($resultado).'</pre>';
    //TODO: COMPROBAR QU NO HA HABIDO ERRORES
    $resultado = $resultado->fetch_all();
    $i=1;
    foreach($resultado as $producto){
      $productos[$i] = array(
        'info_prod' => array(
          'cod_prudcto'=>$producto[0],
          'nombre_corto' => $producto[2],
          'precio' => $producto[4],
        ),
        'cantidad' => 0,
      );
      $i++;
    }
  }
 
  function imprime_formulario($formulario){
    $output = '';
    $output.='<h2>'.$formulario['productos'][$formulario['paso_actual']]['info_prod']['nombre_corto'].'</h2>';
    $output.='<form method="post" action="./formulario.php">
    <input type="number" name="cantidad" value="'.$formulario['productos'][$formulario['paso_actual']]['cantidad'].'"><br>';
    
    //Si no primer paso
    if($formulario['paso_actual'] != 1){
      $output .= '<input type="submit" name="anterior" value="Anterior"> ';
    }
    //Si no último paso
    if($formulario['paso_actual'] != count($formulario['productos'])){
      $output .= ' <input type="submit" name="siguiente" value="Siguiente">';
    }
    //Si último paso
    if($formulario['paso_actual'] == count($formulario['productos'])){
      $output .= ' <input type="submit" name="cesta" value="Ver cesta">';
    }
    $output .='</form>';
    echo $output;
  }
