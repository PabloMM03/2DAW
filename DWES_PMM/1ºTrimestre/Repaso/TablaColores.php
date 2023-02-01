<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        tr,
        td {
            border: 1px solid black;
        }

        .green {
            background-color: green;
        }

        .blue {
            background-color: blue;
            color: white;
        }

        .red {
            background-color: red;
        }
    </style>
</head>

<body>

    <?php
    // Si no está vacío el Primer Submit es porque va para la segunda pantalla
    if (!empty($_POST['primerSubmit'])) {
        $numeroFilas = $_POST['numFilas'];
        $numeroColumnas = $_POST['numColumnas'];
        $posicionArray = 0;
        echo "<table>";
        for ($filas = 0; $filas < $numeroFilas; $filas++) {
            echo '<tr>';
            for ($columnas = 0; $columnas < $numeroColumnas; $columnas++) {
                $result = rand(1, 3);
                if ($result == 1) {
                    echo "<td class='green'>Verde</td>";
                    $arrayColores[$posicionArray] = "Verde";
                }
                if ($result == 2) {
                    echo "<td class='blue'>Azul</td>";
                    $arrayColores[$posicionArray] = "Azul";
                }
                if ($result == 3) {
                    echo "<td class='red'>Rojo</td>";
                    $arrayColores[$posicionArray] = "Rojo";
                }
                $posicionArray++;
            }
            echo '</tr>';
        }
        echo "</table>";

        // Serialización array
        $arrayCodificado = base64_encode(serialize($arrayColores));

        echo "<h1>Contador de color</h1>";
        echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post'>";
        echo "<input type='text' name='color' placeholder='Seleccione color' />";
        echo "<input type='hidden' value='$arrayCodificado' name='arrayCodificado' />";
        echo "<input type='hidden' value='$numeroFilas' name='numeroFilas' />";
        echo "<input type='hidden' value='$numeroColumnas' name='numeroColumnas' />";
        echo "<input type='submit' name='segundoSubmit' value='Enviar' />";
        echo "</form>";
    }

    if (!empty($_POST['segundoSubmit'])) {
        $numeroFilas = $_POST['numeroFilas'];
        $numeroColumnas = $_POST['numeroColumnas'];
        $arrayColoresDecodificado = unserialize(base64_decode($_POST['arrayCodificado']));
        $indiceArray = 0;
        $numeroAzules = 0;
        $numeroRojos = 0;
        $numeroVerdes = 0;

        // Mostramos el mismo array
        echo "<table>";
        for ($filas = 0; $filas < $numeroFilas; $filas++) {
            echo '<tr>';
            for ($columnas = 0; $columnas < $numeroColumnas; $columnas++) {
                $result = $arrayColoresDecodificado[$indiceArray];
                if ($result == "Verde") {
                    echo "<td class='green'>Verde</td>";
                    $numeroVerdes++;
                }
                if ($result == "Azul") {
                    echo "<td class='blue'>Azul</td>";
                    $numeroAzules++;
                }
                if ($result == "Rojo") {
                    echo "<td class='red'>Rojo</td>";
                    $numeroRojos++;
                }
                $indiceArray++;
            }
            echo '</tr>';
        }
        echo "</table>";

        $colorPedido = $_POST['color'];

        switch ($colorPedido) {
            case 'Rojo':
                echo "<h3>En la tabla se puede ver el color Rojo en $numeroRojos ocasiones</h3>";
                break;
            case 'Azul':
                echo "<h3>En la tabla se puede ver el color Azul en $numeroAzules ocasiones</h3>";
                break;
            case 'Verde':
                echo "<h3>En la tabla se puede ver el color Verde en $numeroVerdes ocasiones</h3>";
                break;
            default:
                echo "<h3>Debe introducir: Rojo / Azul / Verde</h3>";
                break;
        }
    }
    // Nada más empezar
    if (empty($_POST)) {
        echo "<h1>Bienvenido al panel de administración</h1>";
        echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
            echo "<input type='text' name='numFilas' placeholder='Nº de filas' />";
            echo "<input type='text' name='numColumnas' placeholder='Nº de columnas' />";
            echo "<input type='submit' name='primerSubmit' value='Enviar' />";
        echo "</form>";
    }
    ?>

</body>

</html>