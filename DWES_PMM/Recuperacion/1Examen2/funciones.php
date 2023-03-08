<?php

/*Escribe aquí la función conectar, y todas aquellas que consideres oportunas para la realización del examen*/


function conectarBBDD(){

    if(empty($_POST) || !isset($_POST)){
        die("Error de conexion");

    }else{
        $host = $_POST['servidor'];
        $user = $_POST['usuario'];
        $pass = $_POST['contrasena'];
        $name = $_POST['basedatos'];
    }
    //Comprobar si la base de datos es incoorecta

    if(isset($_POST['basedatos']) && $_POST['basedatos'] === "productos_comerciales"){
        //Comprobar datos 
        if(isset($_POST['contrasena']) && !empty($_POST['contrasena'])){
            die("La contraseña es incorrecta");
            return false;
        }elseif(empty($_POST['servidor']) || (isset($_POST['servidor']) && !($_POST['servidor'] === 'localhost'))){
            die("El servidor es incorrecto");
            return false;
        }elseif(empty($_POST['usuario']) || (isset($_POST['usuario']) && !($_POST['usuario']) === 'root')){
            die('El usuario es incorrecto');
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
        return $conn;

}


?>