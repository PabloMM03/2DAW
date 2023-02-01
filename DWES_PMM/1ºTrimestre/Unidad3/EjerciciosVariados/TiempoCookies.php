<?php

session_start();

if(isset($_SESSION['visitas'])){
   
    array_push($_SESSION['visitas'],date(DATE_RFC1036));
}else{
    $_SESSION['visitas'] ='';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiempo Cookies</title>
</head>
<body>
    
<?php $contador = $_SESSION['visitas'] ;

    foreach($contador as $visitas){
        echo $visitas;
    }

?>


</body>
</html>