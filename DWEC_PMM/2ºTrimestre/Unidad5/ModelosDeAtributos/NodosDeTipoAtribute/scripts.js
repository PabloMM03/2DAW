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


///////////////////////NODOS DE TIPO TEXT/////////////////////////////
//a) Recupera el contenido del párrafo dentro del div identificado como callout2 usando:

/*
La propiedad innerHTML.
 La propiedad textContent.
 La propiedad nodeValue. Ten en cuenta que el primer hijo de un elemento es el texto que
contiene pero comprueba que no haya espacios en blanco entre el elemento div y p. Puede
tomar el primer hijo de div como un espacio en blanco. 
*/

//InnerHtml
let callout2 = document.getElementById("callout2");
let paraContent = callout2.innerHTML;
console.log(paraContent);

//TextContent
paraContent = callout2.textContent;
console.log(paraContent);

//NodeValue
let parrafoEnCuestion = callout2.getElementsByTagName("p")[0];
let contenido = parrafoEnCuestion.firstChild.nodeValue;
console.log(contenido);

//b) Modifica el contenido del primer párrafo del div callout2 para añadir el texto “pero bien formado.”

parrafoEnCuestion.innerHTML = parrafoEnCuestion.innerHTML + " pero bien formado";


//Actividad 4. Creación y borrado de nodos.

//a) Crea un nuevo párrafo con el texto Me cuelo en primera posición y añádelo antes del
//primer hijo del elemento identificado como content

let crearParrafo = document.createElement("p");
let texto = document.createTextNode("Me cuelo en primera Posición"); //tetxo a añadir 
crearParrafo.appendChild(texto);//Añadimos el texto a el parrafo creado
let content2 = document.getElementById("content"); //Obtenemos id del elemento
content2.insertBefore(crearParrafo,content2.firstChild); // añadimos en la posicion indicada el parrafo


//b) Crea un nuevo párrafo con el texto Me coloco en última posición y añádelo como
//último hijo del elemento identificado como content.

let ultParrafo = document.createElement("p");
texto = document.createTextNode("Me coloco en última pocición");
ultParrafo.appendChild(texto);
content2.appendChild(ultParrafo);

//c) Realiza las actividades a) y b) usando la función insertAdjacentElement.

//a

let crearParrafo2 = document.createElement("p");
texto = document.createTextNode("Me cuelo en primera Posición 2"); //tetxo a añadir 
crearParrafo2.appendChild(texto);//Añadimos el texto a el parrafo creado
content2.insertAdjacentElement("afterbegin",crearParrafo2);                                //ES LO MISMO QUE EN A Y B                                       

//b

let ultParrafo2 = document.createElement("p");
texto = document.createTextNode("Me coloco en última pocición 2");
ultParrafo2.appendChild(texto);

content2.insertAdjacentElement("afterend",ultParrafo2);



//d) Crea la siguiente estructura y añádela a continuación del elemento h1:

let d = document.createElement("p");
d.setAttribute("title", "Página sencilla");
d.setAttribute("id", "descripción");
let texto2 = document.createTextNode("Esto es un ejemplo de página HTML sencilla");
d.appendChild(texto2);
content2.insertBefore(d,content2.firstChild);

//e) Elimina la estructura anterior:

let parent = document.getElementById("content"); //Identificar elemento padre
let elementRemove = document.getElementById("descripción");  //Identificar elemento a eliminar
parent.removeChild(elementRemove); //Eliminar Elemento