
function alerta(){
    alert("A partir de ahora la navegación será privada");
}

function confirmar(){
if(confirm("¿Acepta los terminos y condiciones de uso?")){
    let text= alert("Términos y condiciones aceptados");
}else{
    text= alert("No se han aceptado los términos y condiciones");
}
}

function perdirPorTeclado(){
    let nombre = prompt("Introduzca su nombre");

    if(nombre){
        let saludo = alert("Hola " + nombre + "!");
    }else{
        saludo= alert("El usuario a cancelado la ventana!")
    }

}
