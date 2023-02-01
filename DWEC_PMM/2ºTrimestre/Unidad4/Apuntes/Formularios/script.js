
let formulario=document.getElementById("formulario");
console.log(formulario);

// let primerFormulario = document.getElementsByTagName("form")[0];
// console.log(primerFormulario);

// let div=document.getElementById("divs");
// let formularios=div.getElementsByTagName("form");
// primerFormulario = formularios[0];

// console.log(primerFormulario);

let miformulario = document.forms[0];
console.log(miformulario);  

//Referencias al campo de texto

let imprimir = document.formulario.mail;
console.log(imprimir);

let imprimir2 = document.forms['formulario'].mail;
console.log(imprimir2);

let textoPorDefecto = document.getElementById("Nombre").defaultValue = 'Goofy';
console.log(textoPorDefecto);

