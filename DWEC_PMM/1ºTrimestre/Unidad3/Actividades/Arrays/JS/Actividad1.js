/*
Realiza las siguientes actividades de introducción para la declaración, acceso y manipulación de
arrays:

    a) Arrays unidimensionales: Declara un array unidimensional e inicialízalo con los valores
    100, 200, 300, 400 y 500. A continuación imprímelo por consola con el siguiente formato:
    El array tiene en la posición 0 el valor 1.
    El array tiene en la posición 1 el valor 2.
*/

//Primera manera de hacerlo con foreach

    let arrayUnidimensional = [100,200,300,400,500];
    function imprimirArray(elem, index, arrayUnidimensional){
        console.log("El array tiene en la posición " + index + " el valor " + elem);
    }
     arrayUnidimensional = [100,200,300,400,500].forEach(imprimirArray);


//Segunda manera de hacerlo con for ... of

 arrayUnidimensional = [100,200,300,400,500];

 for(let i of arrayUnidimensional){
    console.log("El array tiene en la posición el valor " + i);
 }



     /*
        b) Array bidimensionales: Genera un array bidimensional de 5 x 5 posiciones e
        inicialízalo con los siguientes valores:
     */

        //primera manera de hacerlo
        let arrayBidimensional = [

            array1 =[1,2,3,4,5],
            array2 =[1,2,3,4,5],
            array3 =[1,2,3,4,5],
            array4 =[1,2,3,4,5],
            array5 =[1,2,3,4,5]

        ];

        for(let  i= 0; i<arrayBidimensional.length; i++){
            console.log(arrayBidimensional[i]);
        }

       //Segunda manera de hacerlo
        
        for(let x =0; x<arrayBidimensional; x++){
            arrayBidimensional[x] = new Array();
            for(let y=0; y<arrayBidimensional;y++){
                arrayBidimensional[x][y] = x + " " + y;
            }
        }
        for(let elem in arrayBidimensional){
            console.log(elem + " = " + arrayBidimensional[elem]);
        }