//a) Recupera el div identificado como content.

let elemento = document.getElementById("content");
console.log(elemento);

//b) Recupera todos los nodos que tengan asignada la clase callout.
let claseCallout = document.getElementsByClassName("callout");
console.log(claseCallout);

//c) Recupera todos los nodos que sean párrafos.
let parrafo = document.getElementsByTagName("p");
console.log(parrafo);

//d) Recupera el primer párrafo dentro del elemento identificado como content.
let elemento2 = document.getElementsByTagName("p")[0];
console.log(elemento2);

