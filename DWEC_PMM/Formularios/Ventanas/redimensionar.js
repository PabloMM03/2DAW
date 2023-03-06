function abrirVentana() {
    miventana = window.open("", "miVentana", "width=100px, height=100px");
}

function aumentarAnchoAlto() {
    miventana.resizeBy(250, 250);
}

function fijarAnchoAlto() {
    miventana.resizeTo(250, 250);
}

function MoverBy() {
    miventana.moveBy(250, -250);
}

function MoverTo() {
    miventana.moveTo(500, -200);
}