<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>

<head>
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0' />
  <style>
    body {
      max-width: 210mm;
      margin: 0 auto;
      padding: 0 1em;
      font-family: 'Segoe UI', 'Open Sans', sans-serif
    }

    a {
      text-decoration: none;
      color: blue
    }

    h1 {
      text-align: center;
      margin-top: 0
    }

    nav,
    footer {
      text-align: center
    }
  </style>
  <title>Películas</title>
</head>

<body>
  <h1>Películas</h1>

  <nav><a href='index.php'>Inicio</a> | Editar</nav>

  <h2>Editar</h2>

  <!-- Completa aquí el código -->

  <?php
  require_once('connect_db.php');


  // Conexión a la base de datos
  $conexion = conectarBBDD();

  // Recoger los datos del formulario
  $id_pelicula = $_POST['id_pelicula'];
  $titulo = $_POST['titulo'];
  $director = $_POST['director'];
  $fecha_estreno = $_POST['fecha_estreno'];
  $genero = $_POST['genero'];
  $duracion = $_POST['duracion'];

  // Actualizar la película en la base de datos
  $query = "UPDATE peliculas SET titulo = ?, director = ?,fecha_estreno = ?, genero = ?, duracion = ? WHERE id = ?";
  $update = $conexion->prepare($query);
  $update->execute([$titulo, $director, $fecha_estreno, $genero, $duracion, $id_pelicula]);

  // Redirigir al usuario de vuelta a la página principal
  header('Location: index.php');
  exit;
  ?>

  <footer>
    <p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2022-2023.</p>
  </footer>

</body>

</html>