//CONSTANTES A UTILIZAR
const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJES = "campoError";

const MIN_INTERESES = 2;
const MIN_CHAR = 8;
const MIN_EDAD = 18;
const MAX_EDAD = 60;

//Con checkvalidity
//Que contenga un numero = valdiity.patternMismatch
//Que tenga el formato correcto validity.typeMismatch
//Que no este vacio validity.valueMissing

//Campo url y gamil type url o mail form y validar con typeMismatch

//ACTUALIZAR DE CHECKBOX //OBLIGATORIO TENER EN FORMULARIO el name igual en todos y obtener el blur del id de un fieldset
function actualizarErroresIntereses(intereses){
    let count = 0;
    let mensaje = "";

    const contenido = document.querySelectorAll('input[type="checkbox"]');
    
    for(let i = 0; i<contenido.length; i++){
        if(contenido[i].checked){
            count++;
        }
    }
    if(count < MIN_INTERESES) {
        mensaje = `Debe seleccionar almenos dos intereses`;
      }else{
        mensaje = ``;
      }
    intereses.setCustomValidity(mensaje);
}

//LO MISMO PARA RADIO
function actualizarErroresSI(si){
    const contenido = document.querySelector('input[type="radio"]:checked');
    let mensaje = "";
    if(!contenido){
        mensaje = `Debe seleccionar un campo Hijos`;
    
}
si.setCustomValidity(mensaje);
}

//CAMPO SELECT COMPROBAR QUE NO SEA POR DEFECTO DEFAULT, SI LO ES MENSAJE ERROR

crearListeners();

function crearListeners() {

    //Añadir el novalidate a el formulario
    document.getElementById("formulario").setAttribute("novalidate",true);

    // radio y checkbox van en TRUE
    document.getElementById("nombre").addEventListener("blur", validarNombreEvento, false);
    document.getElementById("apellidos").addEventListener("blur", validarApellidosEvento, false);
    document.getElementById("edad").addEventListener("blur", validarEdadEvento, false);
    document.getElementById("url").addEventListener("blur", validarURLEvento, false);
    document.getElementById("hijos").addEventListener("blur", validarSIEvento, true);
    document.getElementById("ocupacion").addEventListener("blur", validarOcupacionEvento, false);
    document.getElementById("fecha").addEventListener("blur", validarFechaEvento, false);
    document.getElementById("intereses").addEventListener("blur", validarInteresesEvento, true);
    document.getElementById("desc").addEventListener("blur", validarDescEvento, false);

    document.getElementById("nombre").addEventListener("invalid", notificarErrorNombreEvento, false);
    document.getElementById("apellidos").addEventListener("invalid", notificarErrorApellidosEvento, false);
    document.getElementById("edad").addEventListener("invalid", notificarErrorEdadEvento, false);
    document.getElementById("url").addEventListener("invalid", notificarErrorURLEvento, false);
    document.getElementById("hijos").addEventListener("invalid", notificarErrorSIEvento, true);
    document.getElementById("ocupacion").addEventListener("invalid", notificarErrorOcupacionEvento, false);
    document.getElementById("fecha").addEventListener("invalid", notificarErrorFechaEvento, false);
    document.getElementById("intereses").addEventListener("invalid", notificarErrorInteresesEvento, true);
    document.getElementById("desc").addEventListener("invalid", notificarErrorDescEvento, false);

    document.getElementById("nombre").addEventListener("input", revisarErroresNombreEvento, false);
    document.getElementById("apellidos").addEventListener("input", revisarErroresApellidosEvento, false);
    document.getElementById("edad").addEventListener("input", revisarErroresEdadEvento, false);
    document.getElementById("url").addEventListener("input", revisarErroresUrlEvento, false);
    document.getElementById("hijos").addEventListener("input", revisarErroresSIEvento, true);
    document.getElementById("ocupacion").addEventListener("input", revisarErroresOcupacionEvento, false);
    document.getElementById("fecha").addEventListener("input", revisarErroresFechaEvento, false);
    document.getElementById("intereses").addEventListener("input", revisarErroresIntEvento, true);
    document.getElementById("desc").addEventListener("input", revisarErroresDescEvento, false);
    
    document.getElementById("formulario").addEventListener("submit", validarFormularioEvento, false);

}
//BLUR

