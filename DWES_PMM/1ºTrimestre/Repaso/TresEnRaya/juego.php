<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once './tablero.php';
    require_once './functions.php';
    if ($_REQUEST) {
        $tableroJuego = unserialize(base64_decode($_POST['tableroJuego']));
        

        $tableroJuego = meterRespuesta($tableroJuego);
        mostrarTablero($tableroJuego);

        // Sumamos el turno
        $turno = $_POST['turno'];
        $turno = $turno +1;


        if ($turno % 2 === 0 || $turno % 5 === 0) {
            
            turnoJ1($turno, $tableroJuego);
        } else {
           
            turnoJ2($turno, $tableroJuego);
        }
        
    } else {
        echo "<h2> Empecemos a Jugar </h2>";
        
        mostrarTablero($tablero);
        $tableroJuego = $tablero;

        echo "<h2>Bienvenido al juego</h2>";
        $turno = 0;

        if ($turno === 0) {
           
            turnoJ1($turno, $tableroJuego);
        }

    }
    ?>

</body>
</html>