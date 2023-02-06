const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJES = "campoError";

const MIN_INTERESES = 2;
const MIN_CHAR = 8;
const MIN_EDAD = 18;
const MAX_EDAD = 100;
crearListeners();

function crearListeners() {

    //Añadir el novalidate a el formulario
    document.getElementById("formulario").setAttribute("novalidate",true);

    document.getElementById("nombre").addEventListener("blur", validarNombreEvento, false);
    document.getElementById("apellidos").addEventListener("blur", validarApellidosEvento, false);
    document.getElementById("edad").addEventListener("blur", validarEdadEvento, false);
    document.getElementById("url").addEventListener("blur", validarUrlEvento, false);
    document.getElementById("hijos").addEventListener("blur", validarHijosEvento, false);


    document.getElementById("nombre").addEventListener("invalid", notificarErrorNombreEvento, false);
    document.getElementById("apellidos").addEventListener("invalid", notificarErrorApellidosEvento, false);
    document.getElementById("edad").addEventListener("invalid", notificarErrorEdadEvento, false);
    document.getElementById("url").addEventListener("invalid", notificarErrorUrlEvento, false);
    document.getElementById("hijos").addEventListener("invalid", notificarErrorHijosEvento, false);

    document.getElementById("nombre").addEventListener("input", revisarErroresNombreEvento, false);
    document.getElementById("apellidos").addEventListener("input", revisarErroresApellidosEvento, false);
    document.getElementById("edad").addEventListener("input", revisarErroresEdadEvento, false);
    document.getElementById("url").addEventListener("input", revisarErroresUrlEvento, false);
    document.getElementById("hijos").addEventListener("input", revisarErroresHijosEvento, false);
    
    document.getElementById("formulario").addEventListener("submit", validarFormularioEvento, false);


}


function validarNombreEvento(e){
    const nombre = e.target;
    actualizarErroresNombre(nombre);
    validarCampo(nombre);
}
function actualizarErroresNombre(nombre){
    const contenido = nombre.value;
    let mensaje ="";

    if(contenido === ""){
        mensaje = `El campo ${nombre.name} no puedes estar vacio`;
    }if((contenido.length < MIN_CHAR) && (contenido.length > 0)){
        mensaje = `EL campo ${nombre.name} debe de tener al menos 8 caracteres `
    }if((contenido.length > 15)){
        mensaje = `El campo ${nombre.name} debe de tener un maximo de 20 caracteres`;
    }
    nombre.setCustomValidity(mensaje);
}

function validarCampo(campo){
    eliminarErrores(campo);
    return checkValidity();
}

function eliminarErrores(campo){
    
}