let ventanaCreada=false;
let nuevaVentana=null;

function crearVentana(){
if(!ventanaCreada){
    nuevaVentana = window.open("Hija.html");
    ventanaCreada=true;
}else{
    alert("La ventana ya esta creada.");
}
}

function cerrarVentana(){
    if(ventanaCreada){
        window.close("Hija.html");
        nuevaVentana=null;

    }else{
        alert("La ventana aun no esta creada.");
    }
}