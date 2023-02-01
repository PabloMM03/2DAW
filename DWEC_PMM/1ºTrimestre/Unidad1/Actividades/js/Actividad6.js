/*
Escribe un programa que pinte por pantalla una pirámide rellena a base de asteriscos.
La base de la pirámide debe estar formada por 9 asteriscos
*/
function pyramid(numPisos) {
    for (let i = 0; i < numPisos; i++) {
      let piso = ' ';
      for (let j = 0; j <= i; j++) {
        piso = piso + '*';
      }
      console.log(piso)
    }
  }
  
  pyramid(9);