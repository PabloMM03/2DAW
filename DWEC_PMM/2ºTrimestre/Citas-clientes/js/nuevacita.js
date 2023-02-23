import {ControladorPHP as Controlador} from "./controlador.js";

crearListeners();

/**
 * Listeners
 */
function crearListeners()
{

    document.getElementById("formulario").addEventListener("submit",añadirCita,false);

}

/**
 *  Añadir cita
 */
async function añadirCita()
{

   cita = obtenerDatosCita();
   await Controlador.setCita(cita);
  
}
/**
 * 
 * @returns json datos de la cita
 */
function obtenerDatosCita()
{
  const formulario = document.getElementById("formulario");
  const datos = new FormData(formulario);

  return {
    id: datos.get('id'),
    nifCliente: datos.get('nifCliente'),
    fecha: datos.get('fecha'),
    hora: datos.get('hora'),
    descripcion: datos.get('descripcion'),
    detalles: datos.get('detalles')

  };

}