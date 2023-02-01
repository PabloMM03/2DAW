let nuevaVentana = null;
let ventanaCreada = false;

function crearNueva() {
  if (!ventanaCreada) {
    nuevaVentana = window.open("https://www.debian.org", "", "height=450","width=600","top=50","left=50",
     "menubar=yes","resizable=yes", "location=yes", "scrollbars=yes", "status=yes", "toolbar=yes");
    ventanaCreada = true;
}else{
    alert("La ventana ya esta creada.")
}
}

function cerrarNueva() {
  if (ventanaCreada) {
    nuevaVentana.close();
    nuevaVentana = null;
    ventanaCreada = false;
  } else {
    alert("Ventana aun no creada!!!");
  }
}