/*
Igual que el programa anterior, pero esta vez la pirámide estará hueca (se debe ver
únicamente el contorno hecho con asteriscos).
*/

function piramideHueca(numPisos){
    for(let i=0; i<numPisos;i++){
        for(j=0; j<i;j++){
            console.log("*");
        }

    }

}
piramideHueca(5);