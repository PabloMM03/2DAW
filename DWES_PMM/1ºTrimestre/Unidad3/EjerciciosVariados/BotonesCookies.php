<?php

//Primero: realizar formulario con dbotones y datos 
//Segundo: realizar codigo para funcionalidad de las cookies
define('TIEMPOMAX', 100);
define('TIEMPOMIN', 1);


if (isset($_POST['crear'])) { //ha pulsado el boton crear

    $valor = rand(1, 100);

    setcookie("tiempo", $valor, time() + 60);

}
if (isset($_POST['obtener'])) { //ha pulsado el boton obtener

    if (isset($_COOKIE['tiempo'])) {
        echo "El valor de la Cookie 'aleatoria' es " . $_COOKIE['tiempo'] . "";

    } else {
        echo 'La cookie indicada no existe';
    }


}
if (isset($_POST['modificar'])) {

    if (isset($_COOKIE['tiempo'])) {
        $valor = rand(1, 100);

        setcookie("tiempo", $valor, time() + 60);
    } else {
        echo 'La cookie indicada no existe';
    }

}
if (isset($_POST['eliminar'])) {

    if ($_COOKIE['tiempo']) {
        setcookie("tiempo", "", time() - 1);
    } else {
        echo 'La cookie indicada no existe';
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios Cookies</title>
</head>

<body>

    <?php
print '<form action="./BotonesCookies.php" method="POST">
    <ol>
    <li>Crear una cookie con una duracion de  
        <input type="text" name="tiempo" value="60" size="3">
        segundos (entre ' . TIEMPOMIN . ' y ' . TIEMPOMAX . ')
        <input type="submit" name="crear" value="Crear Cookie">
    </li>
    <li>Obtener valor Cookie
        <input type="submit" name="obtener" value="Obtener Valor">
    </li>
    <li>Modificar Cookie
        <input type="submit" name="modificar" value="Modificar Cookie">
    </li>
    <li>Eliminar Cookie
        <input type="submit" name="eliminar" value="Eliminar Cookie">
    </li>
    </ol>
    </form>'
    ?>


</body>

</html>