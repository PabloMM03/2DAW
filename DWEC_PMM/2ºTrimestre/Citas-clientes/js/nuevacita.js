import { ControladorPHP as Controlador } from "./controlador.js";

crearListeners();

/**
 * Listeners
 */
function crearListeners() {
  document.getElementById("cancelar").addEventListener("click", cancelarCita, false);
  document.getElementById("formulario").addEventListener("submit", añadirCita, false);

  window.addEventListener("DOMContentLoaded", mostrarNombreYApe, false);
}

/**
 * Añadir cita nueva
 * @param {*} e 
 */

async function añadirCita(e) {
  
  e.preventDefault();
  const cita = obtenerDatosCita();
  const errores = validarCita(cita);

  const nifCliente = localStorage.getItem('nif');
  cita.nifCliente = nifCliente;

  if (Object.keys(errores).length === 0) {
    await Controlador.setCita(cita);
    window.location.href = "lista-citas.html";
  } else {
    mostrarErrores(errores);
  }

}

/**
 * json datos de la cita
 * @param {string} nif - NIF del cliente
 * @returns {object} Datos de la cita
 */
function obtenerDatosCita(nif) {
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
function mostrarNombreYApe() {

  const nombre = localStorage.getItem('nombre');
  const apellidos = localStorage.getItem('apellidos');

  const campo = document.getElementById('cita-cliente');
  campo.innerHTML = nombre + " " + apellidos;

}

/**
 * cancelar cita, redirige a citas clientes 
 * @param {*} e 
 */

async function cancelarCita(e) {
  e.preventDefault();
  const cita = obtenerDatosCita();
  const nifCliente = localStorage.getItem('nif');
  cita.nifCliente = nifCliente;
  window.location.href = "lista-citas.html";
}

/**
 * 
 * @param {*} cita 
 * @returns errores
 */

function validarCita(cita) {
  const errores = {};

  if (!cita.fecha) {
    errores.fecha = "La fecha es obligatoria";
  }

  if (!cita.hora) {
    errores.hora = "La hora es obligatoria";
  }

  if (!cita.descripcion) {
    errores.descripcion = "La descripción es obligatoria";
  } else if (cita.descripcion.length > 200) {
    errores.descripcion = "La descripción no puede tener más de 200 caracteres";
  }

  if (cita.detalles && cita.detalles.length > 400) {
    errores.detalles = "Los detalles no pueden tener más de 400 caracteres";
  }

  return errores;
}

/**
 * 
 * @param {*} errores 
 */

function mostrarErrores(errores) {
  const formulario = document.getElementById("formulario");


  for (const campo in errores) {
    const errorP = document.getElementById(`error-${campo}`);
    errorP.innerText = errores[campo];
   
    const input = formulario.querySelector(`[name=${campo}]`);
    const errorDiv = input.nextElementSibling;
    errorDiv.innerText = errores[campo];
    errorDiv.style.display = "block";

    // Añadir clase "border-red-600" al input correspondiente
    input.classList.add("border-red-600");
  }
}

