let nuevaVentana =null;
let ventanaCreada = false;

function abrirVentana(){
    if(!ventanaCreada){
        nuevaVentana= window.open("https://www.debian.org"," ", "width=100", "height=100");
        ventanaCreada=true;
    }else{
        alert("Ventana ya creada!");
    }
}

function aumentarAncho(){
    if(ventanaCreada){
        nuevaVentana= window.resizeBy(250,250);
        ventanaCreada=true;
    }else{
        alert("La ventana ya esta redimensionada!");
    }
}

function fijarAnchoYAlto(){
    if(ventanaCreada){
        nuevaVentana=window.resizeTo(250,250);
        ventanaCreada=true;
    }else{
        alert("La ventana ya tiene un tamaño fijo!");
    }
}

function moverVentana250(){
    if(ventanaCreada){
        nuevaVentana=window.moveBy(250,250);
        ventanaCreada=true;
    }else{
        alert("La ventana ya se a movido 250 pixeles!");
    }
}

function moverVentana500(){
    if(ventanaCreada){
        nuevaVentana= window.moveTo(500,200);
        ventanaCreada=true;
    }else{
        alert("La ventana ya se a movido 500 pixeles!");
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