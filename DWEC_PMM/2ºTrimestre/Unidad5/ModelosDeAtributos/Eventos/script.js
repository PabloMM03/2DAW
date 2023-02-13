
//Actividad 1. Añadir un manejador de evento.

//Implementa una aplicación que abra una ventana emergente (alert) al pulsar sobre un botón.
crearListener();

function crearListener(){

    document.getElementById("boton").addEventListener("click", crearAlerta, false);
    document.getElementById("texto").addEventListener("keydown", textos, false);
}

function crearAlerta(){
    alert("Se ha pulsado el botón");
   
}


//Actividad 2. Objeto Event

function textos(e){
    let key = e.key;
    alert("Se ha pulsado la tecla: " + key);
}

//Actividad 3. Eliminar un manejador de evento.


