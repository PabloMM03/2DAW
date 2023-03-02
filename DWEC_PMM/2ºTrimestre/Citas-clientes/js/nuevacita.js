import { ControladorPHP as Controlador } from "./controlador.js";

const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJE = "campoAnadir";

crearListeners();

/**
 * Listeners
 */
function crearListeners() 
{
  document.getElementById("cancelar").addEventListener("click", cancelarCita, false);

  document.getElementById("fecha").addEventListener("blur", validarCampoEvento, false);
  document.getElementById("hora").addEventListener("blur", validarCampoEvento, false);
  document.getElementById("descripcion").addEventListener("blur", validarCampoEvento, false);
  document.getElementById("detalles").addEventListener("blur", validarCampoEvento, false);

  document.getElementById("fecha").addEventListener("invalid", notificarErrores, false);
  document.getElementById("hora").addEventListener("invalid", notificarErrores, false);
  document.getElementById("descripcion").addEventListener("invalid", notificarErrores, false);
  document.getElementById("detalles").addEventListener("invalid", notificarErrores, false);

  document.getElementById("fecha").addEventListener("input", revisarErrores, false);
  document.getElementById("hora").addEventListener("input", revisarErrores, false);
  document.getElementById("descripcion").addEventListener("input", revisarErrores, false);
  document.getElementById("detalles").addEventListener("input", revisarErrores, false);

  window.addEventListener("DOMContentLoaded", mostrarNombreYApe, false);

  document.getElementById("formulario").addEventListener("submit", añadirCita, false);
}

/**
 * Añadir cita nueva
 * @param {*} e 
 */

async function añadirCita(e) 
{
  
  const cita = obtenerDatosCita();
  validarCita(e);

  const nifCliente = localStorage.getItem('nif');
  cita.nifCliente = nifCliente;
    await Controlador.setCita(cita);
    window.location.href = "lista-citas.html";


}

/**
 * json datos de la cita
 * @param {string} nif - NIF del cliente
 * @returns {object} Datos de la cita
 */
function obtenerDatosCita(nif) 
{
  const formulario = document.getElementById("formulario");
  const datos = new FormData(formulario);

  return {
    id: datos.get('id'),
    nifCliente: nif,
    fecha: datos.get('fecha'),
    hora: datos.get('hora'),
    descripcion: datos.get('descripcion'),
    detalles: datos.get('detalles')

  };

}

/**
 * Mostrar nombre y apellidos
 */
function mostrarNombreYApe() 
{

  const nombre = localStorage.getItem('nombre');
  const apellidos = localStorage.getItem('apellidos');

  const campo = document.getElementById('cita-cliente');
  campo.innerHTML = nombre + " " + apellidos;

}

/**
 * cancelar cita, redirige a citas clientes 
 * @param {*} e 
 */

async function cancelarCita(e) 
{
  e.preventDefault();
  const cita = obtenerDatosCita();
  const nifCliente = localStorage.getItem('nif');
  cita.nifCliente = nifCliente;
  window.location.href = "lista-citas.html";
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
  if(campo.validity.rangeOverflow){
    mensajes.push(`Debe contener un valor menor a ${campo.max}`);
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
      // error.setAttribute("id", errorId);
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
      // error.setAttribute("id", errorId);
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

function validarCita(e){
  
  let formValido = validarCampo(document.getElementById("fecha"));
  formValido = validarCampo(document.getElementById("hora"))&& formValido;
  formValido = validarCampo(document.getElementById("descripcion"))&& formValido;
  formValido = validarCampo(document.getElementById("detalles"))&& formValido;

  if(formValido){
      console.log("El formulario está validado correctamente sin errores.");
  }else{
      e.preventDefault();
      console.error("El formulario no está validado ya que tiene errores.");
  }
}



















