let idTemp =null;
let tiempo;

function crearMensaje(){
    console.log("Este mensaje se imprime cada " + tiempo + " segundos");
 }

function crearInterval() {

    tiempo = parseInt(prompt("Introduzca el tiempo en el que se ejecutara el mensaje:"));
   
    if(!window.isNaN(tiempo)){
        if(!idTemp){
            idTemp=setInterval(crearMensaje,tiempo);
        }else{
            console.error("Ya esta creado");
        }
    }else{
        alert("El valor introducido no es un numero");
    }
    

}
function borrarInterval(){
    if(!idTemp){
    console.error("No se ha creado");
    }else{
        clearInterval(idTemp);
        idTemp=null;
    }
    
}


