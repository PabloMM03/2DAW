// Importamos la base de datos
import {ControladorCarrito, ControladorDB} from "./controlador.js";


crearListeners();

function crearListeners(){
    //Detectar cuando se ha caragdo el DOM en el navegador
    document.addEventListener("DOMContentLoaded", mostrarProductos, false);
    document.addEventListener("DOMContentLoaded", mostrarFiltros, false);

    document.getElementById("filter-container").addEventListener("input", filtrarCategoria,false);
    document.getElementById("contenedor-tabla-carrito").addEventListener("click", eliminarProducto, false)
    document.getElementById("vaciar-carrito").addEventListener("click", vaciarCarritoEvento, false);
    document.getElementById("products-container").addEventListener("click", añadirProducto, false);



}


//1) A partir del array de productos llamado productos que se importa en el archivo script.js,
//rellena el div con id=”products-container” con los productos.
function mostrarProductos(){

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

  const  html = `<article id="${id}" class="location-listing" data-categoria="${categoria}">
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

    return html;
}

/*2)Apartado 2) Se debe implementar la funcionalidad del filtro por categorías. Para ello se deben
obtener las categorías diferentes que hay entre los productos e inyectar el código correspondiente en
el div con id=”filter-container”. Toma como referencia la siguiente imagen:
*/

//Obetenr panel de filtar productos por categoria
function mostrarFiltros(){

    const categorias = ControladorDB.getCategorias();
    const container = document.getElementById("filter-container");

    let filtros = `
    <form>
        <fieldset id="filtro-categoria" name="filtro-categoria">
            <legend>Filtros por categoría:</legend>
        `;
        categorias.forEach((categoria)=>{
            const {id,nombre} = categoria;
            filtros +=`
            <div class="contenedor-categoria">
                <input type="checkbox" id="${id}" name="${id}" value="${id}">
                <label for="${id}">${nombre}</label>
            </div>
            `;
        });
    
    filtros+=`

        </fieldset>
    </form>
    `;

    container.innerHTML = filtros;
}

function filtrarCategoria(e){
const check = e.target;

//Comprobar que el tipo es un checkbox

if(check.getAttribute("type") === "checkbox"){
    let checks = document.querySelectorAll("#filtro-categoria input[type='checkbox']");
    //Convertir elementos del checkbox en array
    checks = [...checks].filter(check =>check.checked).map(check=>check.id);
    let prodFilter = ControladorDB.getProductosPorCategorias(checks);

    const container = document.getElementById("products-container");
    container.innerHTML ="";

    if(prodFilter.length === 0){
        prodFilter = ControladorDB.getProductos();
    }
    prodFilter.forEach(producto =>{
        container.innerHTML += mostrarHtml(producto);
    });
}
}

/*
Apartado 3) Implementa la funcionalidad de incluir productos en el carrito de la compra
*/
//Vaciar carrito
function vaciarCarritoEvento(){
    htmlCarrito();
    ControladorCarrito.vaciarCarrito();
}
//ELiminar Carrito
function eliminarProducto(e){
    e.preventDefault();
    const boton = e.target;
    if(boton.classList.contains("borrar-curso")){
        const id = boton.getAttribute("data-id");
        ControladorCarrito.eliminarProducto(id);
    }
    actualizarCarrito();
}
//ActualizarCarrito

function actualizarCarrito(){
    htmlCarrito();
    rellenarCarrito();
}

function htmlCarrito(){
    document.querySelector('#lista-carrito tbody').innerHTML ="";
}

//AñadirPorductos

function añadirProducto(e){
    e.preventDefault();
    const boton = e.target;
    if(boton.classList.contains("add")){
        const idProd = boton.parentNode.parentNode.parentNode.id;
        const productoDB = ControladorDB.getProducto(idProd);
        ControladorCarrito.addProducto(productoDB);

    }
    actualizarCarrito();    
}

//RellenarCarrito

function rellenarCarrito(){
    const productos = ControladorCarrito.getProductos();
    productos.forEach(producto => {
        const {id, nombre, imagen, precio,cantidad} = producto;
        const fila = document.createElement('tr');
        fila.innerHTML = `
             <td>  
                  <img src="${imagen}">
             </td>
             <td>${nombre}</td>
             <td>${precio}€</td>
             <td>${cantidad} </td>
             <td>
                  <a href="#" class="borrar-curso" data-id="${id}">X</a>
             </td>
        `;
        
        document.querySelector("#lista-carrito tbody").appendChild(fila);
    });
}
