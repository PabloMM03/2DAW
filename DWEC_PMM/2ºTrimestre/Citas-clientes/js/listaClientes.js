import {ControladorPHP as Controlador} from "./controlador.js";

crearListeners();

 /*Crear Listeners , acciones formulario*/
function crearListeners(){

    document.getElementById("crearCliente").addEventListener("click",()=>window.location.href="nuevo-cliente.html", false);
    window.addEventListener("DOMContentLoaded", mostrarClientes, false);

    window.addEventListener('click', accionesCita, false);


    // document.getElementsByClassName("crearCita", crearCita ,false);
}

 /**
 * Mostrar clientes en la tabla
 */
    
    async function mostrarClientes()
    {
        
        const body = document.getElementById("listado-clientes");
        const clientes = await Controlador.mostrarClientes();
        const clienteHijo = clientes.datos;

        clienteHijo.forEach((cliente) => {
            body.appendChild(getHTMLCliente(cliente));
        });
        
    }


/**
 * Generar html datos clientes
 * @param {object} cliente 
 * @returns String
 */

    function getHTMLCliente(cliente) 
    {
        const telefono = cliente.telefono.replace(/(\d{3})(\d{2})(\d{2})(\d{2})/, "$1 $2 $3 $4");
        const nif = cliente.nif.replace(/(\d{8})(\w)/, '$1-$2');

        const tr = document.createElement("tr");
        tr.innerHTML =   ` 
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <p class="text-sm leading-5 font-medium text-gray-700 text-lg font-bold">${cliente.nombre}</p>
                <p class="text-sm leading-10 text-gray-700">${cliente.apellidos}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                <p class="text-gray-700">${cliente.email}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
                 <p class="text-gray-600">${nif}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
                <p class="text-gray-600">${telefono}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 crearCita" data-clientenombre="${cliente.nombre}"
                data-clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Crear cita</a>
                <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 verCitas" data-clientenombre="${cliente.nombre}" data
                clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Ver citas</a>
                <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-clientenombre="${cliente.nombre}" data-
                clienteapellidos="${cliente.apellidos}" data-clientenif="${cliente.nif}">Eliminar cliente</a>
            </td>
        
        `;
        return tr;

    }

    function accionesCita(e)
    {
        const classList = Array.from(e.target.classList);

        if (classList.includes('crearCita')) {
            crearCita(e);
        }

        if (classList.includes('verCitas')) {
            verCitas(e);
        }
        if(classList.includes('eliminar')){
            eliminarCliente(e);
        }

    }

    function crearCita(e)
    {
        const {dataset: { clientenif:nif, clientenombre: nombre, clienteapellidos: apellidos }} = e.target;

        localStorage.setItem('nif', nif);
        localStorage.setItem('nombre', nombre);
        localStorage.setItem('apellidos', apellidos);

        window.location.href = "nueva-cita.html"

    }

    /**
     * ver citas de cliente segun sus datos 
     * @param {*} e 
     */

    function verCitas(e) {
        const { dataset: { clientenif: nif, clientenombre: nombre, clienteapellidos: apellidos } } = e.target;
      
        localStorage.setItem('nif', nif);
        localStorage.setItem('nombre', nombre);
        localStorage.setItem('apellidos', apellidos);
      
        window.location.href = "lista-citas.html";
      }

      /**
       * Eliminar un cliente 
       * @param {*} e 
       */

    async function eliminarCliente(e){

        const {dataset: { clientenif:nif, clientenombre: nombre, clienteapellidos: apellidos }} = e.target;

        localStorage.setItem('nif', nif);
        localStorage.setItem('nombre', nombre);
        localStorage.setItem('apellidos', apellidos);

       const nombreCompleto = nombre + " " +    apellidos;

       const confirmar = confirm(`¿Seguro que deseas eliminar al cliente ${nombreCompleto}?`);

        if(confirmar){
            e.preventDefault();
            const resultado = await Controlador.eliminarCliente(nif);
            if (resultado && resultado.ok) {
                alert("Cliente eliminado correctamente");
                window.location.reload();
              } else {
                alert("Ha ocurrido un error al eliminar el cliente");
              }
        }else{
            window.location.href = "index.html";

        }


    }

    
    
    

    

