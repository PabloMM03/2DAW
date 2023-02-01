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

    $mensaje_error = '';

    if(isset($_POST['vaciar'])){
        unset($_SESSION['carrito']);

     } if(isset($_POST['eliminar'])){

            $clave = array_keys($_POST['eliminar']);
            $clave = $clave[0];
            
            $query = $conexion->query('DELETE FROM producto WHERE cod = \''.$clave.'\'');
                
            }if(isset($_POST['comprar'])){

                $cod = key($_POST['comprar']);
                 $query = "SELECT * FROM producto WHERE cod ='$cod' ";
                 $almacen = $conexion->query($query);
                 $producto = $almacen->fetch_assoc();

                 $codProd = $producto['cod'];
                 $nombreProd = $producto['nombre_corto'];
                 $familiaProd = $producto['familia'];
                 $precioProd = $producto['PVP'];

                 $producto = array($codProd, $nombreProd, $familiaProd, $precioProd);
                 $_SESSION['carrito'][$nombreProd] = $producto;

            }if(isset($_POST['actualizar'])){

                $resultado = $conexion->query("SELECT * FROM producto");
                $names = $_POST['precio'];
      //$ids Obtiene todos los campos ids 
      $ids = array_keys($_POST['precio']);

      //Bucle while que nos permitira guardar los nombres de los departamentos de la BBDD

      $i = 0;
      while($producto = $resultado->fetch_assoc()){
        $countDep[$i]= $producto['PVP'];
        $i++;
      }

      //Sentencia para hacer el update 
      $query = 'UPDATE producto SET PVP = ? WHERE cod = ?';
      $upgrade =$conexion->prepare($query);

      foreach($names as $name){

      for($j = 0; $j < $i; $j++){
        if($name == $names[$ids[$j]]){
          $id = $ids[$j];
          $resultado = $upgrade->execute([$name,$id]);
        }
      }
    }
                 
                 
        }if(!isset($_SESSION['carrito'])|| (count($_SESSION['carrito']) == 0)){
            echo '<h4>El carrito está vacio Bro</h4>';
            $carrito_vacio = true;
         }else{
            foreach($_SESSION['carrito'] as $nombres =>$producto){
                echo "<h4>Se ha añadido el producto' $nombres' al carrito</h4>";
                $carrito_vacio = false;
            }
         }
         
    
?>

<table>

    <tr>
        <th>
        <a href="./carrito.php"><input type="submit" name="carrito" value="Ir al Carrito"></a>
        </th>
        <th>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="submit" name="vaciar" value="Vaciar Carrito"></form>
        </th>
        <th>
        <a href="./logOut.php"><input type="submit" name="logout" value="Log Out"/></a>
        </th>
    </tr>
</table>

    <?php


    echo '<table>';
        echo '<tr>';
        echo '<th>COD</th>';
        echo '<th>NOMBRE</th>';
        echo '<th>FAMILIA</th>';
        echo '<th>PRECIO</th>';
        echo '</tr>';



    $query = 'SELECT * FROM producto';
    $resultado = $conexion->query($query);
   

    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Productos</title>
</head>
<body>

    <td><a href="./añadirNuevo.php"><input type="submit" name="" value="Añadir Nuevo"></a></td>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <?php while($producto = $resultado->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $producto['cod']; ?></td>
            <td><?php echo $producto['nombre_corto']; ?></td>
            <td><?php echo $producto['familia']; ?></td>
            <td><input type="text" name="precio[<?php echo $producto['cod']; ?>]" value="<?php echo $producto['PVP']; ?>€"></td>
            <td><input type="submit" name="comprar[<?php echo $producto['cod'];?>]" value="Añadir al Carrito"></td>
            <td><input type="submit" name="eliminar[<?php echo $producto['cod'];?>]" value="X"></td> 
        </tr>
        <?php } ?>
        <td><input type="submit" name="actualizar" value="Actualizar"></td>
    </form>
    
    <?php
    

    }
    $conexion ->close();
    ?>
</body>
</html>