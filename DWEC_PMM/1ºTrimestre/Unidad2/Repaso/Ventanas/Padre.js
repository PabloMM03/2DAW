
let ventanaCreada = false; 
let nuevaVentana= null;

function crearVentana(){
if(!ventanaCreada){
    nuevaVentana = window.open("Hijo.html");
    ventanaCreada=true;
}else{
    alert("La ventana ya ha sido creadad");
}

}

function cerrarVentana(){
    if(ventanaCreada){
         window.close("Hijo.html");
         nuevaVentana = null;
    }else{
        alert("La ventana aun no ha sido creada");
    }

}