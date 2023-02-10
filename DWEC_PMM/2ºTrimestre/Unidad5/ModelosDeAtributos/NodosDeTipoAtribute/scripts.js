//a) Muestra por consola el nombre y el valor de todos los atributos del elemento div identificado como callout2.

document.write("<br/>El elemento <b>callout2</b> contiene los pares atributo -> valor: <br/>");
 
for( let x = 0; x < document.getElementById("callout2").attributes.length; x++ )
{
     let atributo = document.getElementById("callout2").attributes[x];
     document.write(atributo.nodeName+ " -> "+atributo.nodeValue+"<br/>");
}


//b) Añade el atributo title con el valor Información sobre identificadores al tercer
//párrafo del elemento identificado como content.


    let atributo2 = document.getElementsByTagName("p")[2];
    atributo2.setAttribute('type' , 'text');
    atributo2.setAttribute('value', 'Información');


    for( let x = 0; x < document.getElementById("content").attributes.length; x++ )
    {
         let atributo2 = document.getElementsByTagName("p")[2].attributes[x];
         document.write(atributo2.nodeName+ " -> "+atributo2.nodeValue+"<br/>");
    }
    

    document.write(atributo2.nodeName+ " -> "+atributo2.nodeValue+"<br/>");



//c) Añade el atributo title con el valor Información sobre clases al cuarto párrafo del
//elemento identificado como content



//d) Obtén el nombre de la hoja de estilo del documento HTML.



//e) Obtén la codificación de caracteres del documento HTML.


//f) Elimina los atributos title añadidos anteriormente a los párrafos.
