<?php
function mostrarTablero($tablero)
{

    echo '<div>';
    echo "<p>Tres en Raya</p>";
    echo '<table class="tablaJuego">';
    echo '<tr>';

    for ($i = 0; $i < 3; $i++) {
        echo '<tr>';
        for ($j = 0; $j < 3; $j++) {
            // Comprobamos si es numero diferente
            //a 0, entonces se pondría .
            if (!empty($tablero[$i][$j])) {
                echo '<td class="number">' .
                    $tablero[$i][$j] . '</td>';
            } else {
                echo '<td class="dot">.</td>';
            }
        }
        echo "</tr>";
    }
    echo '</table>';
    echo '</div>';
}

function turnoJ1($turno, $tableroJuego)
{
    $tableroCodificado = base64_encode(serialize($tableroJuego));
    echo '
    <form method="post" action="juego.php">
    <table border="1">
    <tr>
        <td>Turno J1 Fila: <input type="text" name="filaJuego"></td>
    </tr>
    <tr> 
        <td>Turno J1 Columna: <input type="text" name="columnaJuego"></td>
    </tr>
    </table>
    <br>
    <input type="hidden" name="turno" value="' . $turno . '"/>
    <input type="hidden" name="tableroJuego" value="' . $tableroCodificado . '"/>
    <input type="submit" name="empezarJugar" value="JUGAR">
    </form>
    ';
}

function turnoJ2($turno, $tableroJuego)
{
    $tableroCodificado = base64_encode(serialize($tableroJuego));
    echo '
    <form method="post" action="juego.php">
    <table border="1">
    <tr>
        <td>Turno J2 Fila: <input type="text" name="filaJuego"></td>
    </tr>
    <tr> 
        <td>Turno J2 Columna: <input type="text" name="columnaJuego"></td>
    </tr>
    </table>
    <br>
    <input type="hidden" name="turno" value="' . $turno . '"/>
    <input type="hidden" name="tableroJuego" value="' . $tableroCodificado . '"/>
    <input type="submit" name="empezarJugar" value="JUGAR">
    </form>
    ';
}

function meterRespuesta($tableroJuego) {
    $fila = $_POST['filaJuego'];
    $fila = $fila - 1;
    $columna = $_POST['columnaJuego'];
    $columna = $columna - 1;
    $turno = $_POST['turno'];

    if (empty($tableroJuego[$fila][$columna])) {
        if ($turno % 2===0 | $turno %5 === 0) {
            // Aqui juega el jugador 1
            $tableroJuego[$fila][$columna] = "X";
        } else {
            // Aqui juega el jugador 2
            $tableroJuego[$fila][$columna] = "O";
        }
    } else {
        echo "<script>alert('Error, esa celda estaba ocupada')</script>";
    }
    return $tableroJuego;
}