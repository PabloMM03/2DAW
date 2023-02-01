
let num1,num2;
let resta,suma,div,multi;

num1 = prompt("Introduzca un numero: ");
num2 = prompt("Introduzca otro numero: ");



suma = parseInt(num1) + parseInt(num2);
resta = num1 - num2;
multi =  num1 * num2;
div =  num1 / num2;


console.log("La suma de " + num1 + " + " + num2 + " es: " + suma);
console.log("La resta de " + num1 + " - " + num2 + " es: " + resta);
console.log("La multiplicación de " + num1 + " * " + num2 + " es: " + multi);
console.log("La división de " + num1 + " / " + num2 + " es: " + div);