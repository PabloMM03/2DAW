let idVentana = false;
let miVentana;

function openVentana(){
    if (!idVentana) {
        miVentana = window.open("https://www.w3schools.com", "", "width=600px, height=450px, top=50px, left=50px, menubar=1, resizable=1, location=1, scrollbars=1, status=1, toolbar=1");
        idVentana = true;
    } else {
        alert("Error, la ventana ya está abierta");
    }
}

function closeVentana(){
    if (idVentana) {
        miVentana.close()
        miVentana = null;
        idVentana = false;
    } else {
        alert("Error, la ventana no está abierta");
    }
}