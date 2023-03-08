<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Personas - operaciones CRUD</title>
    <style>
      .mainContainer{
        margin:auto;
      }
      .registrosContainer{
        border-right: solid 1px black;
        display: inline-block;
        margin: 1rem;
        padding: 0.5rem;
      }
      .updateContainer{
        margin: 1rem;
        display:inline-block;
      }
      .error_message{
        color: red;
      }
    </style>
  </head>
   
<body>

<?php

require_once ('funciones.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$conn = new mysqli('localhost', 'root', '', 'personas');

$error = $conn->connect_errno;

if ($error != 0) {
?>
  <!-- Este es el HTML si hay error -->
  <p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?>  Vuelve en un ratito colega.</p>;
<?php 
     exit();
}else{

    $mensaje_error_cliente = '';

if(isset($_POST) && !empty($_POST)){

    if(isset($_POST['add_button'])){

        insertarDatos($conn);

    }elseif(isset($_POST['delete'])){
        $clave = array_keys($_POST['delete']);
        $clave = $clave[0];


        if(!$conn->query('DELETE FROM personas WHERE id = \''.$clave.'\'')||($conn->affected_rows === 0)){
            $mensaje_error_cliente = 'Se ha jodio el asunto colega';
        }
    }elseif(isset($_POST['update_button'])){

        $resultado = $conn->query("SELECT * FROM personas");
        $i =0;

        while($datos = $resultado->fetch_array()){
            $dato[$i] = $datos['nombre'];
            $i++;
        }
        $ids = array_keys($_POST['name']);

        foreach($nombres as $nombre){
            for($j = 0; $j<$i; $j++){
            if(($nombre == $nombres[$ids[$j]]) && ($dato[$j]!=$nombre)){
                $id = $ids[$j];
                $upgrade->bind_param("ss",$nombre,$id);
                $upgrade->execute();
          }
        }
      }
    }
    
}







$resultado = $conn->query('SELECT * FROM personas');
?>


<div class="mainContaier">

<h1>Administracion de clientes</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="addContainer">
        <input type="submit" name="add_button" value="+"> <input type="text" name="clientes_nombre" placeholder="Introduzca el nombre"> <input type="text" name="clientes_apellidos" placeholder="Introduzca los apellidos">
    </div>

    <div class="registrosContainer">
    <?php while($datos = $resultado->fetch_array()){?> 
        <input type="submit" name="delete[<?php echo $datos['id'];?>]" value="X"><input type="text" value="<?php echo $datos['nombre'];?>" name="name[<?php echo $datos['id'];?>"><br>

        <?php }?>
    </div>

    <div class="updateContainer">
        <input type="submit" value="Actualizar" name="update_button"><br>
    </div>
</form>
</div>

<div class="error_message"><p>
    <?php echo $mensaje_error_cliente; ?>
  </p></div>
  <?php 
    $conn->close();
}?>

</body>
</html>