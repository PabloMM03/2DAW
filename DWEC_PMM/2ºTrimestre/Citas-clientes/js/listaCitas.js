import { ControladorPHP as Controlador } from "./controlador.js";


crearListeners();

/**
 * Crear listeners
 */

function crearListeners() 
{
    document.getElementById("volverClientes").addEventListener("click", () => window.location.href="index.html");
    document.getElementById("crearCita").addEventListener("click", () => window.location.href="nueva-cita.html");

    window.addEventListener("DOMContentLoaded", mostrarCitasCliente, false);
    window.addEventListener("DOMContentLoaded", mostrarNombreYApe, false);

    window.addEventListener('click', accionesCita, false);
    
}
  
/**
 * Mostrar citas del cliente
 */

async function mostrarCitasCliente(e) 
{
    const nif = localStorage.getItem('nif');
    
    const body = document.getElementById('listado-citas');
    
    const citas = await Controlador.mostrarCitas(nif);
    const cita = citas.datos;

    cita.forEach((Citacliente) => {
        body.appendChild(getHTMLClienteCita(Citacliente));
    });
}

/**
 * 
 * @param {object} cita 
 * @returns 
 */

function getHTMLClienteCita(cita) 
{
    const regex = /^(\d{4})-(\d{2})-(\d{2})$/;
    const fecha = cita.fecha.replace(regex, '$3-$2-$1');

    const tr = document.createElement("tr");

    tr.innerHTML = `
   
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <p class="text-gray-700">${fecha}</p>
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
        </td>
    `;

    return tr;

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

 function accionesCita(e)
{
        const classList = Array.from(e.target.classList);

        if(classList.includes('eliminar')){
            eliminarCita(e);
        }

}

async function eliminarCita(e){

    // const {dataset: { nifcliente:nif, citafecha: fecha, citahora: hora,  }} = e.target;

    const nif = e.target.getAttribute('datanifcliente');
    const fecha = e.target.getAttribute('data-citafecha');
    const hora = e.target.getAttribute('data-citahora');
    const id = e.target.getAttribute('data-citaid');

    localStorage.setItem('nif', nif);
    localStorage.setItem('id', id);
    localStorage.setItem('fecha', fecha);
    localStorage.setItem('hora', hora);

   const fechaCompleta = fecha + " a las " + hora;

   const confirmar = confirm(`¿Seguro que deseas eliminar la cita del  ${fechaCompleta}?`);

    if(confirmar){
        e.preventDefault();
         await Controlador.eliminarCita(id);
            window.location.reload();
    }else{
        window.location.href = "lista-citas.html";

    }


}


