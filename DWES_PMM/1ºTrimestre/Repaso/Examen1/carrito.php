<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['login'])){

    header('location: ./index.php');
    exit();

}else{

    require('./funciones.php');
    $conexion = conectarBBDD();

    if(isset($_SESSION['carrito'])){

        echo '<fieldset>';
        echo '<h2>Carrito de la Compra</h2>';

        echo '<table>';
        echo '<tr>';
        echo '<th>COD</th>';
        echo '<th>NOMBRE</th>';
        echo '<th>FAMILIA</th>';
        echo '<th>PRECIO</th>';
        echo '</tr>';

        $total = 0;

        foreach($_SESSION['carrito'] as $mostrarCampo){

            echo '<tr>';
                echo '<td>';
                    echo $mostrarCampo[0]; //COD
                echo '</td>';
                echo '<td>';
                    echo $mostrarCampo[1]; //Nombre
                echo '</td>';
                echo '<td>';
                    echo $mostrarCampo[2]; //Familia
                echo '</td>';
                echo '<td>';
                    echo $mostrarCampo[3]; //Precio
                echo '</td>';

                $_SESSION['pagar'] = $total = $total + $mostrarCampo[3];

        }
        echo "</table>";

    ?><h3><u>Precio Final</u></h3> <?php
    echo "<b>$total euros </b>";


    }else{
        header('location: ./productos.php');
    }


    ?>
    

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <title>Carrito</title>
    </head>
    <body>

    <table>

<tr>
    <th>
    <a href="./pagar.php"><input type="submit" name="pagar" value="Pagar"></a>
    </th>
    <th>
    <a href="./productos.php"><input type="submit" name="seguirCom" value="Seguir Comprando"></a>
    </th>
    <th>
    <a href="./logOut.php"><input type="submit" name="logout" value="Log Out"/></a>
    </th>
</tr>
</table>
</fieldset>;
 

    <?php
    }   
 ?>       
    </body>
    </html>

 