function validarNombreEvento(e){
    const nombre = e.target;
    actualizarErroresNombre(nombre);
    validarCampo(nombre);
}
function actualizarErroresNombre(nombre){
    const contenido = nombre.value;
    let mensaje ="";

    if(contenido === ""){
        mensaje = `El campo ${nombre.name} no puede estar vacio`;
    }if((contenido.length < MIN_CHAR) && (contenido.length > 0)){
        mensaje = `EL campo ${nombre.name} debe de tener al menos 8 caracteres `;
    }if((contenido.length > 15)){
        mensaje = `El campo ${nombre.name} debe de tener un máximo de 15 caracteres`;
    }if((contenido !=="") && (contenido.length < 8)){
        mensaje = `El campo ${nombre.name} debe tener al menos 8 caracteres.`;
    }

    nombre.setCustomValidity(mensaje);
}

//REVISAR
function revisarErroresNombreEvento(e){
    const campo = e.target;
    actualizarErroresNombre(campo);
    if(campo.validity.valid){
        eliminarErrores(campo);
    }
}
function validarCampo(campo){
    eliminarErrores(campo);
    return campo.checkValidity();
}

//////////////////////////NOTIFICAR///////////////////////////
//Nombre
function notificarErrorNombreEvento(e){
    const nombre = e.target;

    let mensajes = [];
    if(nombre.validity.customError){
        mensajes.push(nombre.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, nombre);
}

///////////////CASO URL O GMAIL////////////////////
//URL
function  notificarErrorURLEvento(e){
    const url = e.target;
    let mensajes = [];

    if(url.validity.customError){
        mensajes.push(url.validationMessage);
    }if(url.validity.typeMismatch){//COMPROBAR FORMATO CORRECTO
        mensajes.push(`El campo ${url.name} no tiene el formato correcto`);
    }
    mostrarMensajesErrorEn(mensajes,url);
}

//////////////////////////////////////POR DEFCTO 2////////////////////////////////////


function hayErrorEnCampo(campo) {
    return campo.classList.contains(CLASE_ERROR_CAMPO);
}

function eliminarErrores(campo){
    
    campo.classList.remove(CLASE_ERROR_CAMPO);

    const contenedorErrores = document.getElementById(`${campo.name}-${CLASE_ERROR_CAMPO}`);

    if(contenedorErrores)
    contenedorErrores.parentElement.removeChild(contenedorErrores);
}

function mostrarMensajesErrorEn(mensajes,campo){

    campo.classList.add(CLASE_ERROR_CAMPO);
    let contenedorMensajes = document.createElement("div");

    contenedorMensajes.classList.add(CLASE_ERROR_MENSAJES);

    contenedorMensajes.setAttribute("aria-describeby", campo.id);

    contenedorMensajes.id = `${campo.name}-${CLASE_ERROR_CAMPO}`;
    for(let mensaje of mensajes){
        let parrafo  = document.createElement("p");
        parrafo.textContent = mensaje;
        contenedorMensajes.appendChild(parrafo);
    }
    insertarDespues(campo, contenedorMensajes);
}

function insertarDespues(campoReferencia, campoAnadir){
    if(campoReferencia.nextSibling){
        campoReferencia.parentNode.insertBefore(campoAnadir, campoReferencia.nextSibling);
    }else{
        campoReferencia.parentNode.appendChild(campoAnadir);
    }
}

//VALIDAR AL PULSAR EL BOTON

function validarFormularioEvento(e){

    //HACER FOCUS PRIMER ERROR
    let form = document.getElementById("formulario").querySelectorAll("input");
  
    for (let i = 0; i < form.length; i++) {
      if (!form[i].checkValidity()) {
        form[i].focus();
        break;
      }
    }

    let formValido = validarCampo(document.getElementById("nombre"));
        formValido = validarCampo(document.getElementById("apellidos")) && formValido;
        formValido = validarCampo(document.getElementById("edad"))&& formValido;
        formValido = validarCampo(document.getElementById("hijos"))&& formValido;
        formValido = validarCampo(document.getElementById("intereses"))&& formValido;
        formValido = validarCampo(document.getElementById("ocupacion")) && formValido;
        formValido = validarCampo(document.getElementById("fecha")) && formValido;
        
        
    if(formValido){
        console.log("El formulario esta validado correctamente");
    }else{
        e.preventDefault();
        console.error("El formulario no ha podido ser validado debido a un error");
    }

}