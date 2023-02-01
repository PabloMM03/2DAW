<?php 
    /*
    Lo comentado en estas tres funciones de creacion de niveles son los mismos, ya que se hace la misma operacion 3 veces 
    Lo unico que cambia es el tipo de nivel.
    */
   function creacionNivelFacil($arraySudoku,$nivel){

    
      //Nivel Facil

        $nivel= "NivelFacil"; //Indico de que tipo sera la dificultad.
        echo '<div class="sudokuNiveles">'; //Style css para dar forma a los niveles.
        
        
        echo '<table class="tablero">'; //Style  css para dar forma al tablero
        echo "<p>Fácil</p>";    
        for($i = 0; $i < 9; $i++){//Recorro las filas
          echo '<tr>';
          for($j = 0; $j < 9; $j++){//Reccorro las columnas
            //Se comprueba que la posicion esta vacia, si es asi se coloca un numero.Si no pues un punto.
            if(!empty($arraySudoku[$i][$j])){
              echo '<td class="numeros">' .$arraySudoku[$i][$j]. '</td>';//Añadir  numeros y que sean rojos con css
            }else{
              echo '<td class="punto">.</td>';//Añadr un punto y que sea azul con css
            }
          }
        }
        echo '</table>';
        echo '</div>';
       
    }
    function creacionNivelMedio($arraySudoku,$nivel){
        //Nivel Medio

        $nivel= "NivelMedio";
          echo '<div class="sudokuNiveles">';
         
          
          echo '<table class="tablero">';
          echo "<p>Medio</p>";
          for($i = 0; $i < 9; $i++){
            echo '<tr>';
            for($j = 0; $j < 9; $j++){
              //Se comprueba que la posicion esta vacia, si es asi se coloca un numero.
              if(!empty($arraySudoku[$i][$j])){
                echo '<td class="numeros">' .$arraySudoku[$i][$j]. '</td>';
              }else{
                echo '<td class="punto">.</td>';
              }
            }   
          }
          echo '</table>';
          echo '</div>';
         
        }
          //Nivel Dificil

          function creacionNivelDificil($arraySudoku,$nivel){
          $nivel= "NivelDificil";
            echo '<div class="sudokuNiveles">';
           
            
             echo '<table class="tablero">';
            echo "<p>Dificil</p>";
            for($i = 0; $i < 9; $i++){
              echo '<tr>';
              for($j = 0; $j < 9; $j++){
                //Se comprueba que la posicion esta vacia, si es asi se coloca un numero.
                if(!empty($arraySudoku[$i][$j])){
                  echo '<td class="numeros">' .$arraySudoku[$i][$j]. '</td>';
                }else{
                  echo '<td class="punto">.</td>';
                }
              }   
            }
            echo '</table>';
            echo '</div>';
           

        }
        /*Por hacer
        Crear Metodo insertar,eliminar numero en o de  posicion indicada.
        Metodo para mostrar candidatos a posibles numeros para colocar.
        */
        
        //Funcion la cual inserta un  numero en la posicion indicada.

        function Insertar($antiguo,$nuevo,$fila,$columna,$numero){
          //Comprueba que la posicion indicada en el juego antiguo esta vacia, si es asi se inserta en esa posicion el numero.
          //En caso contrario salta un error.
          if(empty($antiguo[$fila][$columna]))
          {$nuevo[$fila][$columna]=$numero;}
          else{
             echo '<h3><div class="alerta"> Alert :</div></h3>'; 
             echo '<h4><div class="errores">No se puede introducir un numero en una casilla ocupada por defecto.</div></h4></br>';
             
          }
          return $nuevo;
          
        }

        //Funcion la cual elimina un numero de la posicion indicada.
        function eliminar($antiguo,$nuevo,$fila,$columna,$numeroEliminado){

          if(empty($antiguo[$fila][$columna])){
            //Se comprueba si la posicion esta vacia y si el numero introducido en la posicion indicada se puede eliminar,
            //si es asi se elimina si no salta un error.
            if(!empty($nuevo[$fila][$columna]) && $nuevo[$fila][$columna] != $numeroEliminado){
                echo '<h3><div class="alerta"> Alert :</div></h3>'; 
                echo '<h4><div class="errores"> En la posicion indicada no se encuentra dicho numero.</div></h4></br>';
            }else if(!empty($nuevo[$fila][$columna]) && $nuevo[$fila][$columna] == $numeroEliminado){
              $nuevo[$fila][$columna]= 0;
            }else{
              echo '<h3><div class="alerta"> Alert :</div></h3>'; 
              echo '<h4><div class="errores"> En esa posición no se encuentra ningun numero.</div></h4></br>';
            }
          }else{
            echo '<h3><div class="alerta"> Alert :</div></h3>'; 
            echo '<h4><div class="errores"> No se puede eliminar una posicion por defecto.</div></h4></br>';
          }
          
          return $nuevo;

        }
       
        /*
        Por hacer 
            Funciones: 
        Calcular cuadro, 
        Calcular fila inicial, 
        Calcular fila final, 
        Calcular columna inicial, 
        Calcular columna final
        */           

