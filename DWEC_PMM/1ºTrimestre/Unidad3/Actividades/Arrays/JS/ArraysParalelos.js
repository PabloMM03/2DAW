/*
c) Arrays paralelos: El usar arrays para almacenar información, facilita una gran
versatilidad en las aplicaciones, a la hora de realizar búsquedas de elementos dentro del array. Pero
en algunos casos, podría ser muy útil hacer las búsquedas en varios arrays a la vez, de tal forma que
podamos almacenar diferentes tipos de información, en arrays que estén sincronizados.
Cuando tenemos dos o más arrays, que utilizan el mismo índice para referirse a términos
homólogos, se denominan arrays paralelos
*/

let profesores = ["Crsitina","Catalina","Vieites","Benjamin"];
let asignaturas = ["Seguridad","Bases de datos","Sistemas Informáticos","Redes"];
let alumnos =[24,17,18,26];

function imprimeDatos(){
    for(let i=0; i<profesores.length;i++){
        console.log(`${profesores[i]} del modulo de ${asignaturas[i]}, tiene ${alumnos[i]} alumnos de la clase.`);

    }
}

imprimeDatos();