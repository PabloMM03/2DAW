import {ControladorPHP as Controlador} from "./controlador.js";

crearListeners();

function crearListeners(){

    document.getElementById("crearCliente").addEventListener('click', redirect, false);
    document.getElementById("eliminarBD").addEventListener('click', eliminarBD, false);
    window.addEventListener("load", mostrarClientes, false);


}
//Direccionar a nuevo-cliente

    function redirect()
    {
    window.location.href="nuevo-cliente.html";
    }


    //mostrar clientes en la tabla

    
    async function mostrarClientes()
    {
        let Añadir = "";
    const clientes = await Controlador.mostrarClientes();
    const clienteHijo = clientes.datos;
    for (let i = 0; i < clienteHijo.length; i++) {
        Añadir += getHTMLCliente(clienteHijo[i]);
        
    }
     document.getElementById("listado-clientes").innerHTML = Añadir;
        
    }

//Generar html datos clientes

    function getHTMLCliente(cliente) {
        const {nombre, apellidos, email, telefono, nif} = cliente;
        return  `
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                <p class="text-sm leading-5 font-medium text-gray-700 text-lg font-bold">${nombre}</p>
                <p class="text-sm leading-10 text-gray-700">${apellidos}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                <p class="text-gray-700">${email}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
                 <p class="text-gray-600">${nif}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-700">
                <p class="text-gray-600">${telefono}</p>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 crearCita" data-clientenombre="${nombre}"
                data-clienteapellidos="${apellidos}" data-clientenif="${nif}">Crear cita</a>
                <a href="#" class="block text-teal-600 hover:text-teal-900 mr-2 verCitas" data-clientenombre="${nombre}" data-
                clienteapellidos="${apellidos}" data-clientenif="${nif}">Ver citas</a>
                <a href="#" class="block text-red-600 hover:text-red-900 eliminar" data-clientenombre="${nombre}" data-
                clienteapellidos="${apellidos}" data-clientenif="${nif}">Eliminar cliente</a>
            </td>
        </tr>
        `;

    }


     async function eliminarBD() {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "eliminarBD"
                })
            });
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }


