<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parametros de conexion</title>
</head>
<body>

<h1>Conexión a la base de datos</h1>
<p>Intruduzca los datos de conexión</p>

<h1>Consulta de productos</h1>
    <form action="productos.php" method="POST">

    <label for="servidor">Servidor:</label>
    <input type="text" name="servidor" id="servidor" value="localhost"><br>
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario" value="root"><br>
    <label for="contrasena">Contraseña:</label>
    <input type="text" name="contrasena" id="contrasena"><br>
    <label for="basedatos">Base de datos:</label>
    <input type="text" name="basedatos" id="basedatos" value="productos_comerciales"><br>
    <input type="submit" value="Consultar Datos">


    </form>
    
</body>
</html>