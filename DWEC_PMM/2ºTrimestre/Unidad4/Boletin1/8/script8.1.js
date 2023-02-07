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
crearListeners();

function crearListeners() {

    //Añadir el novalidate a el formulario
    document.getElementById("formulario").setAttribute("novalidate",true);

    document.getElementById("nombre").addEventListener("blur", validarNombreEvento, false);
    document.getElementById("apellidos").addEventListener("blur", validarApellidosEvento, false);
    document.getElementById("edad").addEventListener("blur", validarEdadEvento, false);
    document.getElementById("url").addEventListener("blur", validarURLEvento, false);
    document.getElementById("si").addEventListener("blur", validarSIEvento, false);
    document.getElementById("ocupacion").addEventListener("blur", validarOcupacionEvento, false);
    document.getElementById("fecha").addEventListener("blur", validarFechaEvento, false);
    document.getElementById("cine").addEventListener("blur", validarInteresesEvento, false);

    document.getElementById("nombre").addEventListener("invalid", notificarErrorNombreEvento, false);
    document.getElementById("apellidos").addEventListener("invalid", notificarErrorApellidosEvento, false);
    document.getElementById("edad").addEventListener("invalid", notificarErrorEdadEvento, false);
    document.getElementById("url").addEventListener("invalid", notificarErrorURLEvento, false);
    document.getElementById("si").addEventListener("invalid", notificarErrorSIEvento, false);
    document.getElementById("ocupacion").addEventListener("invalid", notificarErrorOcupacionEvento, false);
    document.getElementById("fecha").addEventListener("invalid", notificarErrorFechaEvento, false);
    document.getElementById("cine").addEventListener("invalid", notificarErrorInteresesEvento, false);

    document.getElementById("nombre").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("apellidos").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("edad").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("url").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("si").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("ocupacion").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("fecha").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("cine").addEventListener("input", revisarErroresEvento, false);

    document.getElementById("formulario").addEventListener("submit", validarFormularioEvento, false);


}

///////////////////////////////////////NOMBRE/////////////////////////////////////////////
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

//////////////////////////////////////////////APELLIDOS///////////////////////////////////////////
function validarApellidosEvento(e){
    const apellidos = e.target;
    actualizarErroresApellidos(apellidos);
    validarCampo(apellidos);
}

function actualizarErroresApellidos(apellidos){

    const contenido = apellidos.value;

    let mensaje = "";

    if(contenido === ""){
        mensaje = `El campo ${apellidos.name} no puede estar vacio`;
    }if((contenido.length < MIN_CHAR) && (contenido.length > 0)){
        mensaje = `El campo ${apellidos.name} debe tener al menos 8 caracteres`;
    }if(contenido.length > 30){
        mensaje = `El campo ${apellidos.name} debe de tener como maximo 30 caracteres`;
    }
    apellidos.setCustomValidity(mensaje);
}
//////////////////////////////////////////////EDAD//////////////////////////////////////////////////
function validarEdadEvento(e){
    const edad = e.target;
    actualizarErroresEdad(edad);
    validarCampo(edad);
}

function actualizarErroresEdad(edad){

    const contenido = edad.value;
    let mensaje = "";

    if(contenido === ""){
        mensaje = `EL campo ${edad.name} no puede estar vacio`;
    }else if((contenido < MIN_EDAD) || (contenido > MAX_EDAD)){
        mensaje = `El campo ${edad.name} debe tener un valor entre ${MIN_EDAD} y ${MAX_EDAD}`;
    }
    edad.setCustomValidity(mensaje);
}

/////////////////////////////////HIJOS////////////////////////////////////////
function validarSIEvento(e){
    const si = e.target;
    actualizarErroresSI(si);
    validarCampo(si);

}

function actualizarErroresSI(si){
    const contenido = document.querySelector('input[name="hijos"]:checked');
    let mensaje = "";
    if(!contenido){
        mensaje = `Debe seleccionar un campo Hijos`;
    
}
si.setCustomValidity(mensaje);
}

/////////////////////////////////////////////OCUPACION//////////////////////////////////////////////
function validarOcupacionEvento(e){
    const ocupacion = e.target;

    actualizarErroresOcupacion(ocupacion);
    validarCampo(ocupacion);
}
function actualizarErroresOcupacion(ocupacion){
    const contenido = ocupacion.value;

    let mensaje = "";

    if(contenido === "df"){
        mensaje = `Debe de seleccionar una ${ocupacion.name}`;
    }
    ocupacion.setCustomValidity(mensaje);
}
/////////////////////////////////////////FECHA//////////////////////////////////////////////////

