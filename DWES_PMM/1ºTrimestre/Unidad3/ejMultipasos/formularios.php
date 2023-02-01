<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['login'])){
    header('location: ./login.php');
    exit();
}else{

    require './funciones.php';
    $conexion = conectarBBDD();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Formulario</title>
</head>
<body>


<?php

    if(!isset($_SESSION['productos'])){

        $query = "SELECT * FROM producto LIMIT 4";
        
        $datos = $conexion->query($query);
        $_SESSION['productos'] = $datos;

        $_SESSION['pasos'] =1;

    }
        while($producto =$datos->fetch_assoc()){


?>
<fieldset>
<table>
    <tr>
     <th>
        <form action="./logOut.php" method="POST">
        <input type="submit" name="logout" value="Log Out"/></form>
     </th>
    </tr>
</table>
<br>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php
            if(isset($_SESSION['pasos'])){
                $pasos = $_SESSION['pasos'];
                switch($pasos){
                    case 1:
                        $producto1 =  print_r($producto['nombre_corto']);
                        echo '<br>';
                        $precio = print_r($producto['PVP']);
                        echo '<br>'; 
                }
                
                if(isset($pasos)&& $pasos!=1){
                    ?><input type="button" name="atras" value="Atrás"><?php
                }
            }
            
        
       ?>
       <label for="pregunta">¿Quieres este producto?</label>
                    <label for="si">Si<input type="checkbox" name="yes" value="Si"></label>
                    <label for="no">No<input type="checkbox" name="no" value="No"></label><br>
                    <label for="pregunta">¿Cuanta cantidad quieres?</label>
                    <input type="number" name="cantidad" value="0">  
       </form>
    </fieldset>
<?php
}
}
?>
</body>
</html>