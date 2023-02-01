/*
Realiza un programa que pida una hora por teclado y que muestre luego buenos días,
buenas tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de 13
a 20 y de 21 a 5 respectivamente. Sólo se tienen en cuenta las horas, los minutos no se
deben introducir por teclado.
*/

let hora = prompt("Introduzca una hora: ");

let dia; 
if(hora <24 && hora >1){
    if(hora >=6 && hora <=12){
        dia = console.log("Buenos dias");
    }else if(hora >=13 && hora <=20){
        dia= console.log("Buenas Tardes");
    }else{
        dia = console.log("Buenas noches");
    }
    }else{
    alert("Esa hora no es valida");
}