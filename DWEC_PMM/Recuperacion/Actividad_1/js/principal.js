let nuevaVentana = null;
let intervalId  = null;

crearListeners();


/**
 * Crear listeners
 */
function crearListeners()
{
    document.getElementById('abrir-ventana').addEventListener('click', openWindow,false);
    document.getElementById('cerrar-ventana').addEventListener('click', closeWindow,false);
}

/**
 * Abrir ventana 
 */

function openWindow() {
  if (nuevaVentana === null) {
    nuevaVentana = window.open('', 'hija.html', 'width=350px,height=350px');
    nuevaVentana.document.body.innerText = 'Tamaño 350x350';
    intervalId = setInterval(resizeWindow, 1000);
  } else {
    alert("Error, la ventana ya está abierta");
  }
}

/**
 * Redimensionar ventana
 */

function resizeWindow() {
  if (nuevaVentana !== null) {
    const currentWidth = nuevaVentana.innerWidth;
    const currentHeight = nuevaVentana.innerHeight;
    if (currentWidth < 600 && currentHeight < 600) {
        nuevaVentana.resizeBy(50, 50);
        nuevaVentana.document.body.innerText = `Nuevo tamaño: ${nuevaVentana.innerWidth}x${nuevaVentana.innerHeight}`;
    } else {
      clearInterval(intervalId);
    }
  }
}

/**
 * Cerrar ventana
 */

function closeWindow()
{
    if (nuevaVentana !== null) {
        clearInterval(intervalId);
        nuevaVentana.close()
        nuevaVentana = null;
    } else {
        alert("Error, la ventana no está abierta");
    }
}
