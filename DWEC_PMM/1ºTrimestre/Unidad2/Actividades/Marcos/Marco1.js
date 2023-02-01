function comunicarMarco1(){

    //let iframe = window.frames['Marco2'];
    let windowPadre = window.parent;
let frameHermano = windowPadre.frames['Marco2'];
let texto = frameHermano.document.getElementById('p').textContent = "Hola";
//let texto = window.parent.document.getElementById('p').innerHTML = "Hola";

}