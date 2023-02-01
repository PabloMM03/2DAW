// let btncolor = document.getElementById('enviar');
//  btncolor.disable = true;

//Actividad 1. Deshabilitar el botón de submit.

    document.getElementById("enviar").addEventListener("click",color,false);

    function color(){
        this.style.background = "gray";
        this.disabled = true;
    }

    //Actividad 2. Dar el foco al primer campo.
 
     document.getElementById("mail").focus();
     

     //Actividad 3. Elegir el momento de la validación.
     
      document.getElementById("edad").addEventListener("change",valida,false);
     
      function valida(){
         if(isNaN(document.getElementById("edad").value)){
          alert("Introduzca un numero");
        
         }

      }

      
   

     //Actividad 4. Filtrar la entrada de texto.
     
     document.getElementById("edad").addEventListener("keypress",valida2,false);
     function valida2(){
      if(isNaN(document.getElementById("edad").value)){
         alert("Introduzca un numero de verdad");
      }
     }

       
        
      

    //Actividad 5. Generación dinámica de campos.

    //Borrar opciones del select
     let sel = document.getElementById("Pais").innerHTML ="";
    
         //Añadir opciones
            const aOpcionesPais = [
               {text: "Portugal", value: "pt"},
               {text: "Francia", value: "fr"},
               {text: "Reino Unido", value: "uk"},
               {text: "Alemania", value: "de"},
               {text: "España", value: "es"}
               ];

            function añadirCampos(aOpcionesPais){

                  let elSelect = document.getElementById("Pais");
                  aOpcionesPais.map((element,index)=>{
                     let opcion = document.createElement("option");
                     opcion.text = element.text;
                     opcion.setAttribute("value",element.value);
                     elSelect.add(opcion,elSelect[index]);
                  });
            }

            añadirCampos(aOpcionesPais);
      