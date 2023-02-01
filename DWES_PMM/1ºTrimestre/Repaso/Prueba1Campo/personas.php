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



 $conexion = new mysqli('localhost', 'root', '', 'personas');

$error = $conexion->connect_errno;

if ($error != 0) {
?>
  <!-- Este es el HTML si hay error -->
  <p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?>  Vuelve en un ratito colega.</p>;
<?php 
     exit();
}else{
  //Este código se ejecuta si la conexión a la base de datos ha ido bien.
  //0.- Inicialización de variables

  $mensaje_error_cliente = '';
  
  //1.- Recogida y gestión de datos presentes en _POST

  if(isset($_POST)&&!empty($_POST)){
  //echo '<pre>'.print_r($_POST).'</pre>';

    if(isset($_POST['delete'])){
      //Aquí gestionamos el eliminar

      $clave = array_keys($_POST['delete']); //Array_keys obtiene un array cuyos valores son las claves del array pasado como parámetro (y sus claves son índices 0, 1, 2...)
      $clave = $clave[0];
      
      if(!$conexion->query('DELETE FROM personas WHERE id = \''.$clave.'\'')||($conexion->affected_rows == 0)){
        $mensaje_error_cliente = 'Se ha jodio el asunto colega';
      }

    }else if(isset($_POST['add_button'])){
      //Aquí gestionamos añadir
      //echo '<pre>'.print_r($_POST).'</pre>';
      
      insertarDatos($conexion);

      
        }else if(isset($_POST['update_button'])){
        //Aquí gestionamos el actualizar

        $resultado = $conexion->query('SELECT * FROM personas');
        $i= 0;

        while($datos = $resultado->fetch_array()){
            $dato[$i] = $datos['nombre'];
            $i++;
        }

        $query = 'UPDATE personas SET nombre = ? WHERE id = ?';
        $upgrade = $conexion->prepare($query);
        $nombres = $_POST['name'];

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
  
  //2.- Generación e impresión del formuilario
    //Me traigo todos los registros de la tabla departamento
    
    $resultado = $conexion->query('SELECT * FROM personas');
     
?>
  <div class="mainCointainer"> 
    <h1>Administracion de clientes</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       <div class="addContainer">
         <input type="submit" value="+" name="add_button"> <input type="text" value="" placeholder="Introduzca su nombre" name="clientes_nombre"> 
       </div>
       <div class="registrosContainer">
         <?php while($datos = $resultado->fetch_array()){?> 
<input type="submit" value="x" name="delete[<?php echo $datos['id']; ?>]"> <input type="text" value="<?php echo $datos['nombre']; ?>" name="name[<?php echo $datos['id']; ?>]"> <br>
         
         <?php } ?>
            
       </div>
       <div class="updateContainer">  
        <input type="submit" value="Actualizar registros" name="update_button"> <br>
        
       </div>
    </form>
  </div>
  <div class="error_message"><p>
    <?php echo $mensaje_error_cliente; ?>
  </p></div>
  <?php 
    $conexion->close();
  }?>
</body>
</html>