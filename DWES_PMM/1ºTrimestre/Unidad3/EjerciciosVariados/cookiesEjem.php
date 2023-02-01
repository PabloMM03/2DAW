<?php
if (!isset($_COOKIE['login'])) {

    setcookie('login', '1');
    setcookie('contadorLogin', '1');
} else {
    $contador = $_COOKIE['contadorLogin'];
    $contador++;
    setcookie('login', $contador);
    setcookie('contadorLogin', $contador);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
   

if (!isset($_COOKIE['login'])) {
    echo '<h1>Bienvenido, es la primera vez que se loguea.</h1>';

    }elseif($_COOKIE['login']==1){
        echo '<h1>Bienvenido, es la segunda vez que se loguea.</h1>';
        setcookie('segundaVez',date("Y-m-d H:i:s"));
}else{
    echo '<h1>Bienvenido, se ha logueado más de dos veces</h1>';
        echo $_COOKIE['segundaVez'];
    
}


