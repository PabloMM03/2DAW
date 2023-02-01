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

    if(isset($_SESSION['pagar'])){

        unset($_SESSION['carrito']);
        ?><h2>Pagar</h2><?php
   
        $total = $_SESSION['pagar'];
        echo "<h4>Gracias por su compra de  $total € </h4>";
        

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <title>Pagar</title>
    </head>
    <body>

    <table>
<tr>
    <th>
    <label for="seguir">Quieres seguir comprado</label>
    <a href="./productos.php"><input type="submit" name="seguirCom" value="Seguir Comprando"></a>
    </th>
    <th>
    <a href="./logOut.php"><input type="submit" name="logout" value="Log Out"/></a>
    </th>
</tr>
</table>
        
<?php

}


}
?>
    </body>
    </html>


