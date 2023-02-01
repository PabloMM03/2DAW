<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = '';
        $dbName = 'world';

        $linkHost = mysqli_connect($dbHost, $dbUser, $dbPass);
        $dbLink = mysqli_select_db($linkHost, $dbName);
        $conexion = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            <input type="submit" name="crearBBDD" value="Crear Base de Datos">
            <input type="submit" name="crearCiudad" value="Crear Ciudad">
            <input type="submit" name="mostrarCiudades" value="Mostrar Ciudades">
            <input type="submit" name="actualizarCiudad" value="Actualizar Ciudad">
            <input type="submit" name="borrarCiudad" value="Borrar Ciudad">
        </form>
    <?php
            if (isset($_POST['crearBBDD']) && !empty($_POST['crearBBDD'])) {
                if (!$linkHost) {
                    echo "<h1>Error, datos incorrectos del servidor</h1>";
                } elseif ($dbLink) {
                    echo "<h1>Error, la base de datos estaba ya creada</h1>";
                } else {
                    exec('cd ./bbdd && D:\xampp\mysql\bin\mysql.exe -u root < world.sql');
                }
            } elseif (isset($_POST['crearCiudad']) && !empty($_POST['crearCiudad'])) {
    ?>
            <form action="./mostrarCiudades.php" method="post">
                <input type="text" name="nombreCiudad" value="Nombre nueva ciudad">
                <input type="submit" name="nuevaCiudad" value="Añadir Ciudad">
            </form>
    <?php
            } elseif (isset($_POST['mostrarCiudades']) && !empty($_POST['mostrarCiudades'])) {
                $consultaCompleta = "SELECT * FROM city ORDER BY ID DESC LIMIT 10";
                $consulta = $conexion->query($consultaCompleta);

                echo "<table>";
                while ($fila = mysqli_fetch_assoc($consulta)) {
                    // print_r($fila);
                ?>
                    <tr>    
                        <td><?php echo $fila['ID'] ?></td>
                        <td><?php echo $fila['Name']?></td>
                    </tr>
                <?php
                }
                echo "</table>";
            }
    $conexion->close();
    ?>
</body>
</html>