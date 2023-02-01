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

        if (!$linkHost) {
            echo "<h1>Error, las credenciales del servidor son incorrectos</h1>";
        } elseif (!$dbLink) {
            echo "<h1>Error, las credenciales de la BBDD son incorrectas</h1>";
        } else {
            if (isset($_POST['nuevaCiudad']) && !empty($_POST['nuevaCiudad'])) {
             $nombreCiudad = $_POST['nuevaCiudad'];
             require_once './functions.php';
             $nuevaClavePrimaria = obtenerClave($conexion);


             $query = "INSERT INTO city (ID, Name) VALUES ($nuevaClavePrimaria, $nombreCiudad)";
             if(!$conexion->query($query)) {
                echo ("<script>alert('Error, no se han podido meter los nuevos datos')</script>");
            } else {
                $consultaCompleta = "SELECT * FROM city ORDER BY ID DESC LIMIT 10";
                $consulta = $conexion->query($consultaCompleta);
                if (!$consulta) {
                    echo ("<script>alert('No se ha podido hacer la consulta de solo 10 datos')</script>");
                } else {
                echo "<table>";
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        ?>
                            <tr>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <td><span><?php echo $fila['ID'] ?></span></td>
                                <td><span><?php echo $fila['Name'] ?></span></td>
                                <input type="submit" name="delete[<?php echo $fila['ID'] ?>]" value="X">
                                </form>
                            </tr>
                        <?php
                    }
                echo "</table>";
                }
             }

            } elseif (isset($_POST['delete']) && !empty($_POST['delete'])) {
                // Por hacer
            }
        }

    ?>


</body>
</html>