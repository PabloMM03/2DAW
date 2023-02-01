/*
 Escribe un programa que diga cuál es la primera cifra de un número entero introducido
por teclado. Se permiten números de hasta 5 cifras.
*/

let numeroTeclado;
let primerN;

numeroTeclado = prompt("Introduce un numero por teclado (5 cifras como maximo): ","");


    if(numeroTeclado <10){
        primerN =numeroTeclado;
        
    }if((numeroTeclado >=10)&&(numeroTeclado<100)){
        primerN =Math.floor(numeroTeclado/10);
    }if((numeroTeclado>=100)&&(numeroTeclado<1000)){
        primerN=Math.floor(numeroTeclado/100);
    }if((numeroTeclado>=1000)&&(numeroTeclado<10000)){
        primerN=Math.floor(numeroTeclado/1000);
    }if(numeroTeclado>=10000){
        primerN=  Math.floor(numeroTeclado/10000);
    }

    
    console.log("El primer numero introducido es el: " + primerN);

    


