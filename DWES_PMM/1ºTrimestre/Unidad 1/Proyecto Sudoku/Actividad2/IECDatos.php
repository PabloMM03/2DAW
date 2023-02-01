<?php

    //Deserializar al pulsar Insertar

if (!empty($_POST['boton']) && $_POST['boton'] == "Insertar") {
    //Se deserailizan los dos tableros de juego ,tanto el antiguo como el nuevo creado.
    $DescodificacionAntiguo = unserialize(base64_decode($_POST['CodificacionAntiguo'])); 

    $DescodificacionNuevo = unserialize(base64_decode($_POST['CodificacionNuevo']));


    if (!empty($_POST['nivel']) && $_POST['nivel'] == "arrayFacil") {               //se le resta 1 a las filas y columnas para igualar el valor al del array
        //Se añade la funcion para insertar los numeros.
        $DescodificacionAntiguo = Insertar($DescodificacionNuevo, $DescodificacionAntiguo, 
         $_POST['filaNumero'] -1, $_POST['columnaNumero'] -1, $_POST['numeroAIntroducir']  );

        //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo, $DescodificacionAntiguo, "NivelFacil"); 

        //Se realizaria el mismo paso en los 3 niveles diferentes.
    } elseif (!empty($_POST['nivel']) && $_POST['nivel'] == "arrayMedio") {
        //Se añade la funcion para insertar los numeros.
        $DescodificacionAntiguo = Insertar($DescodificacionNuevo, $DescodificacionAntiguo, 
         $_POST['filaNumero'] -1, $_POST['columnaNumero'] -1, $_POST['numeroAIntroducir'] );

        //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo, $DescodificacionAntiguo, "NivelMedio");

    } else {
        //Se añade la funcion para insertar los numeros.
        $DescodificacionAntiguo =Insertar($DescodificacionNuevo, $DescodificacionAntiguo, 
         $_POST['filaNumero'] -1, $_POST['columnaNumero'] -1 , $_POST['numeroAIntroducir'] );

         //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo, $DescodificacionAntiguo, "NivelDificil");
    }
        //se vuelve a serializar el juego
        $CodificacionAntiguo = base64_encode(serialize($DescodificacionAntiguo));

        $CodificacionNuevo = base64_encode(serialize($DescodificacionNuevo));

}
    /*
    Deserializar al pulsar el boton Eliminar. 
    Seria lo mismo que en el paso anterior de eliminar solo que cambia la funcion introducida dentro y el boton a pulsar.
    */
if(!empty($_POST['boton']) && $_POST['boton'] == "Eliminar"){
    //Se deserailizan los dos tableros de juego ,tanto el antiguo como el nuevo creado.
    $DescodificacionAntiguo = unserialize(base64_decode($_POST['CodificacionAntiguo']));

    $DescodificacionNuevo = unserialize(base64_decode($_POST['CodificacionNuevo']));

    
    if (!empty($_POST['nivel']) && $_POST['nivel'] == "arrayFacil") {               //se le resta 1 a las filas y columnas para igualar el valor al del array
        //Se añade la funcion para eliminar los numeros.
        $DescodificacionAntiguo = eliminar($DescodificacionNuevo, $DescodificacionAntiguo, 
         $_POST['filaNumero'] -1, $_POST['columnaNumero'] -1 ,$_POST['numeroAIntroducir'] );

         //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo, $DescodificacionAntiguo, "NivelFacil");

    } elseif (!empty($_POST['nivel']) && $_POST['nivel'] == "arrayMedio") {
        //Se añade la funcion para eliminar los numeros.
        $DescodificacionAntiguo = eliminar($DescodificacionNuevo, $DescodificacionAntiguo, 
        $_POST['filaNumero'] -1, $_POST['columnaNumero'] -1 , $_POST['numeroAIntroducir'] );

        //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo, $DescodificacionAntiguo, "NivelMedio");

    } else {
        $DescodificacionAntiguo = eliminar($DescodificacionNuevo, $DescodificacionAntiguo, 
        $_POST['filaNumero'] -1 , $_POST['columnaNumero'] -1 , $_POST['numeroAIntroducir'] );

        //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo, $DescodificacionAntiguo, "NivelDificil");
    }
    //se vuelve a serializar el juego
        $CodificacionAntiguo = base64_encode(serialize($DescodificacionAntiguo));

        $CodificacionNuevo = base64_encode(serialize($DescodificacionNuevo));

}
    /*
    Deserializar al pulsar Candidatos. 
    Seria igual que los dos pasos anteriores, lo unico que cambia es la funcion introducida y el boton a pulsar.
    */
if(!empty($_POST['boton']) && $_POST['boton'] == "Candidatos"){
    //Se deserailizan los dos tableros de juego ,tanto el antiguo como el nuevo creado.
    $DescodificacionAntiguo = unserialize(base64_decode($_POST['CodificacionAntiguo']));
    
    $DescodificacionNuevo = unserialize(base64_decode($_POST['CodificacionNuevo']));

    if(!empty($_POST['nivel']) && $_POST['nivel'] == "arrayFacil"){
                                  
        Candidatos($DescodificacionNuevo,$DescodificacionAntiguo,
        $_POST['filaNumero'] - 1, 
        $_POST['columnaNumero'] - 1);//se le resta 1 a las filas y columnas para igualar el valor al del array
        //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo,$DescodificacionAntiguo,"NivelFacil");

    }elseif(!empty($_POST['nivel']) && $_POST['nivel'] == "arrayMedio"){

        Candidatos($DescodificacionNuevo,$DescodificacionAntiguo,
        $_POST['filaNumero'] - 1, 
        $_POST['columnaNumero'] - 1);
        //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo,$DescodificacionAntiguo,"NivelMedio");

    }else{
        Candidatos($DescodificacionNuevo,$DescodificacionAntiguo,
        $_POST['filaNumero'] - 1, 
        $_POST['columnaNumero'] - 1);
        //Creamos el nuevoJuego llamanado a la funcion crearJuego creada en (crearJuegoNuevo)
        crearJuego($DescodificacionNuevo,$DescodificacionAntiguo,"NivelDificil");
    }
    //se vuelve a serializar el juego
    $CodificacionAntiguo = base64_encode(serialize($DescodificacionAntiguo));   
    
    $CodificacionNuevo = base64_encode(serialize($DescodificacionNuevo));

}
