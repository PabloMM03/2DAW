<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Departamentos - operaciones CRUD</title>
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
<h1>Actividad Trabajo con Archivos</h1>
<?php



 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);



$conexion = new mysqli('localhost', 'root', '',);

$error = $conexion->connect_errno;

if($error!=0){
    ?>
 <p>Error de Conexion  a la base de datos. Texto del error: <?php echo $conexion->connect_error;?> Vuelve en un ratito colega </p>;
<?php
exit();
}else{
  if(isset($_POST['reiniciar'])&& !empty($_POST['reiniciar'])){
    exec('cd /opt/lampp/htdocs/test_db-master && /opt/lampp/bin/mysql  -u root < employees.sql');
}
}

?>
<div class =mainContainer>
    <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="addContainer">
        <input type="submit" value="Reiniciar Base de Datos" name="reiniciar">
    </div>
    </form>
    </div>
    <?php
    $conexion->close();
    ?>
</body>
</html>