<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Sudoku</title>
</head>
<body>
<div class="nombreJuego">
    <h2>CuadriculasXFilasXColumnas</h2> 
    </div>

    <div id="logotipo">
    <img src="https://image.shutterstock.com/image-vector/sudoku-vector-lettering-name-game-260nw-1717953703.jpg" width ="200" height="100"
    alt="">
    </div>
    <?php
            require './Sudokus.php';
            require './GeneraFunci.php'; 

      for ($i=0; $i < 9; $i++) { 
       for ($j=0; $j < 9; $j++) { 
        
            //Se llaman a las funciones creadas para calcular su correspondiente fila, columna y cuadro.
            //Y se le añade un formato para que se imprima bien.
            $Calcularcuadro=CalcularCuadro($i, $j);

            $CalcularfilaInicial=CalcularFilaInicial($i, $j);
            $CalcularcolumnaInicial=CalcularColumnaInicial($i, $j);

            $CalcularfilaFinal=CalcularFilaFinal($i, $j);
            $CalcularcolumnaFinal=CalcularColumnaFinal($i, $j);

            print $i.",".$j." - " .$Calcularcuadro." (" .$CalcularfilaInicial. ", " .$CalcularcolumnaInicial. ") - (" .$CalcularfilaFinal. ", " .$CalcularcolumnaFinal. ") | ";
         }
            print "</br>";
     }

    ?>
</body>
</html>