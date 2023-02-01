/*
Escribe un programa que calcule una ecuación de segundo grado a partir de los valores
de los coeficientes a, b y c.
*/

let a,b,c;
let sol;

a = prompt("Introduce un numero:");
b = prompt("Introduce un numero:");
c = prompt("Introduce un numero:");



function discrim(a,b,c){
    return(b*b - 4*a*c);
}
function solucion(a,b,c, sol){
let disc = discrim(a,b,c);
if(disc<0){
    alert("Sin solucion al problema");
}else{
    sol[0] = (-b + Math.sqrt(disc))/(2*a);
    sol[1] = (-b - Math.sqrt(disc))/(2*a);
}
}

console.log("La ecuación es :");
console.log("Ecuación: " + a + b + c);
console.log("Soluciones: " + sol[0]+ " y " + sol[1]);