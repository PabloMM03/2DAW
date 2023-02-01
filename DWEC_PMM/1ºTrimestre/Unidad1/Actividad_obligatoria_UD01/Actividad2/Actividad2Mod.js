
let idTiempo=null;
let opcion;
let numero;
let nombre;
//CONSTANTES
const NOMBREPORDEFECTO = "Manuela";
const NUMEROPORDEFECTO = 0;
const NUMEROMAYORA0 = ("El numero no es mayor o igual a 0!");
const OPCIONERRONEA = ("El valor introducido es incorrecto!");
const NOESUNNUMERO =("Error, El valor introducido no es un numero");
const NUMEROPAR = ("El numero es par.");
const NUMEROIMPAR = ("El numero es impar.");
const CELDAVACIA = ("La celda esta vacia!");
const CADENAERRONEA = ("EL valor no es una cadena!");
const ADIOS = ("Vuelve cuando lo necesites.");

//Creacion de menu
function iniciarMenu(){
    
        console.log("¿Que desea hacer hoy?");

        console.log("1.Numero par o impar");
        console.log("2.Saludo");
        console.log("3.Salir");
        
        //Llamada a la funcion que genera la seleccion de opcion
        temporizador();

       
    
  
}
/*Creacion de mensaje  de seleccionar la opcion , 
en caso de que la opcion sea incorrecta se volvera a pedir
Se comprobará la opcion elegida y dependiendo se realizará una operación u otra
*/
function promptMensaje(){
    do{
        opcion=parseInt(prompt("Introduzca la opción (1-3)",NUMEROPORDEFECTO));
    }while(opcion <1 || opcion >3)
     
    if(!window.isNaN(opcion)){
        if(opcion >=1 && opcion <=3){
            if(opcion==1){
                opcion1();
            }else if(opcion==2){
                opcion2();
            }else if(opcion==3){
                opcion3();
            }
        }else{
            console.log(OPCIONERRONEA);
        } 

    }else{
        console.log(NOESUNNUMERO);
    }
}

//Funcion la cual , al pulsar el boton mostrará el mensaje para elegir una opcion.
function temporizador(){
    idTiempo=setTimeout(promptMensaje,2000);


}

//Funcion Comprobar si el numero es par o impar

function parOimpar(numero){
    if(numero%2==0){
        console.log(NUMEROPAR);
    }else{
        console.log(NUMEROIMPAR);
    }
}
/*
Funcion opcion1
En caso de que numero sea menor a 0 no sea un numero se 
volvera a pedir que introduzca el numero
*/


function opcion1(){

        do{
         numero = prompt("Opcion seleccionada 1: Introduzca un numero mayor o igual a 0",NUMEROPORDEFECTO);  

      if(!window.isNaN(numero)){
        if(numero<0){
            console.log(NUMEROMAYORA0);
        }else{
            parOimpar(numero);
        }
      }else{
        console.log(NOESUNNUMERO);
      }
    }while(numero<0 || window.isNaN(numero))  
    temporizador();//Se vuelve a imprimir la eleccion de opcion
}
/*
Funcion opcion 2
En caso de que la celda este vacia se volvera a pedir el nombre
*/


function opcion2(){
    
    do{

          nombre = prompt("Opcion seleccionada 2: Introduzca su nombre",NOMBREPORDEFECTO);
        
        if(typeof nombre == 'string' && nombre !=''){
            console.log("Bienvenido/a " + nombre);
        }else if(nombre == ''){
            console.log(CELDAVACIA); 
        }
 
        }while(nombre == '' )
        temporizador();//Se vuelve a imprimir la eleccion de opcion
    }


//Funcion opcion 3

function opcion3(){

    if(opcion<1 || opcion >3){
        console.log(OPCIONERRONEA);
    }else{
        console.log(ADIOS);
    }
} 

