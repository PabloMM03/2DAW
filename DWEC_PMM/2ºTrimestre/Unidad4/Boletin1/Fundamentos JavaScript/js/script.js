//Enlaza un nuevo fichero JavaScript y obtén una referencia al formulario usando los métodos descritos
//en el apartado 1.1.- Formas de selección del objeto Form de los contenidos de la plataforma.

//Act1

 let formulario = document.getElementsByTagName("form")[0];
 console.log(formulario);

//Act2  Obtenemos el elemento de submit, y lo desactivamos
 let fomulario2 = document.getElementById("enviar").addEventListener("click", function(e){
     e.preventDefault()
    console.log("Se ha pulsado el boton.");
   },false);

  //Act3
  let recorrer = document.getElementsByTagName("form")[0];

  if(!recorrer);
   for(let i =0; i<recorrer.elements.length; i++){
   if(recorrer.elements[i].type){
        console.log(recorrer.elements[i]);
        
    }
 }
   
  
  //  let fomulario3 = document.getElementById("enviar").addEventListener("click", function(e){
   
  //   let recorrer = document.getElementsByTagName("form")[0];

  //   if(!recorrer);
  //    for(let i =0; i<recorrer.elements.length; i++){
  //    if(recorrer.elements[i].type){
  //         console.log(recorrer.elements[i]);
          
  //     }
  //  }

  // },false);

