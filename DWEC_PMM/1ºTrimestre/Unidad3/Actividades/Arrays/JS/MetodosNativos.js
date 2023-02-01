/************************************************************ */
/** 1. Añadir o eliminar un elemento al principio o al final **/
/************************************************************ */
const aLetras = ["b", "c", "d"];
//a. (push) Añade la letra "e" al final del array.
aLetras.push("e");
console.log(aLetras);
//b. (pop) Elimina el último elemento del array.
aLetras.pop();
console.log(aLetras);
//c. (unshift) Añade la letra "a" al principio del array.
aLetras.unshift("a");
console.log(aLetras);
//d. (shift) Elimina el primer elemento del array.
aLetras.shift();
console.log(aLetras);

/****************************************** */
/** 2. Añadir multiples elementos al final **/
/****************************************** */
const aNumeros = [1, 2, 3];
//a. (concat) Añade al final del array los elementos 4, 5, 6.
const concats =[4,5,6]; //Creado por mi para el ejercicio
let concatenados = aNumeros.concat(concats);
console.log(concatenados);

/************************** */
/** 3. Obtener un subarray **/
/************************** */
const aNumeros2 = [1, 2, 3, 4, 5];
//a. (slice) Extrae el array [4, 5]
let cuatroYCinco = aNumeros2.slice(3,5);
console.log(cuatroYCinco);

//b. (slice) Extrae el array [3, 4]
let tresYCuatro = aNumeros2.slice(2,4);
console.log(tresYCuatro);
//c. (slice) Extrae el array [2, 3]
let dosYTres = aNumeros2.slice(1,3);
console.log(dosYTres);


/******************************************************** */
/** 4. Añadir o eliminar elementos en cualquier posicion **/
/******************************************************** */
const aNumeros3 = [1, 5, 7];
//a. (splice) Añade los elementos 2, 3 y 4 después del 1.
aNumeros3.splice(1,2,2,3,4,5,7);
console.log(aNumeros3);

//b. (splice) Añade el elemento 6 entre el 5 y el 7.
aNumeros3.splice(5,7,6,7);
console.log(aNumeros3);

//c. (splice) Elimina los elementos 2 y 3.

aNumeros3.splice(1,2);
console.log(aNumeros3);
/************************************* */
/** 5. Rellenar un array con un valor **/
/************************************* */
//a. (fill) Crea un nuevo array con 5 posiciones con el valor 1.
aNumeros3.fill(1);
console.log(aNumeros3);

//b. (fill) Rellena todo el array con el valor "a".
aNumeros3.fill("a");
console.log(aNumeros3);

//c. (fill) Rellena el array con el valor "b" a partir de la segunda posición.
aNumeros3.splice(1,2).fill("b");
console.log(aNumeros3);

/**************************************** */
/** 6. Ordenar arrays y darles la vuelta **/
/**************************************** */
const aNumeros4 = [1, 2, 3, 4, 5];
//a. (reverse) Da la vuelta a los elementos del array.

aNumeros4.reverse();
console.log(aNumeros4);

const aNumeros5 = [5, 3, 2, 4, 1];
//b. (sort) Ordena de menor a mayor los elementos del array.
aNumeros5.sort();
console.log(aNumeros5);

const aPersonas = [
  {nombre: "Susana", edad: 30},
  {nombre: "Antonio", edad: 18},
  {nombre: "Manuel", edad: 45}
];
//c. (sort) Ordena el array por orden alfabético.

aPersonas.sort((a,b)=>{
    if(a.nombre == b.nombre){
        return 0;
    }if(a.nombre < b.nombre){
        return -1;
    }
    return 1;
});
console.log(aPersonas);
/************************************* */
/** 7. Búsqueda de elementos en array **/
/************************************* */
const oPersona = { nombre: "Javier" };
const aDatos = [1, 5, "a", oPersona, true, 5, [1, 2], "9"];
//a. (indexOf) Obtén la primera posición que ocupa el elemento 5.
let num5 = aDatos.indexOf(5);
console.log(num5);

//b. (lastIndexOf) Obtén la última posición que ocupa el elemento 5.
num5 = aDatos.lastIndexOf(5);
console.log(num5);

const aDatos2 = [
  { id: 5, nombre: "Julia" }, 
  { id: 7, nombre: "Francisco" }
];
//c. (findIndex) Obtén la posición del elemento con id 5.
console.log(aDatos2.findIndex(c => c.id === 5));
//d. (findIndex) Obtén la posición del elemento con nombre "Francisco".
console.log(aDatos2.findIndex(c => c.nombre === 'Francisco'));

//e. (find) Obtén el elemento con id 5.
// num5 = aDatos2.find(5);

const iNumeros6 = [5, 7, 12, 15, 17];
//f. (some) Indica si el array contiene algún elemento par.

console.log(iNumeros6.some(i => i /  2 ===0));

const iNumeros7 = [4, 6, 16, 36];
//g. (every) Indica si todos los elementos del array son pares.
console.log(iNumeros6.some(i => i %  2 ===0));

/**************************** */
/** 8. map, filter y reduce. **/
/**************************** */
const aCarro = [ 
  { nombre: "Sandía", precio: 6.95 }, 
  { nombre: "Melón", precio: 3.25 },
  { nombre: "Chocolate", precio: 1.5 },
  { nombre: "Pan", precio: 0.75 }
];
//a. (map) Obtén un array con los nombres de los productos.

let nombres = aCarro.map( aCarro => aCarro.nombre);
console.log(nombres);

//b. (map) Obtén un array con los precios de los productos.
let precios = aCarro.map(aCarro => aCarro.precio);
console.log(precios);

//c. (map) Obtén un array con los precios con IVA de los productos.
let ivas = aCarro.map(aCarro => aCarro.precio * 0.21);
console.log(ivas);

//d. (filter) Obtén un array con los elementos que valgan más de 2 euros.
let dosEruros = aCarro.filter(aCarro=> aCarro.precio >2);
console.log(dosEruros);

//e. (reduce) Obtén la cuenta total de todos los elementos.

let total = aCarro.reduce(getSuma,0);
console.log(total);
function getSuma(aCarro,num){
    return num + Math.round(aCarro.precio);

}

/**************************************** */
/** 9. Convertir un array en una cadena. **/
/**************************************** */
const aElementos = ['Viento', 'Lluvia', 'Fuego'];
//a. (join) Obtén una cadena como esta "Viento,Lluvia,Fuego"
let Cadena = aElementos.join();
console.log(Cadena);

//b. (join) Obtén una cadena como esta "Viento, Lluvia, Fuego"
Cadena = aElementos.join(", ");
console.log(Cadena);

//c. (join) Obtén una cadena como esta "VientoLluviaFuego"
Cadena = aElementos.join("");
console.log(Cadena);