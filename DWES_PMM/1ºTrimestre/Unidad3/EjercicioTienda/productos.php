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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Productos</title>
</head>
<body>
<h1>Productos</h1>
<?php

require './funciones.php';
$conexion = conectarBBDD();

//Se comprueba el boton para vaciar carrito
if(isset($_POST['vaciar'])){
    unset($_SESSION['carritoCompra']);
}
//comprobar boton comprar para añadir producto
if(isset($_POST['añadirAlCarrito'])){
    //obtenemos los ids y hacemos una cosulta a la base de datos
    $codigoProducto = key($_POST['añadirAlCarrito']);
        $query = "SELECT * FROM producto WHERE cod = '$codigoProducto' ";
        $almacen = $conexion->query($query);
        $producto = $almacen->fetch_assoc();
    //Se crea un array con los datos del producto a añadir al carrito
            $nombreProd = $producto['nombre_corto'];
            $precioProd = $producto['PVP'];
            $familiaProd = $producto['familia'];
            $producto = array($nombreProd,$precioProd,$familiaProd);
    //añadimos el producto al carrito
    $_SESSION['carritoCompra'][$nombreProd] = $producto;

    //Comprobamos si el carrito está vacio, si es asi lo indicamos con un mensaje
}if((!isset($_SESSION['carritoCompra']) || (count($_SESSION['carritoCompra'])==0))){
    echo '<h4>El carrito está vacio,añada algún articulo</h4>';
    $carrito_vacio = true;
}else{//Si el carrito no está vacio, se muestra el articulo añadido
    foreach($_SESSION['carritoCompra'] as $nombres=> $producto){
        echo "<h4>Articulo añadido: $nombres</h4>";
        $carrito_vacio = false;
    }
}

?>

<?php


//Formularios con botones de diferentes partes de la página

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
echo "<table>";
  echo "<tr>";
  echo "<th>NOMBRE</th>";
  echo "<th>FAMILIA</th>";
  echo "<th>PRECIO</th>";
  echo "<th>AÑADIR</th>";
  echo "</tr>";


//Formulario para mostrar todos los productos, cada boton añadirAlCarrito tendrá el codigo de su producto
    $query = "SELECT * FROM producto";
    $resultado = $conexion->query($query);
    while($producto = $resultado->fetch_assoc()){
?>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">

<tr>
    <td><?php echo $producto['nombre_corto'];?></td>
    <td><?php echo $producto['familia'];?></td>
    <td><?php echo $producto['PVP'];?> euros</td>
    <td><input type="submit" name="añadirAlCarrito[<?php echo $producto['cod']?>]" value="Añadir al Carrito"/></td>
</tr>

</form>

   <?php
   
   }
   
   
    }
    $conexion->close();
   ?>
</body>
</html>