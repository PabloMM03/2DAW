import { ControladorPHP as Controlador } from "./controlador.js";

const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJE = "campoAnadir";

crearListeners();

/**
 * Crear Listeners
 */

function crearListeners() {

  document.getElementById("cancelar").addEventListener("click", () => window.location.href = "index.html", false);

  document.getElementById("nombre").addEventListener("blur", validarCampoEvento, false);
  document.getElementById("apellidos").addEventListener("blur", validarCampoEvento, false);
  document.getElementById("email").addEventListener("blur", validarCampoEvento, false);
  document.getElementById("telefono").addEventListener("blur", validarCampoEvento, false);
  document.getElementById("nif").addEventListener("blur", validarCampoEvento, false);

  document.getElementById("nombre").addEventListener("invalid", notificarErrores, false);
  document.getElementById("apellidos").addEventListener("invalid", notificarErrores, false);
  document.getElementById("email").addEventListener("invalid", notificarErrores, false);
  document.getElementById("telefono").addEventListener("invalid", notificarErrores, false);
  document.getElementById("nif").addEventListener("invalid", notificarErrores, false);

  document.getElementById("nombre").addEventListener("input", revisarErrores, false);
  document.getElementById("apellidos").addEventListener("input", revisarErrores, false);
  document.getElementById("email").addEventListener("input", revisarErrores, false);
  document.getElementById("telefono").addEventListener("input", revisarErrores, false);
  document.getElementById("nif").addEventListener("input", revisarErrores, false);

  document.getElementById("formulario").addEventListener("submit", añadirCliente, false);
  
  // document.getElementById("formulario").addEventListener("submit",validarForm,false);
}
/**
 * Añadir cliente
 */

async function añadirCliente(e) 
{
 
  const cliente = obtenerDatosCliente();
  validarCliente(e);
    await Controlador.setCliente(cliente);
    window.location.href="index.html";
 
}

/**
 * 
 * @returns json con datos del cliente
 */

function obtenerDatosCliente() 
{

  const formulario = document.getElementById("formulario");
  const datos = new FormData(formulario);

  return {
    nombre: datos.get('nombre'),
    apellidos: datos.get('apellidos'),
    email: datos.get('email'),
    telefono: datos.get('telefono'),
    nif: datos.get('nif')

  };

}


//Validar formulario

/**
 * 
 * @param {*} e 
 */
function validarCampoEvento(e){
  const campo = e.target;
  validarCampo(campo);
}

function validarCampo(campo){
  eliminarErrores(campo);
  return campo.checkValidity();
}

function revisarErrores(e){
  const campo = e.target;
  if(campo.validity.valid){
      eliminarErrores(campo);
  }
}
function eliminarErrores(campo){
  campo.classList.remove(CLASE_ERROR_CAMPO);
  const mensajesError = document.getElementById(`error-${campo.name}`);
  if(mensajesError){
      mensajesError.parentElement.removeChild(mensajesError);
  }
}

function notificarErrores(e){
  const campo = e.target;
  campo.classList.add(CLASE_ERROR_CAMPO);

  let mensajes = [];

  if(campo.validity.valueMissing){
    mensajes.push(`El campo ${campo.name} es obligatorio`);
  }
  if(campo.validity.typeMismatch){
    mensajes.push(`Los datos no tienen el formato correcto`);
}
if(campo.validity.rangeUnderflow || campo.validity.rangeOverflow){
    mensajes.push(`Debe contener un valor entre ${campo.min} y ${campo.max}`);
}

  mostrarMensajesErrorEn(mensajes,campo);

}

/**
 * 
 * @param {*} mensajes 
 * @param {*} campo 
 */
