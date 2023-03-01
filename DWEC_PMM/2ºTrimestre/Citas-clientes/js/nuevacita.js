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
  
  e.preventDefault();
  const cita = obtenerDatosCita();
  // const errores = validarCita(cita);

  const nifCliente = localStorage.getItem('nif');
  cita.nifCliente = nifCliente;

  // if (Object.keys(errores).length === 0) {
    await Controlador.setCita(cita);
    window.location.href = "lista-citas.html";
  // } else {
  //   mostrarErrores(errores);
  // }

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
  const mensajesError = document.getElementById(`error-${campo}`);
  if(mensajesError){
      mensajesError.parentElement.removeChild(mensajesError);
  }

}

function notificarErrores(e){
  const campo = e.target;
  campo.classList.add(CLASE_ERROR_CAMPO);

  let errores = [];

  if(campo.validity.valueMissing){
      errores.push(`El campo ${campo.name} es obligatorio`);
  }
  if(campo.validity.rangeOverflow){
      errores.push(`Debe contener un valor menor a ${campo.max}`);
  }
  mostrarMensajesErrorEn(errores,campo);

}

function mostrarMensajesErrorEn(mensajes, campo){

  const formulario = document.getElementById("formulario");


    for (const campo in errores) {
       const errorP = document.getElementById(`error-${campo}`);
       errorP.innerText = errores[campo];
     
       const input = formulario.querySelector(`[name=${campo}]`);
       const errorDiv = input.nextElementSibling;
    
       errorDiv.style.display = "block";
  
       // Añadir clase "border-red-600" al input correspondiente
       input.classList.add("border-red-600");
     }

  insertarDespues(campo, div);
}





















/**
 * 
 * @param {*} cita 
 * @returns errores
 */

// function validarCita(cita) 
// {
//   const errores = {};

//   if (!cita.fecha) {
//     errores.fecha = "La fecha es obligatoria";
//   }

//   if (!cita.hora) {
//     errores.hora = "La hora es obligatoria";
//   }

//   if (!cita.descripcion) {
//     errores.descripcion = "La descripción es obligatoria";
//   } else if (cita.descripcion.length > 200) {
//     errores.descripcion = "La descripción no puede tener más de 200 caracteres";
//   }

//   if (cita.detalles && cita.detalles.length > 400) {
//     errores.detalles = "Los detalles no pueden tener más de 400 caracteres";
//   }

//   return errores;
// }

// /**
//  * 
//  * @param {*} errores 
//  */

// function mostrarErrores(errores) 
// {
//   const formulario = document.getElementById("formulario");


//   for (const campo in errores) {
//     const errorP = document.getElementById(`error-${campo}`);
//     errorP.innerText = errores[campo];
   
//     const input = formulario.querySelector(`[name=${campo}]`);
//     const errorDiv = input.nextElementSibling;
  
//     errorDiv.style.display = "block";

//     // Añadir clase "border-red-600" al input correspondiente
//     input.classList.add("border-red-600");
//   }
// }

