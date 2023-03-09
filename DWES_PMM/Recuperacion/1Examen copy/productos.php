<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Listado de productos</title>
</head>

<body>
  <h1>Listado de productos</h1>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

require_once('funiones.inc.php');

  $conn = conectar();

  $resultado = "SELECT * FROM productos";
  $query = $conn->query($resultado);

  if(!$resultado){
    die("Error, en la consulta");
    exit;
  }else{

    echo "<table border ='1'>";
    echo '<tr>';
    echo '<th> Nombre </th>';
    echo '<th> Descripcion </th>';
    echo '<th> Precio </th>';
    echo '<th> Descuento </th>';
    echo '</tr>';



    while($fila = mysqli_fetch_assoc($query)){

      ?>
    <tr>
      <td><?php echo $fila['nombre']?></td>
      <td><?php echo $fila['descripcion']?></td>
      <td><?php echo $fila['precio']?></td>
      <td><?php echo $fila['descuento']?></td>
    </tr>

<?php


    }

    echo '</table>';
    echo '<a href="index.php"><button>Volver al formulario</button></a>';


  }
  
$conn->close();
  //Aquí mostraremos la información pertinente al usuario. También, si lo consideras oportuno, mostrarás aquí la información de errores, falta de datos para realizar la conexión, etc. Para debug puedes utlizar:
  //echo '<pre>'.print_r($variable).'</pre>';
  ?>


</body>

</html>