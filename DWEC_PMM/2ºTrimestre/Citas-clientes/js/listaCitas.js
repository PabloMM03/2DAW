import { ControladorPHP as Controlador } from "./controlador.js";


crearListeners();

/**
 * Crear listeners
 */

function crearListeners() 
{

    window.addEventListener("DOMContentLoaded", mostrarCitasCliente, false);
    window.addEventListener("DOMContentLoaded", mostrarNombreYApe, false);
    document.getElementById("volverClientes").addEventListener("click", () => window.location.href="index.html");
    document.getElementById("crearCita").addEventListener("click", () => window.location.href="nueva-cita.html");
}

function mostrarNombreYApe(cita)
{
    const campo = document.getElementById('cita-cliente');
    campo.value = `${fecha}, ${apellido}`;
}
  
/**
 * Mostrar citas del cliente
 */

async function mostrarCitasCliente() 
{
    let Añadir = "";
    const citas = await Controlador.mostrarCitas();
    const cita = citas.datos;
    for (let i = 0; i < cita.length; i++) {
        Añadir += getHTMLClienteCita(cita[i]);

    }
    document.getElementById("listado-citas").innerHTML = Añadir;

}

/**
 * 
 * @param {object} cita 
 * @returns 
 */

function getHTMLClienteCita(cita) 
{
    const { detalles, descripcion, hora, fecha, nifCliente, id } = cita;
    return `
    <tr>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <p class="text-gray-700">${fecha}</p>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
            <p class="text-gray-700">${hora}</p>
        </td>
        <td class="px-6 py-4 border-b border-gray-200 leading-5 text-gray-700">
            <p class="text-gray-600">${descripcion}</p>
        </td>
        <td class="px-6 py-4 border-b border-gray-200 leading-5 text-gray-700">
            <p class="text-gray-600">${detalles}</p>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
            <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-citaid="${id}" datanifcliente="${nifCliente}" data-citafecha="${fecha}" data-citahora="${hora}">Eliminar cita</a>
        </td>
    </tr>

    `;

}