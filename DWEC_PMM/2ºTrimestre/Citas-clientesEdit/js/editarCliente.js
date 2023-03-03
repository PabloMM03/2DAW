import { ControladorPHP as Controlador } from "./controlador.js";


crearListeners();

/**
 * Crear Listeners
 */

function crearListeners() 
{

  document.getElementById("formulario").setAttribute("novalidate", true);


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

  window.addEventListener("DOMContentLoaded", mostrarNombreYApe, false);
  
  document.querySelectorAll("input")[0].focus();

  document.getElementById("formulario").addEventListener("submit", actualizarCliente, false);
}

/**
 * Añadir cliente
 * 
 * primero se valida el cliente, si todos los campos son validos se recogen los datos del formulario 
 * con la funcion obtenerDatosCliente y se envian al servidor.
 * Se espera a que se resuelva la promesa devuelta por Controlador.setCliente y valida los datos recibidos con la función datosForm.
 * @param {*} e 
 */


async function actualizarCliente(e) 
{
  try {

    const formValido = validarCliente(e);
  
    if (formValido) {
      const cliente = obtenerDatosCliente();
      const datosRecogidos = await Controlador.setCliente(cliente);
      const validacion = datosForm(datosRecogidos);

      if (!validacion) {
        window.location.href = "index.html";
      }
    }
    document.getElementsByClassName("border-red-600")[0].focus();
  } catch (error) {
    console.error(error);
  }
}

/**
 * se utilizan los inputs del formulario para obtener los valores de los campos y 
 * se almacenan en un objeto datos que se devuelve al final de la función.
 * se recorren los inputs con un forEach, asignando los valores de cada input al objeto datos
 * @returns json con datos del cliente
 */

function obtenerDatosCliente() 
{
  const inputs = document.querySelectorAll('#formulario input');
  const datos = {};
  
  inputs.forEach(input => {
    datos[input.name] = input.value.trim();
  });
  
  return datos;
}


/**
 * Mostrar mensajes de error en caso de que un cliente ya se encuentre registrado 
 * con un gmail o nif en el sistema
 * @param {*} datosRecogidos 
 * @returns 
 */

function datosForm(datosRecogidos)
{

  let validado = false;
  for (let i = 0; i < datosRecogidos.camposError.length; i++) {
        // Asignar mensaje de error al elemento correspondiente
    const errorCampo = document.getElementById(`error-${datosRecogidos.camposError[i]}`);
    errorCampo.innerHTML = datosRecogidos.mensajesError[i];

    // Añadir la clase 'border-red-600' al elemento con error
    const errorEnCampo = document.getElementById(`${datosRecogidos.camposError[i]}`);
    errorEnCampo.classList.add("border-red-600");

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
 * la función verifica si el campo que generó el evento es uno de los campos especiales (email, telefono o nif) y, 
 * si es así, muestra un mensaje de error personalizado
 * @param {*} e 
 */
function notificarErrores(e) 
{
  const mensajes = mensajeError(e.target.validity);

  const id = e.target.id;
  const name = e.target.name;
  const error = document.getElementById(`error-${name}`);

  if (id === "email" || id === "telefono" || id === "nif") {
    error.innerHTML = e.target.title;
  } else {
    error.innerHTML = mensajes;
  }
  
  e.target.classList.add("border-red-600");
}

/**
 * Mostrar nensajes de error con sus restricciones
 * @param {*} e 
 * @returns 
 */

function mensajeError(e) 
{
  let mensajes = "";

  if (e.valueMissing) {
    mensajes = "Este campo es obligatorio"; 
  }else if (e.tooShort) {
    mensajes = "Este campo tiene menos carácteres de los requeridos";
  } else if (e.tooLong) {
    mensajes = "Este campo tiene más carácteres de los requeridos";
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


function validarCliente(e)
{
  e.preventDefault();

let formValido = validarCampo(document.getElementById("nombre"));
    formValido = validarCampo(document.getElementById("apellidos"))&& formValido;
    formValido = validarCampo(document.getElementById("email"))&& formValido;
    formValido = validarCampo(document.getElementById("telefono"))&& formValido;
    formValido = validarCampo(document.getElementById("nif"))&& formValido;

    return formValido;
}