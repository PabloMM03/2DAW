let baseImp = parseInt(prompt("Introduzca la base imponible:"));
let tipoIva = prompt("Introduzca el tipo de Iva (general, reducido, superreducido):");
let codigoProm = prompt("Introduzca el codigo Promocional (nppro, mitad, meno5, 5porc):");

let total,Iva;
let precioConPromo;


console.log('Base Imponible: ' + baseImp);

if (tipoIva == "general" || tipoIva=="General") {
    Iva = (baseImp * 1.21) - baseImp;
    console.log("Iva General (21%) " + Iva);
} else if (tipoIva == "reducido" || tipoIva=="Reducido") {
    Iva = (baseImp * 1.10) - baseImp;
    console.log("Iva Reducido (10%) " + Iva);
} else if (tipoIva == "superreducido" || tipoIva=="Superreducido") {
    Iva = (baseImp * 1.04) - baseImp;
    console.log("Iva SuperReducido (4%) " + Iva);
} else {
    console.log('No ha introducido un impuesto correcto');
}

total = baseImp + Iva;
console.log("Precio con Iva " + total);


if (codigoProm == "nopro") {
    console.log('Usted no tiene promoción');
} else if (codigoProm == "mitad") {
    precioConPromo = total / 2;
    console.log('Cod. promo  MITAD: -' + precioConPromo);
   // console.log('Total : ' + precioConPromo);
} else if (codigoProm == "meno5") {
    precioConPromo = total - 5;
    console.log('Cod. promo  MENO5 5 : ' + precioConPromo);
} else if (codigoProm == "5porc") {
    precioConPromo = total * 1.05 - total;
    console.log('Cod. promo 5PORC: -' + precioConPromo);
} else {
    console.log('No ha introducido ningun impuesto correcto');
}

console.log('Total : ' + precioConPromo);


