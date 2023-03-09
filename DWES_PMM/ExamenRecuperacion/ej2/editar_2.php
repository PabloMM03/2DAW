<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>
  <head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=2.0' />
    <style>body{max-width:210mm;margin:0 auto;padding:0 1em;font-family:'Segoe UI','Open Sans',sans-serif}a{text-decoration:none;color:blue}h1{text-align:center;margin-top:0}nav,footer{text-align:center}</style>
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

// Recoger el ID de la película a modificar
$id_pelicula = $_POST['id_pelicula'];

// Obtener los datos de la película
$query = "SELECT * FROM peliculas WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->execute([$id_pelicula]);
$pelicula = $stmt->fetch(PDO::FETCH_ASSOC);

// Mostrar el formulario con los campos de la película
echo '<form action="editar_3.php" method="post">';
echo '<input type="hidden" name="id_pelicula" value="' . $pelicula['id'] . '">';
echo '<label for="titulo">Título:</label>';
echo '<input type="text" name="titulo" id="titulo" value="' . $pelicula['titulo'] . '"><br>';
echo '<label for="director">Director:</label>';
echo '<input type="text" name="fecha_estreno" id="fecha_estreno" value="' . $pelicula['fecha_estreno'] . '"><br>';
echo '<label for="genero">Género:</label>';
echo '<input type="text" name="genero" id="genero" value="' . $pelicula['genero'] . '"><br>';
echo '<label for="anio">Año:</label>';
echo '<input type="number" name="duracion" id="duracion" value="' . $pelicula['duracion'] . '"><br>';
echo '<label for="director">Director:</label>';
echo '<input type="text" name="director" id="director" value="' . $pelicula['director'] . '"><br>';
echo '<input type="submit" value="Guardar cambios">';
echo '</form>';
?>




    <footer><p>Examen de febrero - Desarrollo Web en Entorno Servidor a distancia - 2022-2023.</p></footer>

  </body>
</html>
