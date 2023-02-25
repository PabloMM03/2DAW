import {ControladorPHP as Controlador} from "./controlador.js";

crearListeners();

/**
 * Listeners
 */
function crearListeners()
{
  document.getElementById("cancelar").addEventListener("click", () => window.location.href = "index.html", false);

    document.getElementById("formulario").addEventListener("submit", añadirCita, false);
    window.addEventListener("DOMContentLoaded", mostrarNombreYApe, false);
}
/**
 * Añadir cita nueva
 * @param {*} e 
 */

async function añadirCita(e)
{
  e.preventDefault();
   const cita = obtenerDatosCita();
   const nifCliente = localStorage.getItem('nif');
   cita.nifCliente = nifCliente;
   await Controlador.setCita(cita);
   window.location.href="lista-citas.html";
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