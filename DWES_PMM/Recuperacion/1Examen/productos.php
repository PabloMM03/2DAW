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

$servidor = $_POST['servidor'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$basedatos = $_POST['basedatos'];

// Conectamos a la base de datos
$conexion = Conectar($servidor, $usuario, $contrasena, $basedatos);

if (!$conexion) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Realizamos la consulta
$query = "SELECT nombre, descripcion, precio, descuento FROM productos";
$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($conexion));
}

// Mostramos los resultados en una tabla HTML
echo "<table border='1'>
      <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Descuento</th>
      </tr>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>
            <td>" . $fila['nombre'] . "</td>
            <td>" . $fila['descripcion'] . "</td>
            <td>" . $fila['precio'] . "</td>
            <td>" . $fila['descuento'] . "</td>
          </tr>";
}
echo "</table>";

// Cerramos la conexión
mysqli_close($conexion);

//Aquí mostraremos la información pertinente al usuario. También, si lo consideras oportuno, mostrarás aquí la información de errores, falta de datos para realizar la conexión, etc. Para debug puedes utlizar:
  //echo '<pre>'.print_r($variable).'</pre>';
?>
  
  
</body>
</html>