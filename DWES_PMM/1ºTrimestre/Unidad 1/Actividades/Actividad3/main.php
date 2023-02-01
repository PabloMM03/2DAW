<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Minutos</title>
  </head>
  <body>
    <h2>Introduce el presupuesto: </h2>

    <?php
//Actividad 3:Introduce  minutos devulve coste(precio)
//Si la llamada dura menos de 5 mins coste 20 cent 
//Cada min extra a partir del 5 se suman 5 cents
    
    //Declaramos variables que utilizaremos
  $minimo =5;
  $precio = 20;

if(isset($_POST['enviar'])){

    $mins= $_POST['mins'];
//Imprimimos los minutos ingresados.
    print "Ha llamado: " .$mins.  " minutos <br/>";
    //Comprobamos que si los minutos ingresados son <= al minimo(5) el precio será de 20 cent.
    if($mins<=$minimo){
      print "Coste: " .$precio. " centimos <br/>";
//Comprobamos que esi los minutos ingresados son mayor al(minimo) 5, cada minuto superior se le suman
 //5 centimosal precio final.

    }elseif ($mins>5) {
      $mins = $mins - $minimo;
      $precio = $precio + $mins * $minimo;
      print "Coste:" .$precio. " centimos <br/>";
    }
      
    
}else{
  //Creamos el formulario
  ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" input="text">

Minutos:
<input type="text" name="mins"/><br>

<input type="submit" name="enviar" value="Enviar">
</form>

<?php
}
?>
</body>

</html>

