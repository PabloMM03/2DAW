let idTemp =null;

function alertaEjecucionTemp(){
    alert("Se ha ejecutado el temporizador de 10 segundos");
 }

function crearTimeout() {
if(!idTemp){
    idTemp=setTimeout(alertaEjecucionTemp,3000);
}else{
    console.error("Ya esta creado");
}
}
function borrarTimeout(){
    if(!idTemp){
    console.error("No se ha creado");
    }else{
        clearTimeout(idTemp);
        idTemp=null;
    }
    
}


