<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Main</title>
    </head>
    <body>
        <?php 
        if(isset($_POST['enviar'])){

            $nombre = $_POST['nombre'];
            $modulos = $_POST['modulos'];

            print "Nombre: " .$nombre."<br/>";

            foreach($modulos as $modulo){
                print "Modulo que cursa: " .$modulo."<br/>";
            }

        }
        else{
?>
             <form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                Nombre del Alumno:
                <input type="text" name="nombre"/><br/>
                <p>Modulos que cursa:<p>

                <input type="checkbox" name="modulos[]" value="DWES"/>
                Desarrollo Web en entorno servidor<br/>

                <input type="checkbox" name="modulos[]" value="DWEC"/>
                Desarrollo Web en entorno cliente<br/>

                <br/>

                <input type="submit" value="Enviar" name="enviar"/>

        </form>
        <?php
        }

    ?>
   </body>

</html>