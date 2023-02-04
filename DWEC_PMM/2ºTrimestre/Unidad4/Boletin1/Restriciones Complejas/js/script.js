const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJES = "campoError";

const MIN_INTERESES = 2;

crearListeners();

function crearListeners() {

    //Añadir el novalidate a el formulario
    document.getElementById("formulario").setAttribute("novalidate",true);

    document.getElementById("pass").addEventListener("blur", validarPassEvento, false);
    document.getElementById("confirmPass").addEventListener("blur", validarPass2Evento, false);
    // document.getElementById("genero").addEventListener("blur", validarHombreEvento, false);
    // document.getElementById("mujer").addEventListener("blur", validarMujerEvento, false);

    document.getElementById("pass").addEventListener("invalid", notificarErrorPassEvento, false);
    document.getElementById("confirmPass").addEventListener("invalid", notificarErrorPass2Evento, false);
    // document.getElementById("genero").addEventListener("invalid", notificarErrorHombreEvento, false);
    // document.getElementById("mujer").addEventListener("invalid", notificarErrorMujerEvento, false);

    document.getElementById("pass").addEventListener("input", revisarErroresEvento, false);
    document.getElementById("confirmPass").addEventListener("input", revisarErroresEvento, false);
    // let genero = document.querySelector('input[name="genero"]:checked');
    // document.getElementById("genero").addEventListener("input", revisarErroresEvento, false);
    // document.getElementById("mujer").addEventListener("input", revisarErroresEvento, false);

    

}
// if(!genero){
//     alert("Debe seleccionar un genero");
// }
//PASS

function validarPassEvento(e) {
    const pass = e.target;
    actualizarErroresPass(pass,confirmPass);

    validarCampo(pass);
}
//CONFIRM PASS
function validarPass2Evento(e) {
   
    const confirmPass = e.target;
    actualizarErroresPass2(confirmPass,pass);

    validarCampo(confirmPass);
}
//GENERO
//  function validarHombreEvento(e) {
   
//      const genero = e.target;
//      actualizarErroresHombre(genero);

//     validarCampo(genero);
//  }
//PASS
function actualizarErroresPass(pass,confirmPass) {
    const contenido = pass.value;
    const contenido2 = confirmPass.value;
    let mensaje = "";

    if(contenido === "") {
        mensaje = `El campo ${pass.name} no puede estar vacío`;
    }if(contenido !== contenido2) {
        mensaje = `El campo ${pass.name} no puede ser diferente a confirmPass`;
    }
    pass.setCustomValidity(mensaje);
    
}
//CONFIRM PASS
function actualizarErroresPass2(confirmPass,pass) {
    const contenido2 = confirmPass.value;
    const contenido = pass.value;
    let mensaje = "";

    if(contenido2 === ""){
        mensaje = `El campo confirmPass no puede estar vacío`;
    }if(contenido2 !== contenido) {
        mensaje = `El campo confirmPass no puede ser diferente a ${pass.name}`;
    }
    confirmPass.setCustomValidity(mensaje);
    
}
//GENERO
//   function actualizarErroresHombre(genero) {
//       const genero = genero.value;

//       let mensaje = "";

//       if(genero){
//         mensaje = `Debe seleccionar un genero`;
//       }
//       genero.setCustomValidity(mensaje);
    
//  }

function validarCampoEvento(e) {
    return validarCampo(e.target);
}

function validarCampo(campo) {
    eliminarErrores(campo);
    return campo.checkValidity();
}

function revisarErroresEvento(e) {
    const campo = e.target;
    actualizarErroresPass(campo);
    if(campo.validity.valid) {
        eliminarErrores(campo);
    }
}
//PASS
function notificarErrorPassEvento(e) {
    const pass = e.target;
    
    let mensajes = [];
    if(pass.validity.customError) {
        mensajes.push(pass.validationMessage);
    }
    
    mostrarMensajesErrorEn(mensajes, pass);
}
//CONFIRM PASS
function notificarErrorPass2Evento(e) {
    const confirmPass = e.target;
    
    let mensajes = [];
    if(confirmPass.validity.customError) {
        mensajes.push(confirmPass.validationMessage);
    }
    
    mostrarMensajesErrorEn(mensajes, confirmPass);
}
//GENERO
//  function notificarErrorGeneroEvento(e) {
//      const genero = e.target;
    
//      let mensajes = [];
//      if(genero.validity.customError) {
//          mensajes.push(genero.validationMessage);
//      }
//  }
     mostrarMensajesErrorEn(mensajes, genero);
// }
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