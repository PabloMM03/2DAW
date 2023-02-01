const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJE = "campoAnadir";

crearListeners();


function crearListeners() {
    
    document.getElementById("email").addEventListener("blur", validarCampoEvento, false);
    document.getElementById("pass").addEventListener("blur", validarCampoEvento, false);
    document.getElementById("nombre").addEventListener("blur", validarCampoEvento, false);
    document.getElementById("edad").addEventListener("blur", validarCampoEvento, false);
   
    document.getElementById("email").addEventListener("invalid", notificarErroresEvento, false);
    document.getElementById("pass").addEventListener("invalid", notificarErroresEvento, false);
    document.getElementById("nombre").addEventListener("invalid", notificarErroresEvento, false);
    document.getElementById("edad").addEventListener("invalid", notificarErroresEvento, false);

    
    document.getElementById("email").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("pass").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("nombre").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("edad").addEventListener("input", revisarErroresEvento, false);
   
    document.getElementById("formulario").addEventListener("submit", validarFormularioEvento, false);
}


function validarCampoEvento(e) {
    validarCampo(e.target);
}

function validarCampo(campo) {
    eliminarErrores(campo);
    return campo.checkValidity();
}

function revisarErroresEvento(e) {
    const campo = e.target;
    if(campo.validity.valid) {
        eliminarErrores(campo);
    }
}

function eliminarErrores(campo) {
    campo.classList.remove(CLASE_ERROR_CAMPO);
    const mensajesError = document.getElementById(`${campo.name}_error`);
    if(mensajesError) {
        mensajesError.parentElement.removeChild(mensajesError);
    }
}

function notificarErroresEvento(e) {
    const campo = e.target;
    campo.classList.add(CLASE_ERROR_CAMPO);
    let mensajes = [];

        if(campo.validity.valueMissing) {
            mensajes.push("Este campo no puede estar vacío");
        }
        if(campo.validity.typeMismatch) {
            mensajes.push("Los datos suministrados no tienen el formato correcto");
        }
        if(campo.validity.rangeUnderflow || campo.validity.rangeOverflow) {
            mensajes.push(`Debe contener un valor entre ${campo.min} y ${campo.max}`);
        }
        if(campo.validity.patternMismatch) {
            mensajes.push("El campo debe contener al menos un número");
    }
    mostrarMensajesErrorEn(mensajes, campo);
}

function mostrarMensajesErrorEn(mensajes, campo) {
    
    let div = document.createElement("div");
    div.setAttribute("id",`${campo.name}_error`);
    div.classList.add(CLASE_ERROR_MENSAJE);
    
    for(let i =0; i<mensajes.length; i++){
        let p = document.createElement("p");
        p.textContent = mensajes[i];
        div.appendChild(p);

    }
    insertarDespues(campo, div);

}

function insertarDespues(campoReferencia, campoAnadir){
    if(campoReferencia.nextSibling){
        campoReferencia.parentNode.insertBefore(campoAnadir,campoReferencia.nextSibling);
    }else{
        campoReferencia.parentNode.appendChild(campoAnadir);
    }
}

function validarFormularioEvento(e){
    let formValido = validarCampo(document.getElementById("email"));
    formValido = validarCampo(document.getElementById("pass"))&& formValido;
    formValido = validarCampo(document.getElementById("edad"))&& formValido;
    formValido = validarCampo(document.getElementById("nombre"))&& formValido;

    if(formValido){
        console.log("Formulario validado correctamente sin errores.");
    }else{
        e.preventDefault();
        console.error("Formluario no validado ya que tiene errores.");
    }
}

