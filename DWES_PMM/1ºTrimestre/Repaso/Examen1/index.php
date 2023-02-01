<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_SESSION['login'])){
    header('location: ./productos.php');
    exit();
}else{

    if(isset($_POST['user'])&& isset($_POST['password'])){

        require('./funciones.php');
       $conexion = conectarBBDD();

        $user = $_POST['user'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM usuarios WHERE usuario ='$user' AND contrasena ='$pass' ";
        $resultado = $conexion->query($query);
        $datos = $resultado->fetch_assoc();

        if(!empty($datos)){
            header('location: ./productos.php');
            $_SESSION['login'] = true;
        }else{
            echo '<p> Error en la conexion, usuario y contraseña no reconocidos</p>';
        }

}else{



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Index</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<fieldset>
    <legend>LOG IN</legend>
    <label for="User">Usuario</label>
        <input type="text" name="user" placeholder="Introduzca su usuario"><br>
        <label for="Passw">Contraseña</label>
        <input type="text" name="password" placeholder="Contraseña"><br>
        <input type="submit" name="loguear" value="Iniciar Sesión">
</fieldset>
    </form>


</body>
</html>

<?php
}

}
?>