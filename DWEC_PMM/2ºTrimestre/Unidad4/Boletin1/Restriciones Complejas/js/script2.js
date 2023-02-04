const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJES = "campoError";

const MIN_INTERESES = 2;
const MIN_EDAD = 18;
const MAX_EDAD = 100;
crearListeners();

function crearListeners() {

    //Añadir el novalidate a el formulario
    document.getElementById("formulario").setAttribute("novalidate",true);

    document.getElementById("nombre").addEventListener("blur", validarNombreEvento, false);
    document.getElementById("pass").addEventListener("blur", validarPassEvento, false);
    document.getElementById("pass2").addEventListener("blur", validarPass2Evento, false);
    document.getElementById("edad").addEventListener("blur", validarEdadEvento, false);

    document.getElementById("nombre").addEventListener("invalid", notificarErrorNombreEvento, false);
    document.getElementById("pass").addEventListener("invalid", notificarErrorPassEvento, false);
    document.getElementById("pass2").addEventListener("invalid", notificarErrorPass2Evento, false);
    document.getElementById("edad").addEventListener("invalid", notificarErrorEdadEvento, false);

    document.getElementById("nombre").addEventListener("input", revisarErroresNombreEvento, false);
    document.getElementById("pass").addEventListener("input", revisarErroresPassEvento, false);
    document.getElementById("pass2").addEventListener("input", revisarErroresPass2Evento, false);
    document.getElementById("edad").addEventListener("input", revisarErroresEdadEvento, false);
    

}
//Nombre
function validarNombreEvento(e) {
    const nombre = e.target;
    actualizarErroresNombre(nombre);
    validarCampo(nombre);
}
function actualizarErroresNombre(nombre) {
    const contenido = nombre.value;
    let mensaje = "";
    if(contenido === "") {
        mensaje = `El campo ${nombre.name} no puede estar vacío`;
    }else if((contenido.length < 8)&&(contenido.length > 0)) {
        mensaje = `El campo ${nombre.name} debe tener al menos 8 caracteres`;
    }else if(contenido.length > 20) {
        mensaje = `El campo ${nombre.name} debe tener un máximo de 20 caracteres`;
    }
    nombre.setCustomValidity(mensaje);
}
//Edad
function validarEdadEvento(e){
    const edad = e.target;
    actualizarErroresEdad(edad);
    validarCampo(edad);
}

function actualizarErroresEdad(edad){
    const contenido = edad.value;
    let mensaje = "";

    if(contenido === ""){
        mensaje = `El campo ${edad.name} no puede estar vacío`;
    }else if((contenido < MIN_EDAD)|| (contenido > MAX_EDAD)){
        mensaje = `El campo ${edad.name} tiene que tener un valor entre ${MIN_EDAD} y ${MAX_EDAD}`;
    }
    edad.setCustomValidity(mensaje);
}
//Pass
function validarPassEvento(e){
    const pass = e.target;
    const pass2 = e.target;
    actualizarErroresPass(pass,pass2);
    validarCampo(pass,pass2);
}
function actualizarErroresPass(pass,pass2){
    const contenido = pass.value;
    const contenido2 = pass2.value;
    let mensaje = "";

    if(contenido === ""){
        mensaje = `EL campo ${pass.name} no puede estar vacío`;
    }else if((contenido === "")&& (contenido !== contenido2)){
        mensaje = `El campo ${pass.name} no puede ser diferente a ${pass2.name}`;
        mensaje = `El campo ${pass.name} no puede estar vacío`;
    }
    pass.setCustomValidity(mensaje);
}
//Pass2
function validarPass2Evento(e){
    const pass = e.target;
    const pass2 = e.target;
    actualizarErroresPass2(pass,pass2);
    validarCampo(pass2,pass);
}
function actualizarErroresPass2(pass2,pass){
    const contenido = pass2.value;
    const contenido2 = pass.value;
    let mensaje = "";

    if(contenido === ""){
        mensaje = `EL campo ${pass2.name} no puede estar vacío`;
    }else if((contenido === "")&& (contenido !== contenido2)){
        mensaje = `El campo ${pass2.name} no puede ser diferente a ${pass.name}`;
        mensaje = `El campo ${pass2.name} no puede estar vacío`;
    }
    pass2.setCustomValidity(mensaje);
}

