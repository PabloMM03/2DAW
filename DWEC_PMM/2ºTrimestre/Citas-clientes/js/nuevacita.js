import { ControladorPHP as Controlador } from "./controlador.js";

const CLASE_ERROR_CAMPO = "error";
const CLASE_ERROR_MENSAJE = "campoAnadir";

crearListeners();

/**
 * Listeners
 */
function crearListeners() 
{

  document.getElementById("formulario").setAttribute("novalidate", true);
  
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
  try {

    e.preventDefault();
    
    let formValido = validarCampo(document.getElementById("fecha"));
        formValido = validarCampo(document.getElementById("hora"))&& formValido;
        formValido = validarCampo(document.getElementById("descripcion"))&& formValido;

  if (formValido) {       
    const cita = obtenerDatosCita();
    const nifCliente = localStorage.getItem('nif');
    cita.nifCliente = nifCliente;

    const datosRecogidos = await Controlador.setCita(cita);
    const validacion = datosForm(datosRecogidos);

      if (!validacion) {
        window.location.href = "lista-citas.html";
      }
    }
      document.getElementsByClassName("border-red-600")[0].focus();
      } catch (error) {

      console.error(error);
    }
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


function datosForm(datosRecogidos)
{

  let validado = false;
  for (let i = 0; i < datosRecogidos.camposError.length; i++) {
        // Asignar mensaje de error al elemento correspondiente
    const campoError = document.getElementById(`error-${datosRecogidos.camposError[i]}`);
    campoError.innerHTML = datosRecogidos.mensajesError[i];

    // Añadir la clase 'border-red-600' al elemento con error
    const campoConError = document.getElementById(`${datosRecogidos.camposError[i]}`);
    campoConError.classList.add("border-red-600");

        // Marcar el formulario como validado si hay algún error
    validado = true;
  }
  return validado;

}

/**
 * Validar campo
 * @param {*} campo 
 * @returns 
 */
function validarCampo(campo) 
{
  return campo.checkValidity();
}


/**
 * 
 * @param {*} e 
 * @returns 
 */

function validarCampoEvento(e) 
{
  return e.target.checkValidity();
}

/**
 * Primero, la función llama a la función mensajeError pasándole como parámetro el objeto validity del campo del formulario que generó el evento. 
 * La función mensajeError devuelve un mensaje de error correspondiente al tipo de validación que falló en el campo.
 * Luego, la función verifica si el campo que generó el evento es uno de los campos especiales (email, telefono o nif) y, 
 * si es así, muestra un mensaje de error personalizado
 * @param {*} e 
 */
function notificarErrores(e) 
{
  const mensajes = mensajeError(e.target.validity);

  const name = e.target.name;
  const errorElement = document.getElementById(`error-${name}`);

  errorElement.innerHTML = mensajes;
  e.target.classList.add("border-red-600");
}

/**
 * Mostrar nensajes de error
 * @param {*} e 
 * @returns 
 */

function mensajeError(e) 
{
  let mensajes = "";

  if (e.valueMissing) {
    mensajes = "Este campo es obligatorio";
  }else if (e.tooShort) {
    mensajes = "Este campo tiene menos carácteres que los requeridos";
  } else if (e.tooLong) {
    mensajes = "Este campo tiene más carácteres que los requeridos";
  }

  return mensajes;
}

/**
 * Se comprueba si el campo correspondiente al evento tiene un valor válido. 
 * Si es así, se limpia el mensaje de error asociado a ese campo y se quita la clase CSS border-red-600
 * @param {*} e 
 */

function revisarErrores(e) 
{
  if (e.target.checkValidity()) {
    document.getElementById(`error-${e.target.name}`).textContent  = "";
    e.target.classList.remove("border-red-600");
  }
}

















