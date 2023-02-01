<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./style.css">
        <title>Sudoku</title>
    </head>
    <body>

    
    <div id="logotipo">
    <img src="https://image.shutterstock.com/image-vector/sudoku-vector-lettering-name-game-260nw-1717953703.jpg" width ="200" height="100"
    alt="">
    </div></br>

    <div class="tablas">
    <?php 
    /*
    Se requieren los tres php creados Sudokus -> Que contienen los arrays de los niveles 
    GeneraFunci donde se encuentran todos las funciones respecto a los niveles. 
    y CrearJuegoNuevo que contiene la funcion para crear el tablero de juego modificado al insertar,eliminar y mostrar los candidatos.
    */

    require './Sudokus.php';
    require './GeneraFunci.php';
    include './CrearJuegoNuevo.php';
    
    /*
    A continucación Se realizará la misma ejecucion para los tres niveles, lo unico que cambia es el tipo de nivel.
    Se comprueba que los niveles no están vacios y si el seleccionado es igual al 
    nivel declarado se crea uno de esa misma dificultad.Tambien se comprueba si el boton elegir está definido y es igual a Elegir.
    */

    if(isset($_POST['elegir'])&& $_POST['elegir'] =="Elegir" && 
        !empty($_POST['nivel'])&& $_POST['nivel'] =="arrayFacil" ){

        creacionNivelFacil($arrayFacil,'NivelFacil');
        $juegoFacil=$arrayFacil; 
        //JuegoFacil seria equivalente a el nuevo tablero de juego creado donde se insertaran,eliminaran numeros etc y arrayFacil al antiguo donde esta por defecto.
        $CodificacionAntiguo = base64_encode(serialize($juegoFacil));   //Se serializa el tablero de juego antiguo.

        $CodificacionNuevo = base64_encode(serialize($arrayFacil));   //Se seraliza el tablero de juego nuevo.

    }elseif(isset($_POST['elegir'])&& $_POST['elegir'] == "Elegir" && 
        !empty($_POST['nivel'])&& $_POST['nivel'] =="arrayMedio" ){

        creacionNivelMedio($arrayMedio, 'NivelMedio');
        $juegoMedio=$arrayMedio;
        //JuegoFacil seria equivalente a el nuevo tablero de juego creado donde se insertaran,eliminaran numeros etc y arrayFacil al antiguo donde esta por defecto.
        $CodificacionAntiguo = base64_encode(serialize($juegoMedio));     //Se serializa el tablero de juego antiguo.

        $CodificacionNuevo = base64_encode(serialize($arrayMedio));     //Se seraliza el tablero de juego nuevo.
        
    }elseif(isset($_POST['elegir']) && $_POST['elegir'] == "Elegir" && 
        !empty($_POST['nivel'])&& $_POST['nivel'] == 'arrayDificil'){

        creacionNivelDificil($arrayDificil, 'NivelDificil');
        $juegoDificil=$arrayDificil;
        //JuegoFacil seria equivalente a el nuevo tablero de juego creado donde se insertaran,eliminaran numeros etc y arrayFacil al antiguo donde esta por defecto.
        $CodificacionAntiguo = base64_encode(serialize($juegoDificil));   //Se serializa el tablero de juego antiguo.

        $CodificacionNuevo = base64_encode(serialize($arrayDificil));   //Se seraliza el tablero de juego nuevo.

        
    }

    //Llamada a la  Clase donde al pulsar el boton insertar/eliminar/candidatos hace la correspodiente acción.

    require './IECDatos.php';

    //Creacion Formulario Index2. Introduccion de numeros(se exige que sean input de tipo number).
    ?>
    </div>
</br>
    
    <div class="Form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">

            <input type="hidden" value=<?php echo $_POST['nivel'] ?> name="nivel"/>
            <input type="hidden" value=<?php echo $CodificacionAntiguo ?> name="CodificacionAntiguo"/>
            <input type="hidden" value=<?php echo $CodificacionNuevo ?> name="CodificacionNuevo"/>
            
            
        
            <label for="num">Número</label> <input type="number" name="numeroAIntroducir" min="1" max="9" required></br>
            <label for="fila">Fila</label> <input type="number"  name="filaNumero" min="1" max="9" required></br>
            <label for="columna">Columna</label> <input type="number"  name="columnaNumero" min="1" max="9" required></br>

            </br>
                
            <input type="submit" name="boton" value="Insertar"></br>
            <input type="submit" name="boton" value="Eliminar"></br>
            <input type="submit" name="boton" value="Candidatos"></br>

            

    </form>
    </div>


    </body>
    </html>