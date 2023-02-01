/*
Escribe un programa que diga cuál es la última cifra de un número entero introducido
por teclado
*/
let numeroTeclado;

numeroTeclado = prompt("Introduce un numero: ","");

console.log("El ultimo numero introducido es el: " + (numeroTeclado % 10));