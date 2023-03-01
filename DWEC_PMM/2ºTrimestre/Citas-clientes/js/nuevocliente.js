import { ControladorPHP as Controlador } from "./controlador.js";

crearListeners();

/**
 * Crear Listeners
 */

function crearListeners() {

  document.getElementById("cancelar").addEventListener("click", () => window.location.href = "index.html", false);

  document.getElementById("formulario").addEventListener("submit", añadirCliente, false);
  
  // document.getElementById("formulario").addEventListener("submit",validarForm,false);
}
/**
 * Añadir cliente
 */

async function añadirCliente(e) 
{
  e.preventDefault();
  const cliente = obtenerDatosCliente();
  const errores = validarCliente(cliente);

  if (Object.keys(errores).length === 0) {
    await Controlador.setCliente(cliente);
    window.location.href="index.html";
  } else {
    mostrarErrores(errores);
  }
}

/**
 * 
 * @returns json con datos del cliente
 */

function obtenerDatosCliente() 
{

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



function validarCliente(cliente) {
  const errores = {};
  const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!cliente.nombre) {
    errores.nombre = "El nombre es obligatorio";
  }else if(cliente.nombre.length < 4){
    errores.nombre = 'El nombre no puede tener menos de 4 caracteres';
  }else if(cliente.nombre.length > 30){
    errores.nombre = 'El nombre no puede tener mas de 30 caracteres';
  }if(cliente.nombre){
    errores.nombre ='';
  }

  if (!cliente.apellidos) {
    errores.apellidos = "Los apellidos son obligatorios";
  }else if(cliente.apellidos.length < 8){
    errores.apellidos = 'El apellido no puede tener menos de 8 caracteres';
  }else if(cliente.apellidos.length > 50){
    errores.apellidos = 'El apellido no puede tener mas de 50 caracteres';
  }if(cliente.apellidos){
    errores.apellidos ='';
  }

  if (!cliente.email) {
    errores.email = "El email es obligatorio";
  }else if(cliente.email.value !== regexCorreo){
    errores.email = 'El email no tiene el formato correcto';
  }if(cliente.email){
    errores.email ='';
  }

  if (!cliente.telefono) {
    errores.telefono = "El telefono es obligatorio";
  }else if(cliente.telefono.length < 8){
    errores.telefono = 'El telefono no puede tener menos de 8 caracteres';
  }if(cliente.telefono){
    errores.telefono ='';
  }
 
  if (!cliente.nif) {
    errores.nif = "El nif es obligatorio";
  }else if(cliente.nif.length < 8){
    errores.nif = 'El nif no puede tener menos de 8 caracteres';
  }if(cliente.nif){
    errores.nif ='';
  }

  return errores;
}

/**
 * 
 * @param {*} errores 
 */

function mostrarErrores(errores) {
  const formulario = document.getElementById("formulario");


  for (const campo in errores) {
    const errorP = document.getElementById(`error-${campo}`)
    errorP.innerText = errores[campo];
   
    const input = formulario.querySelector(`[name=${campo}]`);
    // const errorDiv = input.nextElementSibling;
  if(`${campo}` !== ''){
    input.classList.remove("border-red-600");
  }
    // errorDiv.style.display = "block";

    // Añadir clase "border-red-600" al input correspondiente
    input.classList.add("border-red-600");

  }
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
