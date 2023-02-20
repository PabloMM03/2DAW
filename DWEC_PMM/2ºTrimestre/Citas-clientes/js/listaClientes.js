import {ControladorPHP as Controlador} from "./controlador.js";


document.getElementById("crearCliente").addEventListener('click', redirect, false);
document.getElementById("eliminarBD").addEventListener('click', eliminarBD, false);
document.addEventListener("DOMContentLoaded", mostrarClientes, false);

//Direccionar a nuev-cliente

    function redirect()
    {
    window.location.href="nuevo-cliente.html";
    }


    //mostrar clientes
    async function mostrarClientes()
    {

    const clientes = await Controlador.mostrarClientes();
    console.log(clientes);
    productos.forEach(cliente => {
        const contenedor = document.getElementById("listado-clientes");
        contenedor.innerHTML += getHTMLCliente(cliente);
        // actualizarCarritoHTML();  
    });

    function getHTMLCliente(cliente) {
        const {nombre, apellidos, email, telefono, nif} = cliente;
    
        return `
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


