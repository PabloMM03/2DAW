const ERROR_CAMPO = "error";
const ERROR_MENSAJES = "campoError";

const MIN_CHAR = 8;

crearListeners();

function crearListeners() {

    //Añadir el novalidate a el formulario
    document.getElementById("form-registro").setAttribute("novalidate",true);

    document.getElementById("nombre").addEventListener("blur", validarNombreEvento, false);
    document.getElementById("email").addEventListener("blur", validarEmailEvento, false);
    document.getElementById("clave").addEventListener("blur", validarPassEvento, false);
    document.getElementById("pais").addEventListener("blur", validarPaisEvento, false);
    document.getElementById("dia").addEventListener("blur", validarDiaEvento, false);
    document.getElementById("mes").addEventListener("blur", validarMesEvento, false);
    document.getElementById("año").addEventListener("blur", validarAñoEvento, false);
    document.getElementById("condiciones").addEventListener("blur", validarCondicionesEvento, true);
    
    document.getElementById("nombre").addEventListener("invalid", notificarErrorNombreEvento, false);
    document.getElementById("email").addEventListener("invalid", notificarErrorEmailEvento, false);
    document.getElementById("clave").addEventListener("invalid", notificarErrorPassEvento, false);
    document.getElementById("pais").addEventListener("invalid", notificarErrorPaisEvento, false);
    document.getElementById("dia").addEventListener("invalid", notificarErrorDiaEvento, false);
    document.getElementById("mes").addEventListener("invalid", notificarErrorMesEvento, false);
    document.getElementById("año").addEventListener("invalid", notificarErrorAñoEvento, false);
    document.getElementById("condiciones").addEventListener("invalid", notificarErrorCondicionesEvento, true);


    document.getElementById("nombre").addEventListener("input", revisarErroresNombreEvento, false);
    document.getElementById("email").addEventListener("input", revisarErroresEmailEvento, false);
    document.getElementById("clave").addEventListener("input", revisarErroresPassEvento, false);
    document.getElementById("pais").addEventListener("input", revisarErroresPaisEvento, false);
    document.getElementById("dia").addEventListener("input", revisarErroresDiaEvento, false);
    document.getElementById("mes").addEventListener("input", revisarErroresMesEvento, false);
    document.getElementById("año").addEventListener("input", revisarErroresAñoEvento, false);
    document.getElementById("condiciones").addEventListener("input", revisarErroresCondicionesEvento, true);

    document.getElementById("form-registro").addEventListener("submit", validarFormularioEvento, false);



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
        mensaje = `EL campo ${nombre.name} debe de tener almenos 8 caracteres `;
    }if((contenido.length > 25)){
        mensaje = `El campo ${nombre.name} debe de tener un máximo de 15 caracteres`;
    }

    nombre.setCustomValidity(mensaje);
}
//////EMAIL///////
function validarEmailEvento(e){
    const email = e.target;
    actualizarErroresNombre(email);
    validarCampo(email);
}
function actualizarErroresEmail(email){
    const contenido = email.value;
    let mensaje ="";
    
    if(contenido === ""){
        mensaje = `El campo ${email.name} no puede estar vacio`;
    }

    email.setCustomValidity(mensaje);
}
///////////PASS//////////////
function validarPassEvento(e){
    const clave = e.target;
    actualizarErroresPass(clave);
    validarCampo(clave);
}
function actualizarErroresPass(clave){
    const contenido = clave.value;
    let mensaje ="";
    let regexp = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;
    if(contenido === ""){
        mensaje = `El campo ${clave.name} no puede estar vacio`;
    }else if(contenido !== regexp){
        mensaje = `El campo ${clave.name} no cumple con los requisitos`;
    }
    clave.setCustomValidity(mensaje);
}
/////////////PAIS/////////////
function validarPaisEvento(e){
    const pais = e.target;
    actualizarErroresPais(pais);
    validarCampo(pais);
}
function actualizarErroresPais(pais){
    const contenido = pais.value;
    let mensaje ="";

    if(contenido === "df"){
        mensaje = `Debe de seleccionar una opción`;
    }

    pais.setCustomValidity(mensaje);
}
///////////////////DIA/////////////////////////
function validarDiaEvento(e){
    const dia = e.target;
    actualizarErroresDia(dia);
    validarCampo(dia);
}
function actualizarErroresDia(dia){
    const contenido = dia.value;
    let mensaje ="";

    if(contenido === ""){
        mensaje = `El campo ${dia.name} no puede estar vacio`;
    }else if((contenido > 31) || (contenido < 1)){
        mensaje = `EL campo ${dia.name} debe de tener un valor entre 1 y 31`;
    }

    dia.setCustomValidity(mensaje);
}
/////////////////MES//////////////////////
function validarMesEvento(e){
    const mes = e.target;
    actualizarErroresMes(mes);
    validarCampo(mes);
}
function actualizarErroresMes(mes){
    const contenido = mes.value;
    let mensaje ="";

    if(contenido === ""){
        mensaje = `El campo ${mes.name} no puede estar vacio`;
    }else if((contenido > 12) || (contenido < 1)){
        mensaje = `EL campo ${dia.name} debe de tener un valor entre 1 y 12`;
    }

    mes.setCustomValidity(mensaje);
}
/////////////////AÑO////////////////////
function validarAñoEvento(e){
    const año = e.target;
    actualizarErroresAño(año);
    validarCampo(año);
}
function actualizarErroresAño(año){
    const contenido = año.value;
    let mensaje ="";

    if(contenido === ""){
        mensaje = `El campo ${año.name} no puede estar vacio`;
    }else if((contenido > 2099) || (contenido < 1900)){
        mensaje = `EL campo ${año.name} debe de tener un valor entre 1900 y 2099`;
    }

    año.setCustomValidity(mensaje);
}
///////////////CONDICIONES/////////////////////////
function validarCondicionesEvento(e){
    const condiciones = e.target;
    actualizarErroresCondiciones(condiciones);
    validarCampo(condiciones);
}
function actualizarErroresCondiciones(condiciones){
    const contenido = document.querySelector("input[type=checkbox]");
    let mensaje ="";

    if(!contenido.checked){
        mensaje = `El campo ${condiciones.name} debe estar seleccionado`;
    }

    condiciones.setCustomValidity(mensaje);
}
///////////////////REVISAR/////////////////////////
function revisarErroresNombreEvento(e){
    const nombre = e.target;
    actualizarErroresNombre(nombre);
    if(nombre.validity.valid){
        eliminarErrores(nombre);
    }
}

