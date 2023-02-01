/*
Actividad 3. Loteria primitiva.

Implementa una aplicación que muestre 10 combinaciones para jugar a la lotería primitiva. Una
combinación tiene 6 números del 1 al 49. Los números no se pueden repetir en una combinación.
    Para ello:
    • Genera un array de 49 elementos que contengan números del 1 al 49.
    • Mezcla los elementos del array.
    • Extrae un array de los 6 primeros elementos para obtener una combinación.
*/

     let arr = [
        1,2,3,4,5,6,7,8,9,10,11,12,
        13,14,15,16,17,18,19,20,21,
        22,23,24,25,26,27,28,29,30,
        31,32,33,34,35,36,37,38,39,
        40,41,42,43,44,45,46,47,48,49
    ];

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

     //Ejecutar mezcla y que se repitan 10 combinaciones
     for(let i = 0; i<10; i++){
    hola = mezclar(arr).slice(0,6);
     console.log(hola);
     }
  
     
