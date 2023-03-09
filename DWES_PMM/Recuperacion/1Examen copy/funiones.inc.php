<?php
/*Escribe aquí la función conectar, y todas aquellas que consideres oportunas para la realización del examen*/

function conectarBBDD(){

    if(empty($_POST)|| !isset($_POST)){
        die("Los datos no son correctos");

    }else{
        $host = $_POST['servidor'];
        $user = $_POST['usuario'];
        $pass = $_POST['contrasena'];
        $name = $_POST['basedatos'];
    }


    if(isset($_POST['basedatos']) && $_POST['basedatos'] === 'productos_comerciales'){

        if(!empty($_POST['contrasena']) && isset($_POST['contrasena'])){
            die("La contraseña es incorrecta");
            return false;
        }elseif(empty($_POST['servidor']) || (isset($_POST['servidor']) && !($_POST['servidor']) === 'localhost')){
            die("El servidor es incorrecto");
            return false;
        }elseif(empty($_POST['usuario'])||(isset($_POST['usuario']) && !($_POST['usuario']) == 'root')){
            die("El usuario es incorrecto");
            return false;
        }else{

            $conn = new mysqli($host, $user, $pass, $name);
            if(!$conn){
                die("Los datos son incorrectos");
                return false;
            }else{
                return true;
            }
        }
    
    }else{
        die("La base de datos no existe");
        return false;
    }
    

}

function conectar(){

    $host = $_POST['servidor'];
    $user = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    $name = $_POST['basedatos'];

    $conn = new mysqli($host, $user, $pass, $name);
    $error = $conn->connect_errno;

        if($error !=0){
            $mensaje_error = "Error en la conexion";
            echo $mensaje_error;
        }else{
            return $conn;
        }
}




?>
