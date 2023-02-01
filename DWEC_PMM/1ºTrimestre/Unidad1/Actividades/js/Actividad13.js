/*
Escribe un programa que dada una hora determinada (horas y minutos), calcule los
segundos que faltan para llegar a la medianoche
*/

let hora;
let mins;


hora = prompt("Introduce una hora: ","");
mins = prompt("Introduce los minutos: ","");

let segundosTrans= (hora * 3600) + (mins * 60);
let segundosHastaMediaN =(24 * 3600) - segundosTrans;

console.log("Desde las " + hora + ":" + mins + " hasta la medianoche faltan " + segundosHastaMediaN + " segundos.");