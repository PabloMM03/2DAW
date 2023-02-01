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

    if(isset($_POST['guardar'])){

        $id = getPrimaryKey($conexion);
       $nombre = $_POST['nombre'];
       $familia = $_POST['famil'];
       $money = $_POST['money'];
      
      if(!$conexion->query("INSERT INTO producto (cod,nombre_corto,familia,PVP) VALUES ('$id,$nombre,$familia,$money')")){
        $mensaje_error_cliente = 'Houston tenemos un problema, el mensaje de error es:'.$conexion->error;
      }else{
        $mensaje_error_cliente = 'Todo bien';
      }
    }if(isset($_POST['volver'])){
        header('location: ./productos.php');
    }
    //TODO: hacer funcionar añadir nuevo y eliminar
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Añadir Nuevo</title>
    </head>
    <body>
        
    

    <fieldset>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="nombre" placeholder="Introduzca el nombre"><br>
        <input type="text" name="famil" placeholder="Familia"><br>
        <input type="text" name="money" placeholder="Precio"><br>
        <input type="submit" name="añadir" value="Guardar">
        <input type="submit" name="volver" value="Volver Atrás">

    </form>
    </fieldset>

    </body>
    </html>
<?php


}
