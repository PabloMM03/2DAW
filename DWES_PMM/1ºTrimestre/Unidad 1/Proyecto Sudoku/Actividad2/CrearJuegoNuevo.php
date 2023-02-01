<?php

/*Funcion crear nuevo juego.
    Lo comentado en esta funcion de creacion de niveles son los mismos, ya que se hace la misma operacion 3 veces 
    Lo unico que cambia es el tipo de nivel.
    */
          //Nivel Facil
          function crearJuego($antiguo,$nuevo,$nivel){

            switch($nivel){
              case "NivelFacil": //Indico de que tipo sera la fificultad
              echo '<div class ="sudokuNiveles" >'; //Style css para dar formato a los niveles
  
              echo '<table class  ="tablero">';//Style css para dar formato al tablero
              echo "<p>Facil</p>";
              for($i = 0; $i<9; $i++){//Se recorren las filas
                echo '<tr>';
                for($j = 0; $j<9; $j++){//Se recorren las columnas
                  //Se comprueba si la posicion del nuevo juego es igual al del antiguo, en cuyo caso se añadiria el numero
                  if(!empty($nuevo[$i][$j]) && $nuevo[$i][$j] == $antiguo[$i][$j]){
                    echo '<td class="numeros">' .$nuevo[$i][$j]. '</td>';
                    //En caso contrario se añadira un punto
                  }elseif(!empty($nuevo[$i][$j]) && $nuevo[$i][$j] != $antiguo[$i][$j]){
                    echo '<td class="punto">'.$nuevo[$i][$j]. '</td>';
                  }else{
                    echo '<td class="punto">.</td>';
                  }
                }
              }
              
              echo '</table>';
              echo '</div>';
              break;
            
          //Nivel Medio
  
            case "NivelMedio"://Indico de que tipo sera la fificultad
            echo '<div class ="sudokuNiveles" >';//Style css para dar formato a los niveles

            echo '<table class  ="tablero">';//Style css para dar formato al tablero
            echo "<p>Medio</p>";
            for($i = 0; $i<9; $i++){//Se recorren las filas
              echo '<tr>';
              for($j = 0; $j<9; $j++){//Se recorren las columnas
                 //Se comprueba si la posicion del nuevo juego es igual al del antiguo, en cuyo caso se añadiria el numero
                if(!empty($nuevo[$i][$j]) && $nuevo[$i][$j] == $antiguo[$i][$j]){
                  echo '<td class="numeros">' .$nuevo[$i][$j]. '</td>';
                  //En caso contrario se añadira un punto
                }elseif(!empty($nuevo[$i][$j]) && $nuevo[$i][$j] != $antiguo[$i][$j]){
                  echo '<td class="punto">'.$nuevo[$i][$j]. '</td>';
                }else{
                  echo '<td class="punto">.</td>';
                }
              }
            }
            
            echo '</table>';
            echo '</div>';
            break;
              
          //Nivel Dificil

            case "NivelDificil"://Indico de que tipo sera la fificultad
            echo '<div class ="sudokuNiveles" >';//Style css para dar formato a los niveles
            

            echo '<table class  ="tablero">';//Style css para dar formato al tablero
            echo "<p>Dificil</p>";
            for($i = 0; $i<9; $i++){//Se recorren las filas
              echo '<tr>';
              for($j = 0; $j<9; $j++){//Se recorren las columnas
                 //Se comprueba si la posicion del nuevo juego es igual al del antiguo, en cuyo caso se añadiria el numero
                if(!empty($nuevo[$i][$j]) && $nuevo[$i][$j] == $antiguo[$i][$j]){
                  echo '<td class="numeros">' .$juego[$i][$j]. '</td>';
                  //En caso contrario se añadira un punto
                }elseif(!empty($nuevo[$i][$j]) && $nuevo[$i][$j] != $antiguo[$i][$j]){
                  echo '<td class="punto">'.$nuevo[$i][$j]. '</td>';
                }else{
                  echo '<td class="punto">.</td>';
                }
              }
            }
            
            echo '</table>';
            echo '</div>';
            break;

          }
        }