function validarCampoEvento(e) {
    return validarCampo(e.target);
}

function validarCampo(campo) {
    eliminarErrores(campo);
    return campo.checkValidity();
}
//Nombre
function revisarErroresNombreEvento(e) {
    const campo = e.target;
    actualizarErroresNombre(campo);
    if(campo.validity.valid) {
        eliminarErrores(campo);
    }
}

function notificarErrorNombreEvento(e) {
    const nombre = e.target;
    let mensajes = [];
    if(nombre.validity.customError) {
        mensajes.push(nombre.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, nombre);
}
//Edad
function notificarErrorEdadEvento(e) {
    const edad = e.target;
    let mensajes = [];
    if(edad.validity.customError) {
        mensajes.push(edad.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, edad);
}
function revisarErroresEdadEvento(e) {
    const campo = e.target;
    actualizarErroresEdad(campo);
    if(campo.validity.valid) {
        eliminarErrores(campo);
    }
}
//Pass

function notificarErrorPassEvento(e){
    const pass = e.target;
    let mensajes = [];
    if(pass.validity.customError){
        mensajes.push(pass.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, pass);
}
function revisarErroresPassEvento(e){
    const campo = e.target;
    actualizarErroresPass(campo);
    if(campo.validity.valid){
        eliminarErrores(campo);
    }
}
//Pass2
function notificarErrorPass2Evento(e){
    const pass2 = e.target;
    let mensajes = [];
    if(pass2.validity.customError){
        mensajes.push(pass2.validationMessage);
    }
    mostrarMensajesErrorEn(mensajes, pass2);
}
function revisarErroresPass2Evento(e){
    const campo = e.target;
    actualizarErroresPass2(campo);
    if(campo.validity.valid){
        eliminarErrores(campo);
    }
}
function hayErrorEnCampo(campo) {
    return campo.classList.contains(CLASE_ERROR_CAMPO);
}

function eliminarErrores(campo) {
    // Eliminamos la clase de error del elemento
    campo.classList.remove(CLASE_ERROR_CAMPO);
    // Eliminamos los mensajes de error
    const contenedorErrores = document.getElementById(`${campo.name}-${CLASE_ERROR_CAMPO}`);
    if(contenedorErrores) {
        contenedorErrores.parentElement.removeChild(contenedorErrores);
    }
}

function mostrarMensajesErrorEn(mensajes, campo) {
    // añadimos la clase que cambia el borde del campo de negro a rojo
    campo.classList.add(CLASE_ERROR_CAMPO);
    let contenedorMensajes = document.createElement("div");
    // Añadimos la clase para el texto
    contenedorMensajes.classList.add(CLASE_ERROR_MENSAJES);

    contenedorMensajes.setAttribute("aria-describedby",campo.id);
    // Añadimos el id del div para después poder eliminarlo con facilidad
    contenedorMensajes.id = `${campo.name}-${CLASE_ERROR_CAMPO}`;
    for(let mensaje of mensajes) {
        let parrafo = document.createElement("p");
        parrafo.textContent = mensaje;
        // Añadimos el párrafo al contenedor de mensajes
        contenedorMensajes.appendChild(parrafo);
    }
    insertarDespues(campo, contenedorMensajes);
}

/**
 * Método de utilidad que añade la funcionalidad al DOM de añadir un elemento (campoAnadir) HTML detrás
 * de otro elemento del DOM indicado (campoReferencia)
 * @param {Element} campoReferencia campo detrás del que hay que añadir el nuevo elemento
 * @param {Element} campoAnadir nuevo elemento que hay que añadir
 */
function insertarDespues(campoReferencia, campoAnadir){
    if(campoReferencia.nextSibling){
        // El elemento de referencia tiene un hermano detrás
        // El elemento a añadir se añade después del siguiente hermano de "campoReferencia"
        campoReferencia.parentNode.insertBefore(campoAnadir,campoReferencia.nextSibling); 
    } else { 
        // El elemento de referencia no tiene un hermano detrás
        // Se añade como último hijo de su padre
        campoReferencia.parentNode.appendChild(campoAnadir); 
    }
}