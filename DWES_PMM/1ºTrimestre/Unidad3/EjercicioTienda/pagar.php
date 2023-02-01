<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//Se comprueba que el usuario se ha autentificado
if(!isset($_SESSION['login'])){
    header ('location: ./login.php');
    exit();
}else{

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Pagar</title>
</head>
<body>
 
    <?php
    //Conectamos con la BBDD 
    
require './funciones.php';
$conexion = conectarBBDD();

    unset($_SESSION['carritoCompra']);
    $totalAPagar = $_SESSION['pagar'];
        ?><h1><u>Factura</u></h1> <?php
        echo "<b>$totalAPagar euros </b>";
        echo '<h3>Gracias por su compra en nuestra tienda. ¿Desea volver a comprar?</h3>';

        //Creacion de panel con botones 
    ?>

    <p>

    <table>
    <tr>
        <th>Volver a comprar </th>
        <th>Desconectar </th>
    </tr>
    <tr>
    <td>
        <a href="./productos.php"><input type="submit" name="volver" value="Volver a la Tienda"></a>
    </td>
    <td>
        <a href="./logOut.php"><input type="submit" name="desconectar" value="Log Out"></a>
    </td>
    </tr>
    </table>


<br>

<?php
  
}
$conexion->close();
?>

</body>
</html>