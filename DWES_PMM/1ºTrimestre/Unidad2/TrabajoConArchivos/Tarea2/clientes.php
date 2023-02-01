<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

        require './funciones.php';

    // Nos conectamos con la Base de Datos
    $conexion = new mysqli('localhost', 'root', '', 'clientes');
    $error = $conexion->connect_errno;
    if ($error != 0) {
        // Si hay error al conectarme con la base de datos
      echo  "<p>Error de conexión a la base de datos. Texto del error: <?php echo $conexion->connect_error; ?></p>";
      exit();

    } else {

        //Gestionamos Añadir perfil, requiriendo la funcion creada en funciones.php
        if (isset($_POST['añadir'])) {

            insertarDatos($conexion);   
        }

        // Gestionamos Modificar perfil
        if (!empty($_GET['modificar'])) {

            $clave = array_keys($_GET['modificar']);
            $clave = $clave[0];  
           
    ?>
            
                <?php

                // Seleccionamos el array para recorrerlo
                $query = "SELECT * FROM clientes WHERE id = $clave ";
                $resultado = $conexion->query($query);
                $datos = mysqli_fetch_assoc($resultado);

                ?>
            <div class="alinear">
       
                <?php 
                //Formulario de Modificacion de perfiles

                echo '<form action="'.$_SERVER['PHP_SELF'].'?id='.$clave.'" method="post" enctype="multipart/form-data" > ';  ?>
                <fieldset>
                <img src="./perfiles/<?php echo $datos['imagen']; ?>" class="imagen1"> <b><?php echo $datos['nombre'] ?></b><br>
                <input type="file" name="imagen_Cliente"  /></p>
                <a href='clientes.php'><input type ="submit" value="Volver Atrás"></a>
                <input type="submit" name="actualizar" value="Actualizar Cambios" /></p>
                <input type="submit" name="eliminar[<?php echo $datos['id']; ?>]" value="Eliminar Perfil" /></p>
                </fieldset>
                <?php echo '</form>' ?>                
        </form>

            </div>

        <?php
        
        } else {
          //Gestionamos actualizar un perfil
            if (!empty($_POST['actualizar'])) {
                //añadimos la nueva imagen con la funcion creada anteriormente en funciones.php
                $id = $_GET['id'];
                nuevaImagen($id);
            }
            //Gestionamos el eliminar un perfil
            if(!empty($_POST['eliminar'])){

                $clave = array_keys($_POST['eliminar']);
                $clave = $clave[0];

                $conexion->query('DELETE FROM clientes WHERE id = \''.$clave.'\'');
            }
             
        ?>  
           
            <?php

            // Seleccionamos el array para recorrerlo
            $query = "SELECT * FROM clientes ";
            $resultado = mysqli_query($conexion, $query);

            //Formulario creacion de clientes
            ?>
 
                 <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                 
            <div class="alinear">
                <img src="./perfiles/Default.jpg" class="imagen1"><br>
                <input type="file" name="imagen_Cliente" /><br>
                <input type="text" name="nombre_Cliente" placeholder="Introduce tu nombre" required/>
                <input type="submit" name="añadir" value="Añadir Cliente" /></p>
           
            </div>
            </form>
                    <?php 
                    //Formulario Modificar Imagen
                    while ($datos = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>?id=<?php $datos['id']; ?>" enctype="multipart/form-data">
                        <input type="image"  src="./perfiles/<?php echo $datos['imagen']; ?>"  name="modificar[<?php echo $datos['id']; ?>]" class="imagenes1">     
                        </form>
                    <?php
                    }
                    
        }
    }
    $conexion->close();
            ?>

</body>

</html>