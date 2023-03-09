<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Personas - operaciones CRUD</title>
  <style>
    .mainContainer {
      margin: auto;
    }

    .registrosContainer {
      border-right: solid 1px black;
      display: inline-block;
      margin: 1rem;
      padding: 0.5rem;
    }

    .updateContainer {
      margin: 1rem;
      display: inline-block;
    }

    .error_message {
      color: red;
    }
  </style>
</head>

<body>

  <?php

  require_once('funciones.php');

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);


  //Este código se ejecuta si la conexión a la base de datos ha ido bien.
  //0.- Inicialización de variables

  $conexion = conectar();


  $mensaje_error_cliente = '';

  //1.- Recogida y gestión de datos presentes en _POST

  if (isset($_POST) && !empty($_POST)) {
    //echo '<pre>'.print_r($_POST).'</pre>';

    if (!empty($_POST['add_button']) && isset($_POST['add_button'])) {

      insertarDatos($conexion);
    } elseif (!empty($_POST['delete']) && isset($_POST['delete'])) {

      $id = array_keys($_POST['delete']);
      $id = $id[0];

      if (!$conexion->query('DELETE FROM personas WHERE id = ' . $id) || ($conexion->affected_rows === 0)) {
        $mensaje_error_cliente = 'Se ha jodio el asunto colega';
      }
    } elseif (!empty($_POST['update_button']) && isset($_POST['update_button'])) {
      //Aquí gestionamos el actualizar

      //Aquí gestionamos el actualizar

      $resultado = $conexion->query('SELECT * FROM personas');
      $i = 0;

      // Se recuperan los datos de la tabla y se almacenan en un array
      while ($datos = $resultado->fetch_array()) {
        $dato[$i] = $datos['nombre'];
        $i++;
      }
      // Se prepara la consulta de actualización y se vinculan los parámetros
      $query = 'UPDATE personas SET nombre = ? WHERE id = ?';
      $upgrade = $conexion->prepare($query);
      $nombres = $_POST['name'];

      $ids = array_keys($_POST['name']);

      // Se recorren los valores enviados por el formulario y se actualizan los registros si es necesario
      foreach ($nombres as $nombre) {
        for ($j = 0; $j < $i; $j++) {
          if (($nombre == $nombres[$ids[$j]]) && ($dato[$j] != $nombre)) {
            $id = $ids[$j];
            $upgrade->bind_param("ss", $nombre, $id);
            $upgrade->execute();
          }
        }
      }
    }
  }

  //2.- Generación e impresión del formuilario
  //Me traigo todos los registros de la tabla departamento

  $resultado = $conexion->query('SELECT * FROM personas');

  ?>
  <div class="mainCointainer">
    <h1>Administracion de clientes</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="addContainer">
        <input type="submit" value="+" name="add_button"> <input type="text" value="" placeholder="Introduzca su nombre" name="clientes_nombre">
      </div>
      <div class="registrosContainer">
        <?php while ($datos = $resultado->fetch_array()) { ?>
          <table border=1>
            <tr>
              <th>Eliminar</th>
              <th>Nombre</th>
              <th>ID</th>
            </tr>
            <tr>
              <td><input type="submit" value="x" name="delete[<?php echo $datos['id']; ?>]"></td>
              <td><input type="text" value="<?php echo $datos['nombre']; ?>" name="name[<?php echo $datos['id']; ?>]"></td>
              <td><?php echo $datos['id']; ?></td>
            </tr>
          </table>
          <br>

        <?php } ?>

      </div>
      <div class="updateContainer">
        <input type="submit" value="Actualizar registros" name="update_button"> <br>

      </div>
    </form>
  </div>
  <div class="error_message">
    <p>
      <?php echo $mensaje_error_cliente; ?>
    </p>
  </div>
  <?php
  $conexion->close();
  ?>
</body>

</html>