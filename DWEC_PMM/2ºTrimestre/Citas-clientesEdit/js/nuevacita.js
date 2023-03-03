import { ControladorPHP as Controlador } from "./controlador.js";

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
 * primero se valida la cita, si todos los campos son validos se recogen los datos del formulario
 * con la funcion obtenerDatosCita y se envian al servidor.
 * Se espera a que se resuelva la promesa devuelta por Controlador.setCita y valida los datos recibidos con la función datosForm.
 * @param {*} e 
 */

async function añadirCita(e) 
{
  try {

    const formValido = validarCita(e);

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
 *se convierte la colección de elementos devuelta por formulario.elements en un array para poder aplicar 
 *el método filter y se filtra solo los elementos que sean etiquetas input. Luego, con reduce para construir 
 *el objeto datos,y se asigna cada valor al objeto datos utilizando su propiedad name
 * @param {*} nif 
 * @returns 
 */
function obtenerDatosCita(nif) {
  const formulario = document.getElementById("formulario");
  const inputs = Array.from(formulario.elements).filter(element => element.tagName === "INPUT");
  
  return inputs.reduce((datos, input) => {
    datos[input.name] = input.value.trim();
    return datos;
  }, { id: '', nifCliente: nif, fecha: '', hora: '', descripcion: '', detalles: '' });
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

/**
 * Mostrar mensajes de error en caso de que coincida una cita el mismo dia a la misma hora
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

/**
 * Validar campos cita
 * @param {*} e 
 * @returns 
 */
function validarCita(e)
{
  e.preventDefault();
    
    let formValido = validarCampo(document.getElementById("fecha"));
        formValido = validarCampo(document.getElementById("hora"))&& formValido;
        formValido = validarCampo(document.getElementById("descripcion"))&& formValido;

        return formValido;
}















