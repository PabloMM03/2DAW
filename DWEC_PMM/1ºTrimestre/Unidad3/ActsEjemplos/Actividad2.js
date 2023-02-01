function anadirPrefijo(prefijo,...palabras){
    const palabrasConPrefijo = [0];
    for(let i =0; i<palabras.length;i++){
palabrasConPrefijo[i]=prefijo + palabras[i];

    }
    return palabrasConPrefijo;
}
anadirPrefijo("con", "verso", "vexo", "cavo");

//Funcion Convencional
function obtenerSaludo(){
    return "Hello World!";
}
//Funcion anonima
// function (){
//     return "Hello World!";
// }