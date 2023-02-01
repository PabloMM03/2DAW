<?php

 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);


    session_start();
    if(isset($_SESSION['login'])){
        header('location: ./formularios.php');
        exit();
    }else{
        if(isset($_POST['user'])&& isset($_POST['password'])){   
            require './funciones.php';

            $conexion = conectarBBDD();

            $user = $_POST['user'];
            $password = $_POST['password'];
            $query = "SELECT * FROM usuarios WHERE usuario='$user' AND contrasena = '$password'";
            //Comprobar si imprime
            //echo $query;
            $resultado = $conexion->query($query);
                $datos = $resultado->fetch_assoc();
    
                if(!empty($datos)){
                        header('location: ./formularios.php');
                        $_SESSION['login'] = true;     
                }else{
                    echo '<h3>Usuario y contraseña erróneos</h3>';
                }
    
            
        }else{
    


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>
<body>
  
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
 
<fieldset>
<legend>Login</legend>
   <label for="User">Usuario</label>
   <input type="text" placeholder="Introduzca si nombre de usuario" value="" name="user"><br>
   <label for="password">Contraseña</label>
   <input type="text" placeholder="Contraseña" value="" name="password"><br>
   <input type="submit" value="Iniciar Sesion" name="enviar">
 
 
</fieldset>
</form>
 
 
</body>
</html>
<?php

} 

}
?>


