import {ControladorPHP as Controlador} from "./controlador.js";


function crearListeners(){

    document.getElementById('nombre');
    document.getElementById('formulario').addEventListener('submit',validarForm, false);


}

function validarForm(e){
     e.preventDefault();
    if (!validarNombre()) {
        return false;
    }
    formulario.submit();
      
}

function validarNombre() {
    const nombre = nombreInput.value;
    if (nombre.length < 4 || nombre.length > 30) {
      alert('El nombre debe tener entre 4 y 30 caracteres');
      return false;
    }
    return true;
  }
  