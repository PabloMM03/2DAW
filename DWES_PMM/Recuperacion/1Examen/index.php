<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<title>Parámetros de conexión</title>
</head>
<body>

<h1>Conexión a la base de datos</h1>
<p>Intruduzca los datos de conexión</p>
<!--Crear aquí un formulario para introducir los parámetros de conexión, que mande al script de listado de productos.--> 
<h1>Consulta de productos</h1>
    <form method="post" action="productos.php">
        <label for="servidor">Servidor:</label>
        <input type="text" name="servidor" id="servidor" value="localhost"><br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" value="root"><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena"><br>
        <label for="basedatos">Base de datos:</label>
        <input type="text" name="basedatos" id="basedatos" value="productos_comerciales"><br>
        <input type="submit" value="Consultar productos">
    </form>

</body>
</html> 