import {ControladorPHP as Controlador} from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners(){
    document.getElementById("crearCita").addEventListener("click", () => window.location.href="./nueva-cita.html", false);
    document.getElementById("volverClientes").addEventListener("click", () => window.location.href="/index.html", false);

    //// Mostrar la lista de citas cuando se cargue la web ////
    window.addEventListener('DOMContentLoaded', mostrarCitas, false);

    //// Mostrar el nombre bajo citas ////
    window.addEventListener('load', mostrarDatos, false);
}

/**
 * Muestra clientes en la tabla clientes
 */
async function mostrarCitas(e){    
    const nif = localStorage.getItem('nifSeleccionado');

    const tbody = document.getElementById('listado-citas');
    const datosGrande = await Controlador.mostrarCitas(nif);

    const datosHijo = datosGrande.datos; 
    for (let index = 0; index < datosHijo.length; index++) {
        tbody.appendChild(getFila(datosHijo[index]));
    }
}


/**
 * Genera una fila con los datos del cliente
 * @param {Array} cliente 
 * @returns tr
 */
function getFila(cita){
    const tr = document.createElement("tr");
    tr.innerHTML = `<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <p class="text-gray-700"> ${cita.fecha} </p>
    </td>
    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
    <p class="text-gray-700">${cita.hora}</p>
    </td>
    <td class="px-6 py-4 border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${cita.descripcion}</p>
    </td>
    <td class="px-6 py-4 border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${cita.detalles}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
   <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-citaid="${cita.id}" datanifcliente="${cita.nifCliente}" data-citafecha="${cita.fecha}" data-citahora="${cita.hora}">Eliminar cita</a>
   </td>`;
   return tr;
}

function mostrarDatos(){
    const nombre = localStorage.getItem('nombreSeleccionado');
    const apellidos = localStorage.getItem('apellidoSeleccionado');
    
    const subituloEspacio = document.getElementById("cita-clientes");

    subituloEspacio.innerHTML = nombre + apellidos;
}

/////// Dar formato a la fecha y gestionar el botón de eliminar cita ///////

  