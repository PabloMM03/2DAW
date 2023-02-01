<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

    if(!isset($_SESSION['login'])){
        header('location: ./login.php');
        exit();
    }else{

        require('./functions.php');
        $conexion = conectar();

        ?>
        <fieldset>
        <h2>Carrito de la compra</h2>
        <?php

        if(!empty($_SESSION['carritoCompra'])){

            echo '<table>';
                echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>NOMBRE</th>';
                    echo '<th>FAMILIA</th>';
                    echo '<th>PRECIO</th>';
                echo '</tr>';

                $total =0;
            foreach($_SESSION['carritoCompra'] as $mostrarCampo){

                echo '<tr>';
                    echo '<td>';
                        echo $mostrarCampo[0]; //ID
                    echo '</td>';
                    echo '<td>';
                        echo $mostrarCampo[1]; //nombre
                    echo '</td>';
                    echo '<td>';
                        echo $mostrarCampo[3]; //Familia
                    echo '</td>';
                    echo '<td>';
                        echo $mostrarCampo[2]; //Precio
                    echo '</td>';

                    $_SESSION['pagar'] = $total = $total + $mostrarCampo[2];
            }

            echo '</table>';
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
            <title>Document</title>
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

    
