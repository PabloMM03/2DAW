/*
Actividad 3. Loteria primitiva.

Implementa una aplicación que muestre 10 combinaciones para jugar a la lotería primitiva. Una
combinación tiene 6 números del 1 al 49. Los números no se pueden repetir en una combinación.
    Para ello:
    • Genera un array de 49 elementos que contengan números del 1 al 49.
    • Mezcla los elementos del array.
    • Extrae un array de los 6 primeros elementos para obtener una combinación.
*/

//Creacion de array random

let loteria = new Array(49);

     function rellenar(loteria){
        for(let i=0; i<loteria.length; i++){
           let index = Math.random() *49;
            loteria[i] = Math.round(index);
        }
     }
     rellenar(loteria);
     //Meclar array

     function mezclar(arr){

        let currentIndex = arr.length,value,ramdom;

        while(0 !== currentIndex){
            ramdom = Math.floor(Math.random()*currentIndex);
            currentIndex -=1;

            value = arr[currentIndex];
            arr[currentIndex] = arr[ramdom];
            arr[ramdom] = value;
        }
        return arr;

     }

     //Ejecutar mezcla y que se repita 10 combinaciones
     for(let i =0; i<10; i++){
        hola = mezclar(loteria).slice(0,6);
        console.log(hola);
   
     }
    