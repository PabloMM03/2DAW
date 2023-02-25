import {ControladorPHP as Controlador} from "./controlador.js";

ponerEventListeners();

/**
 * Añade Listeners
 */
function ponerEventListeners(){
    ////// Botones del Formulario //////
    document.getElementById("formulario"). addEventListener("submit", gestionarSubmit, false);
    document.getElementById("cancelar").addEventListener("click", () => window.location.href="./index.html", false);
}

async function gestionarSubmit(e){
    e.preventDefault();
    const cliente = recogerDatosFormulario();
    await Controlador.setCliente(cliente);
    window.location.href="./index.html";
}

/**
 * Estructura los datos del formulario y transforma en JSON
 * @returns json estrucurado
 */
function recogerDatosFormulario(){
    const form = document.getElementById("formulario");
    const formDatos = new FormData(form);
    return {
            nombre: formDatos.get('nombre'),
            apellidos: formDatos.get('apellidos'),
            email: formDatos.get('email'),
            telefono: formDatos.get('telefono'),
            nif: formDatos.get('nif')
    };
    // return JSON.stringify(datos);
}


/////// GESTIONAR LA VERIFICACIÓN DE DATOS ///////