function mostrarMensajesErrorEn(mensajes, campo) {

  const errorId = `error-${campo.name}`;
  let error = document.getElementById(errorId);

  // if (!error) {
  //   error = campo.nextElementSibling;
  // }

  if (error) {
      error.setAttribute("id", errorId);
      error.classList.add(CLASE_ERROR_MENSAJE);
      error.textContent = mensajes.join("\n");
      error.style.display = "block";
      campo.classList.add(CLASE_ERROR_CAMPO);
      campo.setAttribute("aria-invalid", true);
      campo.setAttribute("aria-describedby", errorId);
      error.style.color = "red";
      error.focus();
      
  } else {
      error = document.createElement("p");
      error.setAttribute("id", errorId);
      error.classList.add(CLASE_ERROR_MENSAJE);
      insertarDespues(campo, error);
      error.textContent = mensajes.join("\n");
      error.style.display = "block";
      campo.classList.add(CLASE_ERROR_CAMPO);
      campo.setAttribute("aria-invalid", true);
      campo.setAttribute("aria-describedby", errorId);
      error.style.color = "red";
      error.focus();
    }
}

/**
 * 
 * @param {*} campoReferencia 
 * @param {*} campoAnadir 
 */


function insertarDespues(campoReferencia, campoAnadir){
  if(campoReferencia.nextSibling){
      campoReferencia.parentNode.insertBefore(campoAnadir, campoReferencia.nextSibling);
  }else{
      campoReferencia.parentNode.appendChild(campoAnadir);
  }
}

/**
 * 
 * @param {*} e 
 */

function validarCliente(e){
  
  let formValido = validarCampo(document.getElementById("nombre"));
  formValido = validarCampo(document.getElementById("apellidos"))&& formValido;
  formValido = validarCampo(document.getElementById("email"))&& formValido;
  formValido = validarCampo(document.getElementById("telefono"))&& formValido;
  formValido = validarCampo(document.getElementById("nif"))&& formValido;


  if(formValido){
      console.log("El formulario está validado correctamente sin errores.");
  }else{
      e.preventDefault();
      console.error("El formulario no está validado ya que tiene errores.");
  }
}












































// function validarCliente(cliente) {
//   const errores = {};
//   const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

//   if (!cliente.nombre) {
//     errores.nombre = "El nombre es obligatorio";
//   }else if(cliente.nombre.length < 4){
//     errores.nombre = 'El nombre no puede tener menos de 4 caracteres';
//   }else if(cliente.nombre.length > 30){
//     errores.nombre = 'El nombre no puede tener mas de 30 caracteres';
//   }if(cliente.nombre){
//     errores.nombre ='';
//   }

//   if (!cliente.apellidos) {
//     errores.apellidos = "Los apellidos son obligatorios";
//   }else if(cliente.apellidos.length < 8){
//     errores.apellidos = 'El apellido no puede tener menos de 8 caracteres';
//   }else if(cliente.apellidos.length > 50){
//     errores.apellidos = 'El apellido no puede tener mas de 50 caracteres';
//   }if(cliente.apellidos){
//     errores.apellidos ='';
//   }

//   if (!cliente.email) {
//     errores.email = "El email es obligatorio";
//   }else if(cliente.email.value !== regexCorreo){
//     errores.email = 'El email no tiene el formato correcto';
//   }if(cliente.email){
//     errores.email ='';
//   }

//   if (!cliente.telefono) {
//     errores.telefono = "El telefono es obligatorio";
//   }else if(cliente.telefono.length < 8){
//     errores.telefono = 'El telefono no puede tener menos de 8 caracteres';
//   }if(cliente.telefono){
//     errores.telefono ='';
//   }
 
//   if (!cliente.nif) {
//     errores.nif = "El nif es obligatorio";
//   }else if(cliente.nif.length < 8){
//     errores.nif = 'El nif no puede tener menos de 8 caracteres';
//   }if(cliente.nif){
//     errores.nif ='';
//   }

//   return errores;
// }

// /**
//  * 
//  * @param {*} errores 
//  */

// function mostrarErrores(errores) {
//   const formulario = document.getElementById("formulario");


//   for (const campo in errores) {
//     const errorP = document.getElementById(`error-${campo}`)
//     errorP.innerText = errores[campo];
   
//     const input = formulario.querySelector(`[name=${campo}]`);
//     // const errorDiv = input.nextElementSibling;
//   if(`${campo}` !== ''){
//     input.classList.remove("border-red-600");
//   }
//     // errorDiv.style.display = "block";

//     // Añadir clase "border-red-600" al input correspondiente
//     input.classList.add("border-red-600");

//   }
// }










