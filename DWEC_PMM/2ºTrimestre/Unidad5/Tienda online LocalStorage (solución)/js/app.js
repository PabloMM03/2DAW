// Importamos las funciones del controlador
import {ControladorDB, ControladorCarrito} from "./controlador.js";


crearListeners();

function crearListeners() {
    // Al cargar la página se muestran todos los productos y los filtros
    document.addEventListener("DOMContentLoaded", mostrarTodosProductosEvento, false);
    document.addEventListener("DOMContentLoaded", mostrarFiltrosEvento, false);
    // Al cambiar el estado de los filtros (seleccionarlos o deseleccionarlos), se muestran los productos que corresponda
    document.getElementById("filter-container").addEventListener("input", filtrarPorCategoriasEvento, false);
    // Al pulsar sobre el botón "Añadir al carrito" de un producto, se añade el producto al carrito
    document.getElementById("products-container").addEventListener("click", anadirProductoCarritoEvento, false);
    // En el carrito, al pulsar sobre uno de los botones de los productos (botón rojo con una "x"), se elimina el producto del carrito
    document.getElementById("contenedor-tabla-carrito").addEventListener("click", eliminarProductoCarritoEvento, false)
    // En el carrito, al pulsar sobre el botón "Vaciar carrito", se eliminan todos los elementos del carrito
    document.getElementById("vaciar-carrito").addEventListener("click", vaciarCarritoEvento, false);

}

//////////////////////////////////////////////////// APARTADO 1 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/**
 * Método que imprime por pantalla todos los productos
 * @param {Event} e objeto asociado al evento 
 */
function mostrarTodosProductosEvento(e) {
    const productos = ControladorDB.getProductos();
    productos.forEach(producto => {
        const contenedor = document.getElementById("products-container");
        contenedor.innerHTML += getHTMLProducto(producto);
        actualizarCarritoHTML();    
    });
}

/**
 * 
 * @param {Object} producto 
 * @returns 
 */
function getHTMLProducto(producto) {
    const {id, nombre, categoria, imagen, precio, vendedor, stock} = producto;

    return `
    <article id="${id}" class="location-listing" data-categoria="${categoria}">
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

//////////////////////////////////////////////////// APARTADO 2 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function mostrarFiltrosEvento(e) {
    const categorias = ControladorDB.getCategorias();
    const contenedor = document.getElementById("filter-container");

    let formularioFiltros = `
    <form>
        <fieldset id="filtro-categoria" name="filtro-categoria">
            <legend>Filtros por categoría:</legend>
    `;
    for(let categoria of categorias) {
        const {id, nombre} = categoria;
        formularioFiltros += `
        <div class="contenedor-categoria">
            <input type="checkbox" id="${id}" name="${id}" value="${id}">
            <label for="${id}">${nombre}</label>
        </div>
        `;
    }

    formularioFiltros += `
        </fieldset>
    </form>
    `;

    contenedor.innerHTML = formularioFiltros;
}

function filtrarPorCategoriasEvento(e) {
    const checkbox = e.target;
    if(checkbox.getAttribute("type") === "checkbox") {
        let filtrosCheck = document.querySelectorAll("#filtro-categoria input[type='checkbox']");
        // "filtrosCheck" es un "NodeList" y no tiene los métodos de array. Lo convierto en array,
        // filtro los checkBoxes que están seleccionados y me quedo sólo con el id (que es el id
        // de la categoría)
        filtrosCheck = [...filtrosCheck].filter(check => check.checked).map(check => check.id);

        let productosFiltrados = ControladorDB.getProductosPorCategorias(filtrosCheck);
        
        const contenedor = document.getElementById("products-container");
        contenedor.innerHTML = "";
        
        if(productosFiltrados.length === 0) {
            productosFiltrados = ControladorDB.getProductos();
        }
        productosFiltrados.forEach(producto => {
            contenedor.innerHTML += getHTMLProducto(producto);
        });
    }
}

//////////////////////////////////////////////////// APARTADO 3 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function vaciarCarritoEvento(e) {
    vaciarHTMLCarrito();
    ControladorCarrito.vaciarCarrito();
}

function eliminarProductoCarritoEvento(e) {
    e.preventDefault();
    const boton = e.target;
    if(boton.classList.contains("borrar-curso")) {
        const id = boton.getAttribute("data-id");
        ControladorCarrito.eliminarProducto(id);
    }
    actualizarCarritoHTML();
}
function anadirProductoCarritoEvento(e) {
    e.preventDefault();
    const boton = e.target;
    if(boton.classList.contains("add")) {
        const idProducto = boton.parentNode.parentNode.parentNode.id;
        const productoDB = ControladorDB.getProducto(idProducto);
        ControladorCarrito.anadirProducto(productoDB);
    }
    actualizarCarritoHTML();
}

function actualizarCarritoHTML() {
    vaciarHTMLCarrito();
    rellenarHTMLCarrito();
}

function vaciarHTMLCarrito() {
    document.querySelector("#lista-carrito tbody").innerHTML = "";
}

function rellenarHTMLCarrito() {
    const productos = ControladorCarrito.getProductos();
    productos.forEach(producto => {
        const {id, nombre, categoria, imagen, precio, vendedor, stock, cantidad} = producto;
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