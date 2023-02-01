const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJES = "campoError";

const MIN_INTERESES = 2; 

crearListeners();

function crearListeners(){

    document.getElementById("formulario").setAttribute("novalidate", true);

    document.getElementById("nombre").addEventListener("blur", validarNombreEvento, false);

    document.getElementById("nombre").addEventListener("invalid", notificarErrorNombreEvento, false);

    document.getElementById("nombre").addEventListener("input", revisarErroresEvento, false);
}

function validarNombreEvento(e){
    const nombre = e.target;
    actualizarErroresNombre(nombre);
    validarCampo(nombre);
}

function actualizarErroresNombre(nombre){

    const contenido = nombre.value;

    let mensaje = "";

    if(contenido === ""){
        mensaje = `El campo ${nombre.name} no puede estar vacio`;
    }else if((contenido.length < 8) && (contenido.length > 0)){
        mensaje = `El campo ${nombre.name} tiene que tener minimo 8 caracteres`;
    }else if(contenido.length > 20){
        mensaje = `El campo ${nombre.name} debe de tener un maximo de 20 caracteres`;
    }
    nombre.setCustomValidity(mensaje);
}

function validarNombreEvento(e){
    return validarCampo(e.target);
}

function validarCampo(campo){
    eliminarErrores(campo);
    return campo.checkValidity();
}

function revisarErroresEvento(e){
    const campo = e.target;

    actualizarErroresNombre(campo);
    
    if(campo.validity.valid){
        eliminarErrores(campo);
    }
}

function notificarErrorNombreEvento(e){
    const nombre = e.target;
    let mensajes = [];

    if(nombre.validity.cutomError){
        mensajes.push(nombre.validationMessage);
    }
    mostrarMensajesErrorEn(nombre,mensajes);
}

function hayErrorEnCampo(campo){
    return campo.classList.contains(CLASE_ERROR_CAMPO);
}

function eliminarErrores(campo){
 campo.classList.remove(CLASE_ERROR_CAMPO);

 const contenedorErrores = document.getElementById(`${campo.name}-${CLASE_ERROR_CAMPO}`);
 if(contenedorErrores){
    contenedorErrores.parentElement.removeChild(contenedorErrores);
 }

}

function mostrarMensajesErrorEn(campo,mensajes){
    campo.classList.add(CLASE_ERROR_MENSAJES);

    let contenedorMensajes = document.createElement("div");

    contenedorMensajes.id = `${campo.name}-${CLASE_ERROR_CAMPO}`;

    for(let mensaje of mensajes){
        let parrafo = document.createElement("p");
        parrafo.textContent = mensaje;

        contenedorMensajes.appendChild(parrafo);

    }
    insertarDespues(campo, contenedorMensajes);
}

function insertarDespues(campoReferencia, campoAnadir){

    if(campoReferencia.nextSibling){
        campoReferencia.parentNode.insertBefore(campoReferencia.nextSibling);
    }else{
        campoReferencia.parentNode.appendChild(campoAnadir);
    }


}