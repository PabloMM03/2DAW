/*

Implementa el tablero del juego El Caracol Preso. Este juego consiste en ayudar a un caracol a
escapar de la parcela electrificada en la que se encuentra encerrado. En esta actividad no tienes que
implementar el juego completo sino generar el tablero que usará.
Este es un tablero de 10x10 posiciones:

*/

/*
Ubica adecuadamente los elementos del juego en las posiciones que correspondan:
• Carácter “O”. Simboliza la valla electrificada, se sitúa en la periferia de la parcela.

• Carácter “X”. Simboliza todas las posiciones a las que se puede mover el caracol. Se ubica en todas las posiciones internas de la parcela.

• Carácter “o”. Simboliza el caracol. Debe situarse en una posición aleatoria dentro de las posiciones internas de la parcela.

• Carácter “II”. Simboliza la salida. Debe colocarse en una posición aleatoria de la fila inicial o final exceptuando las esquinas.

*/

const V = "O";
const P = "X";
const C = "o";
const S = "II";

let tablero = [
        [V, V, V, V, V, V, V, V, V, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, P, P, P, P, P, P, P, P, V],
        [V, V, V, V, V, V, V, V, V, V]
];

function colocarPieza(pieza,correcto){
    const min =0;
    const max =9;
    let posX;
    let posY;

    do{
        posX = getPosicion(min,max);
        posY = getPosicion(min,max);
    }while(!correcto(posX,posY));
    tablero[posX][posY] = pieza;
}

function getPosicion(min,max){
    return Math.floor(Math.random()* (max-min + 1) + min);
}
function posicionSalida(posX,posY){
    return tablero[posX][posY] == V;
}
function posicionCaracol(posX,posY){
    return tablero[posX][posY] == P; 
}
colocarPieza(S,posicionSalida);
colocarPieza(C,posicionCaracol);

for(let i =0; i<tablero.length;i++){
    let linea ='';
    for(let j =0; j<tablero[i].length;j++){
        linea += tablero[i][j];
    }
    console.log(linea);
}