function revisarErroresEmailEvento(e){
    const email = e.target;
    actualizarErroresEmail(email);
    if(email.validity.valid){
        eliminarErrores(email);
    }
}

function revisarErroresPassEvento(e){
    const clave = e.target;
    actualizarErroresNombre(clave);
    if(clave.validity.valid){
        eliminarErrores(clave);
    }
}

function validarCampo(campo){
    eliminarErrores(campo);
    return campo.checkValidity();
}

function revisarErroresPaisEvento(e){
    const pais = e.target;
    actualizarErroresNombre(pais);
    if(pais.validity.valid){
        eliminarErrores(pais);
    }
}
function revisarErroresDiaEvento(e){
    const dia = e.target;
    actualizarErroresDia(dia);
    if(dia.validity.valid){
        eliminarErrores(dia);
    }
}
function revisarErroresMesEvento(e){
    const mes = e.target;
    actualizarErroresMes(mes);
    if(mes.validity.valid){
        eliminarErrores(mes);
    }
}
function revisarErroresAñoEvento(e){
    const año = e.target;
    actualizarErroresAño(año);
    if(año.validity.valid){
        eliminarErrores(año);
    }
}
function revisarErroresCondicionesEvento(e){
    const condiciones = e.target;
    actualizarErroresCondiciones(condiciones);
    if(condiciones.validity.valid){
        eliminarErrores(condiciones);
    }
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

function notificarErrorEmailEvento(e){
    const email = e.target;

    let mensajes = [];
    if(email.validity.customError){
        mensajes.push(email.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, email);
}

function notificarErrorPassEvento(e){
    const clave = e.target;

    let mensajes = [];
    if(clave.validity.customError){
        mensajes.push(clave.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, clave);
}

function notificarErrorPaisEvento(e){
    const pais = e.target;

    let mensajes = [];
    if(pais.validity.customError){
        mensajes.push(pais.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, pais);
}
function notificarErrorDiaEvento(e){
    const dia = e.target;

    let mensajes = [];
    if(dia.validity.customError){
        mensajes.push(dia.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, dia);
}
function notificarErrorMesEvento(e){
    const mes = e.target;

    let mensajes = [];
    if(mes.validity.customError){
        mensajes.push(mes.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, mes);
}
function notificarErrorAñoEvento(e){
    const año = e.target;

    let mensajes = [];
    if(año.validity.customError){
        mensajes.push(año.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, año);
}
function notificarErrorCondicionesEvento(e){
    const condiciones = e.target;

    let mensajes = [];
    if(condiciones.validity.customError){
        mensajes.push(condiciones.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, condiciones);
}

function hayErrorEnCampo(campo) {
    return campo.classList.contains(ERROR_CAMPO);
}

function eliminarErrores(campo){
    

    campo.classList.remove(ERROR_CAMPO);

    const contenedorErrores = document.getElementById(`${campo.name}-${ERROR_CAMPO}`);

    if(contenedorErrores)
    contenedorErrores.parentElement.removeChild(contenedorErrores);
}

function mostrarMensajesErrorEn(mensajes,campo){

    campo.classList.add(ERROR_CAMPO);
    let contenedorMensajes = document.createElement("div");

    contenedorMensajes.classList.add(ERROR_MENSAJES);

    contenedorMensajes.setAttribute("aria-labelledby", campo.id);

    contenedorMensajes.id = `${campo.name}-${ERROR_CAMPO}`;
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

    //Hacer focus primer error
    let form = document.getElementById("form-registro").querySelectorAll("input");
  
    for (let i = 0; i < form.length; i++) {
      if (!form[i].checkValidity()) {
        form[i].focus();
        break;
      }
    }

    //Validar Formulario

    let formValido = validarCampo(document.getElementById("nombre"));
    formValido = validarCampo(document.getElementById("email"))&& formValido;
    formValido = validarCampo(document.getElementById("clave"))&& formValido;
    formValido = validarCampo(document.getElementById("pais"))&& formValido;  
    formValido = validarCampo(document.getElementById("dia"))&& formValido; 
    formValido = validarCampo(document.getElementById("mes"))&& formValido; 
    formValido = validarCampo(document.getElementById("año"))&& formValido; 
    

    if(formValido){
        console.log("El formulario esta validado correctamente");
    }else{
        e.preventDefault();
        console.error("El formulario no ha podido ser validado debido a un error");
    }

}