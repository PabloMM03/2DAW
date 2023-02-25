import {ControladorPHP as Controlador} from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners(){
    document.getElementById("crearCliente").addEventListener("click", () => window.location.href="./nuevo-cliente.html", false);
    window.addEventListener('load', mostrarClientes, false);

    window.addEventListener('click', comprobarClick, false);
}

/**
 * Muestra clientes en la tabla clientes
 */
async function mostrarClientes(){
    
    const tbody = document.getElementById('listado-clientes');
    const datosGrande = await Controlador.mostrarClientes();
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
function  getFila(cliente){
    const tr = document.createElement("tr");
    tr.innerHTML = `<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
    <p class="text-sm leading-5 font-medium text-gray-700 text-lg font-bold">${cliente.nombre}</p>
    <p class="text-sm leading-10 text-gray-700">${cliente.apellidos}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
    <p class="text-gray-700">${cliente.email}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${cliente.nif}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
    <p class="text-gray-600">${cliente.telefono}</p>
   </td>
   <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
    <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 crearCita" data-clientenombre="${cliente.nombre}"
   data-clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Crear cita</a>
    <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 verCitas" data-clientenombre="${cliente.nombre}" dataclienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Ver citas</a>
    <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-clientenombre="${cliente.nombre}" dataclienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Eliminar cliente</a>
   </td>`;
   return tr;
}

function comprobarClick(e){
    for (let index = 0; index < e.target.classList.length; index++) {
        if(e.target.classList[index] === "crearCita"){
            console.log("Hola Mundo");

        } else if(e.target.classList[index] === "verCitas"){
            verCitas(e);

        } else if(e.target.classList[index] === "eliminar"){
            ////
        }
        
    }
}

function verCitas(e){
    const nif = e.target.getAttribute('data-clientenif');
    const nombre = e.target.getAttribute('data-clientenombre');
    const apellidos = e.target.getAttribute('data-clienteapellidos');

    localStorage.setItem('nifSeleccionado', nif);
    localStorage.setItem('nombreSeleccionado', nombre);
    localStorage.setItem('apellidoSeleccionado', apellidos);

    window.location.href = "./lista-citas.html";
}