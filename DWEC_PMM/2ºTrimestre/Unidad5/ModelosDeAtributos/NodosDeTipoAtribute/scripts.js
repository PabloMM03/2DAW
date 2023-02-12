//a) Muestra por consola el nombre y el valor de todos los atributos del elemento div identificado como callout2.

document.write("<br/>El elemento <b>callout2</b> contiene los pares atributo -> valor: <br/>");
 
for( let x = 0; x < document.getElementById("callout2").attributes.length; x++ )
{
     let atributo = document.getElementById("callout2").attributes[x];
     document.write(atributo.nodeName+ " -> "+atributo.nodeValue+"<br/>");
}



//b) Añade el atributo title con el valor Información sobre identificadores al tercer
//párrafo del elemento identificado como content.


const content = document.querySelector("#content");
const thirdParagraph = content.querySelectorAll("p")[2];
thirdParagraph.setAttribute("title", "Información");



//c) Añade el atributo title con el valor Información sobre clases al cuarto párrafo del
//elemento identificado como content

let parrafo4 = document.querySelector("#content p:nth-child(3)").setAttribute("title", "Información");



//d) Obtén el nombre de la hoja de estilo del documento HTML.

let styleSheet = document.styleSheets;
for(let i =0; i<styleSheet.length; i++){
     console.log(styleSheet[i].href);
}

//e) Obtén la codificación de caracteres del documento HTML.

console.log(document.characterSet);

//f) Elimina los atributos title añadidos anteriormente a los párrafos.

const parrafo =  document.querySelectorAll("p");
parrafo.forEach(p=>{
     p.removeAttribute("title");
});