<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actividad4</title>
  </head>
  <body>
    <h2>Calculo de fecha y hora: </h2>

    <?php
//Pedir fecha de hoy, otra fecha de un vuelo(u otro dia) y calcular cuanto queda para que llegue ese dia.


if(isset($_POST['enviar'])){

  $fechaactual = new DateTime($_POST['fechaActual']);
  $fechasalida = new DateTime( $_POST['fechaSalida']);
  $diff = $fechaactual ->diff($fechasalida);

  $horaactual = new DateTime ($_POST['horaActual']);
  $horasalida = new DateTime ($_POST['horaSalida']);
  $diff1 = $horaactual ->diff($horasalida);


  
 // $fechaEntero = strtotime($fechaactual);
  //$fechaEntero1 = strtotime($fechasalida);
//dias
  //$dia = date("d", $fechaEntero);
  //$diaSalida =date("d", $fechaEntero1);
//meses
//$mes = date("m", $fechaEntero);
//$mes1 = date("m", $fechaEntero1);
//años
//$año = date("y", $fechaEntero);
//$año1 = date("y", $fechaEntero1);




  
  
print "Faltan: " .$diff->days . " dias y " .$diff1->hours . " horas para coger tu vuelo. <br/>";
//print "Faltan: " .$diasDiferencia. " Dias y " .$horasDiferencia. " Horas.<br/>";  

}else{
    ?>
      <form input="text" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

    <p>Introduzca fecha y hora actual</P>
      Fecha Actual:
        <input type="date" name="fechaActual" required pattern ="\d{4}-\d{2}-\d{2}"></br>
        <span class="validity"></span>
      Hora Actual: 
        <input type="time" name="horaActual" required="1"><br/>

        <p>Introduzca fecha y hora de salida</p>
        Fecha Vuelo:
        <input type="date" name="fechaSalida" required pattern ="\d{4}-\d{2}-\d{2}"></br>
        <span class="validity"></span>
      Hora Salida:
        <input type="time" name="horaSalida" required ="1"><br/>

        <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="Borrar" value="Borrar"> 
</form>
    <?php
}


    ?>
</body>

</html>