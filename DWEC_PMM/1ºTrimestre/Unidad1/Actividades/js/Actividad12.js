/*
Realiza un conversor de euros a dólares. La cantidad en euros que se quiere convertir
deberá estar almacenada en una variable.
*/

let cantidadAConvertir;

cantidadAConvertir = prompt("Introduce la cantidad en euros que quieres convertir a Dólares: ","");

let conversion = cantidadAConvertir*1.0831;

console.log("Sus " + cantidadAConvertir + " Euros son " + conversion + " dólares.");