/*    
Calcular cuadro.
Se exige realizarlo usando estructuturas de control de tipo if.
Dada una fila y columna, debe devolver el cuadro al que pertenece. Los cuadros se numeran de la siguiente forma:
Ejemplo: 0 para las celdas 0,0 a 2,2
*/
    function CalcularCuadro($fila, $columna) {
    

        if (($columna==0||$columna==1||$columna==2)&& ($fila==0||$fila==1||$fila==2)) {return 0;} 
        else if(($columna==3||$columna==4||$columna==5)&&($fila==0||$fila==1||$fila==2)){return 1;}
        else if(($columna==6||$columna==7||$columna==8)&&($fila==0||$fila==1||$fila==2)){return 2;}
        else if(($columna==0||$columna==1||$columna==2)&&($fila==3||$fila==4||$fila==5)){return 3;}
        else if(($columna==3||$columna==4||$columna==5)&&($fila==3||$fila==4||$fila==5)){return 4;}
        else if(($columna==6||$columna==7||$columna==8)&&($fila==3||$fila==4||$fila==5)){return 5;}
        else if(($columna==0||$columna==1||$columna==2)&&($fila==6||$fila==7||$fila==8)){return 6;}
        else if(($columna==3||$columna==4||$columna==5)&&($fila==6||$fila==7||$fila==8)){return 7;}
        else if(($columna==6||$columna==7||$columna==8)&&($fila==6||$fila==7||$fila==8)){return 8;
      }

      }


      //Funcion la cual comprueba los numeros candidatos a poner en la posicion indicada.
      function candidatos($antiguo,$nuevo, $fila, $columna){
        echo '<div class = "candidatos">';
        /*
        Comprobamos si la posicion esta vacia en dicho caso se imprimirian los candidatos, 
        en caso de que no este vacia saltara un error.
        */
        if(empty($nuevo[$fila][$columna]) && 
            $nuevo[$fila][$columna]!=$_POST['numeroAIntroducir']){
            //Con Range creamos una matriz entre dos elementos, en este caso dos numeros.
            $tresXtres = range(1,9); 
                //Con array_diff calculamos la diferencia entre las dos matrices,$tresXtres y $nuevo[X] ya sea fila o columna.
                $numerosFilas = array_diff($tresXtres,$nuevo[$fila]);
                $numerosColumnas = array_diff($tresXtres,$nuevo[$columna]);
                if($numerosFilas != $numerosColumnas || $numerosColumnas != $numerosFilas){
                     //Con array_Merge combinamos los elementos de uno o mas array.
                $totalCandidatos = array_merge($numerosFilas,$numerosColumnas);
                //Mostramos el tipo de variable y el contenido.
            $imprimir = print("<pre>" .print_r( $totalCandidatos, true). "</pre>");
            //posible opcion para imprimir
            //var_dump($totalCandidatos);
                }else{
                    print("<pre>" .print_r( $numerosColumnas, true). "</pre>");
                }
               
        }else{
            echo '<h3><div class="alerta"> Alert :</div></h3>'; 
            echo '<h4><div class="errores"> No hay candidatos a añadir en esa posicion,ya que esta ocupada.</div></h4>';
            
        }
        echo '</div>';

     }
/*
Calcular fila inicial de un cuadro. Se exige realizarlo usando estructuras de control de tipo switch.
Dado un índice a un cuadro, calcula la fila de su primera celda.
Funcion calcular fila inicial. Retornaria la primera fila del cuadro en el que se encuentra.
*/
function CalcularFilaInicial($fila, $columna){
    switch (CalcularCuadro($fila, $columna)) {
    case 0: return 0;   
    break;
    case 1: return 0;   
    break;
    case 2: return 0;   
    break;
    case 3: return 3;  
    break;
    case 4: return 3;   
    break;
    case 5: return 3;   
    break;
    case 6: return 6;   
    break;
    case 7: return 6;   
    break;
    case 8: return 6;   
    break;
    default:  
    break;
    }
}
/*
Calcular columna inicial de un cuadro. Se exige realizarlo usando estructuras de control de tipo switch.
Dado un índice a un cuadro, calcula la columna de su primera celda.
Funcion calcular columna inicial.Retornaria la primera columna del cuadro en el que se encuentra.
*/
function CalcularColumnaInicial($fila, $columna) {
    switch (CalcularCuadro($fila, $columna)) {
    case 0: return 0;
    break;
    case 1: return 3;
    break;
    case 2: return 6;
    break;
    case 3: return 0;
    break;
    case 4: return 3;
    break;
    case 5: return 6;
    break;
    case 6: return 0;
    break;
    case 7: return 3;
    break;
    case 8: return 6;
    break;
    default:    
    break;
    }
}
/*
Calcular fila final de un cuadro. Se exige realizarlo usando estructuras de control de tipo switch.
Dado un índice a un cuadro, calcula la fila de su última celda.
Funcion calcular fila final.Retornaria la ultima fila del cuadro en el que se encuentra.
*/
function CalcularFilaFinal($fila, $columna) {
    switch (CalcularCuadro($fila, $columna)) {
    case 0: return 2;
    break;
    case 1: return 2;
    break;
    case 2: return 2;
    break;
    case 3: return 5;
    break;
    case 4: return 5;
    break;
    case 5: return 5;
    break;
    case 6: return 8;
    break;
    case 7: return 8;
    break;
    case 8: return 8;
    break;
    default:    
    break;
    }
}
/*
Calcular columna final de un cuadro. Se exige realizarlo usando estructuras de control de tipo switch.
Dado un índice a un cuadro, calcula la fila de su última celda.
Funcion calcular columna final.Retornaria la ultima columna del cuadro en el que se encuentra. 
*/
function CalcularColumnaFinal($fila, $columna){
    switch (CalcularCuadro($fila, $columna)) {
    case 0: return 2;
    break;
    case 1: return 5;
    break;
    case 2: return 8;
    break;
    case 3: return 2;
    break;
    case 4: return 5;
    break;
    case 5: return 8;
    break;
    case 6: return 2;
    break;
    case 7: return 5;
    break;
    case 8: return 8;
    break;
    default:    
    break;
    }
}
        
            
          
          




        

        
       
    


   
