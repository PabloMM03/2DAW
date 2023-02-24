import { ControladorPHP as Controlador } from "./controlador.js";

crearListeners();

/**
 * Crear Listeners
 */

function crearListeners() {

  document.getElementById("cancelar").addEventListener("click", () => window.location.href = "index.html", false);

  document.getElementById("formulario").addEventListener("submit", añadirCliente, false);

  document.getElementById("formulario").addEventListener("submit",validarForm,false);
}
/**
 * Añadir cliente
 */

async function añadirCliente() {
  const cliente = obtenerDatosCliente();
  await Controlador.setCliente(cliente);
}

/**
 * 
 * @returns json con datos del cliente
 */

function obtenerDatosCliente() {

  const formulario = document.getElementById("formulario");
  const datos = new FormData(formulario);

  return {
    nombre: datos.get('nombre'),
    apellidos: datos.get('apellidos'),
    email: datos.get('email'),
    telefono: datos.get('telefono'),
    nif: datos.get('nif')

  };

}



 function validarForm(e){
     const campo = e.target;
     validarCampo(campo);
 }


 function validarCampo(campo){
     eliminarErrores(campo);
     return campo.checkValidity();
 }













/**
 * Validacion del formulario
 * @param {*} e 
 */

// function validarForm(e)
// {

//   e.preventDefault();
//   const inputs = formulario.querySelectorAll("input");
  
//   inputs.forEach((input) => {
//     switch (input.name) {
//       case "nombre":
//         validarCampo(input, 4, 30, "El nombre debe tener entre 4 y 30 caracteres");
//         break;
//       case "apellidos":
//         validarCampo(input, 8, 50, "Los apellidos deben tener entre 8 y 50 caracteres");
//         break;
//       case "email":
//         validarEmail(input);
//         break;
//       case "telefono":
//         validarTelefono(input);
//         break;
//       case "nif":
//         validarNIF(input);
//         break;
//     }
//   });

// }




// function validarCampo(campo, min, max, mensaje) 

// {
//   const valor = campo.value.trim();
//   if (valor === "" || valor.length < min || valor.length > max) {
//     mostrarError(campo, mensaje);
//   } else {
//     mostrarExito(campo);
//   }
// }

// function validarEmail(campo) 

// {
//   const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   if (!emailRegex.test(campo.value.trim())) {
//     mostrarError(campo, "El correo electrónico no es válido");
//   } else {
//     mostrarExito(campo);
//   }
// }

// function validarTelefono(campo) {
//   const telefonoRegex = /^\d{3}\s?\d{2}\s?\d{2}\s?\d{2}$/;
//   if (!telefonoRegex.test(campo.value.trim())) {
//     mostrarError(campo, "El número de teléfono no es válido");
//   } else {
//     // quitar los espacios del teléfono antes de enviarlo al servidor
//     campo.value = campo.value.replace(/\s/g, "");
//     mostrarExito(campo);
//   }
// }

// function validarNIF(campo) {
//   const nifRegex = /^\d{8}-?[A-Z]$/;
//   if (!nifRegex.test(campo.value.trim())) {
//     mostrarError(campo, "El NIF no es válido");
//   } else {
//     // quitar el guión del NIF antes de enviarlo al servidor
//     campo.value = campo.value.replace(/-/g, "");
//     mostrarExito(campo);
//   }
// }

// function mostrarError(campo, mensaje) {
//   console.log('Error, no se ha validado el form');
// }


// function mostrarExito(campo) {
//   console.log('Exito');
// }