function validarFechaEvento(e){
    const fecha = e.target;
    actualizarErroresFecha(fecha);
    validarCampo(fecha);
}
function actualizarErroresFecha(fecha){
    const contenido = fecha.value;

    let mensaje = "";

    if(contenido ===""){
        mensaje = `EL campo ${fecha.name} no puede estar vacio`;
    }
    fecha.setCustomValidity(mensaje);
}
///////////////////////////////////////URL/////////////////////////////////////////////////////
function validarURLEvento(e){
    const url = e.target;
    actualizarErroresURL(url);
    validarCampo(url);
}

function actualizarErroresURL(url){
    const contenido = url.value;
    let mensaje = "";

    if(contenido === ""){
        mensaje = `El campo ${url.name} no puede estar vacio`;
    }
    url.setCustomValidity(mensaje);
}

///////////////////////////////////////////////INTERESES////////////////////////////////////////
function validarInteresesEvento(e){
    const inter = e.target;
    actualizarErroresIntereses(inter);
    validarCampo(inter);

}
function actualizarErroresIntereses(inter){
    const contenido = document.getElementById("cine").checked;
    const contenido2 = document.getElementById("cine").checked;
    const contenido3 = document.getElementById("cine").checked;

    let mensaje = "";
        if((!contenido && !contenido2) || (!contenido && !contenido3)){
            mensaje = `Debe seleccionar dos intereses`;
        }if((!contenido2 && !contenido3)){
            mensaje = `Debe seleccionar dos intereses`;
        }if((contenido && contenido2)){
            mensaje =" ";
        }if((contenido && contenido3)){
            mensaje = " ";
        }if((contenido2 && contenido3)){
            mensaje = " ";
        }
        inter.setCustomValidity(mensaje);
}
///////////////////////////////////////////POR DEFECTO/////////////////////////////////////////////
function validarCampoEvento(e){
    return validarCampo(e.target);
}

function revisarErroresEvento(e){
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
//Apellidos
function notificarErrorApellidosEvento(e){
    const apellidos = e.target;

    let mensajes = [];
    if(apellidos.validity.customError){
        mensajes.push(apellidos.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, apellidos);
}
//Edad
function notificarErrorEdadEvento(e){
    const edad = e.target;

    let mensajes = [];
    if(edad.validity.customError){
        mensajes.push(edad.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, edad);
}
//Hijos
function notificarErrorSIEvento(e){
    const si = e.target;

    let mensajes = [];
    if(si.validity.customError){
        mensajes.push(si.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, si);
}

//Ocupacion
function notificarErrorOcupacionEvento(e){
    const ocupacion = e.target;
    let mensajes = [];
    if(ocupacion.validity.customError){
        mensajes.push(ocupacion.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, ocupacion);
}
//Fecha
function notificarErrorFechaEvento(e){
    const fecha = e.target;
    let mensajes = [];
    if(fecha.validity.customError){
    mensajes.push(fecha.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, fecha);
}
//URL
function  notificarErrorURLEvento(e){
    const url = e.target;
    let mensajes = [];

    if(url.validity.customError){
        mensajes.push(url.validationMessage);
    }if(url.validity.typeMismatch){
        mensajes.push(`El campo ${url.name} no tiene el formato correcto`);
    }
    mostrarMensajesErrorEn(mensajes,url);
}

//Intereses
function notificarErrorInteresesEvento(e){
    const inter = e.target;

    let mensajes = [];

    if(inter.validity.customError){
        mensajes.push(inter.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, inter);
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

function validarFormularioEvento(e){

    let formValido = validarCampo(document.getElementById("nombre"));
        formValido = validarCampo(document.getElementById("apellidos")) && formValido;
        formValido = validarCampo(document.getElementById("edad"))&& formValido;
        formValido = validarCampo(document.getElementById("cine"))&& formValido;
        // formValido = validarCampo(document.getElementById("no"))&& formValido;
        formValido = validarCampo(document.getElementById("ocupacion")) && formValido;
        formValido = validarCampo(document.getElementById("fecha")) && formValido;
        
        
    if(formValido){
        console.log("El formulario esta validado correctamente");
    }else{
        e.preventDefault();
        console.error("El formulario no ha podido ser validado debido a un error");
    }

}