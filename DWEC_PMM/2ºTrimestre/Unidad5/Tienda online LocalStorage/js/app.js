// Importamos la base de datos
import {ControladorDB} from "./controlador.js";


crearListeners();

function crearListeners(){

    document.addEventListener("DOMContentLoaded", mostrarProductos, false);
    // document.addEventListener("DOMContentLoaded", mostrarFiltros, false);
}


function mostrarProductos(e){

    const productos = ControladorDB.getProductos();
    
    productos.forEach(producto => {
        const container = document.getElementById("products-container");
        container.innerHTML += mostrarHtml(producto);
           
    });
}


//  const container = document.getElementById("products-container");

//  const html = productos.map((producto)=>`


//  <img src ="${producto.imagen}" alt="${producto.nombre}">
//  <h3>${producto.nombre}</h3>
//  <p>Precio: ${producto.precio}€</p>
//  Vendido por ${producto.vendedor}
//  Quedan ${producto.stock} unidades
//  `).join("");

// container.innerHTML(html);

function mostrarHtml(producto){
    const {
        id, 
        nombre, 
        categoria, 
        imagen, 
        precio, 
        vendedor, 
        stock} = producto;

    return `<article id="${id}" class="location-listing" data-categoria="${categoria}">
                <div class="location-image">
                    <a href="#">
                        <img src="${imagen}" alt="${nombre}">
                     </a>
                </div>
                <div class="data">
                    <h4>${nombre}</h4>
                    <p class="price">${precio}€</p>
                    <p>Vendido por <strong>${vendedor}</strong></p>
                     <p>Quedan ${stock} unidades</p>
                <div class="button-container">
                     <a class="button add" href="#" target="_blank">Añadir al carrito</a>
                </div>
            </div>
        </article>
    `;
}