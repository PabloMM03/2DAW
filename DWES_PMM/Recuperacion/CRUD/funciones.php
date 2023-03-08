<?php


// function conectarBBDD(){
//     if(empty($_POST) || !isset($_POST)){
//         die("Error en la conexion, los datos no son correctos");
//     }else{
//         $host = $_POST['servidor'];
//         $user = $_POST['usuario'];
//         $pass = $_POST['contrasena'];
//         $name = $_POST['basedatos'];
//     }

//     if(isset($_POST['basedatos']) && $_POST['basedatos'] === 'personas'){
//         if(!empty($_POST['contrasena']) && isset($_POST['contrasena'])){
//             die("Error, contraseña incorrecta");
//             return false;
//         }elseif(empty($_POST['servidor']) || (isset($_POST['servidor']) && !($_POST['servidor']) === 'localhost')){
//             die("Error, el servidor es incorrecto");
//             return false;
//         }elseif(empty($_POST['usuario'])|| (isset($_POST['usuario']) && !($_POST['usuario']) === 'root')){
//             die("Error, el usuario es incorrecto");
//             return false;
//         }else{

//             $conn = new mysqli($host, $user, $pass, $name);
//             if(!$conn){
//                 die("Error, los datos son incorrectos");
//                 return false;
//             }else{
//                 return true;
//             }
//         }
//     }else{
//         die("La base de datos no existe");
//         return false;
//     }
// }


// function conectar(){

//         $host = $_POST['servidor'];
//         $user = $_POST['usuario'];
//         $pass = $_POST['contrasena'];
//         $name = $_POST['basedatos'];

//         $conn = new mysqli($host, $user, $pass, $name);
//         return $conn;

// }


function insertarDatos($conn){
        // Se obtiene un nuevo valor para la clave primaria
    $id = getPrimaryKey($conn);

        // Se prepara la consulta INSERT y se vinculan los parámetros
    $query = "INSERT INTO personas(id,nombre) VALUES (?,?)";

    $insert = $conn->prepare($query);
    $insert->bind_param("ss",$id, $_POST['clientes_nombre']);
    $insert->execute();

}

function getPrimaryKey($conn){

    $claves = $conn->query("SELECT id FROM personas ORDER BY id DESC");

    $clave = $claves->fetch_array();

    $claveID = $clave[0];
    $claveID = $claveID + 1;
    
    return $claveID;
}




?>