<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
//Se comprueba que el usuario se ha autentificado
if(!isset($_SESSION['login'])){
    header('location: ./login.php');
    exit();
}else{

require './funciones.php';
$conexion = conectarBBDD();
/*
En caso de que se haya comprado y pagado algún articulo, y se quiera seguir comprando 
Se comprobará que el carrito no esté vacio, Si está vacio se redirigira de nuevo a productos.php, donde se encuentran todos los productos.
*/
if(!empty($_SESSION['carritoCompra'])){


    ?>
    <fieldset>
    <h2>Carrito de la compra</h2>
    <?php
//Creamos una tabla para mostrar los datos de los productos
echo "<table>";
    echo "<tr>";
        echo "<th>NOMBRE</th>";
        echo "<th>FAMILIA</th>";
        echo "<th>PRECIO</th>";
    echo "</tr>";

    $total = 0;
    //hacemos un foreach de la Session para mostrar los campos añadidos anteriormente en productos
    foreach($_SESSION['carritoCompra'] as $mostrarCampo ){

        echo "<tr>";
        echo "<td>";
            echo $mostrarCampo[0]; //Nombre
        echo "</td>";
        echo "<td>";
            echo $mostrarCampo[2]; //Familia
        echo "</td>";
        echo "<td>";
            echo $mostrarCampo[1] ." euros "; //Precio
        echo "</td>";
        echo "</tr>";
       
       $_SESSION['pagar'] = $total = $total +  $mostrarCampo[1];
    }
echo "</table>";
//Mostramos el precio final ateriormente calculado
    ?><h3><u>Precio Final</u></h3> <?php
    echo "<b>$total euros </b>";
}else{

    header('location: ./productos.php');
}
    //Creamos los botones para poder conectar con  las diferentes paginas
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <title>Carrito</title>
    </head>
    <body>
    
    <p>
    <table>
    <tr>
    <th>
    
        <a href="./pagar.php"><input type="submit" name="pagar" value="Pagar"></a>
    </th>
    <th>
        <a href="./productos.php"><input type="submit" name="cancelar" value="Seguir Comprando"></a>
    </th>
    <th>
        <a href="./logOut.php"><input type="submit" name="logout" value="Log Out"/></a>
    </th>
    </tr>
    </table>
        </fieldset>
        <?php

    
    
}
$conexion->close();
?>
    
</body>
</html>
