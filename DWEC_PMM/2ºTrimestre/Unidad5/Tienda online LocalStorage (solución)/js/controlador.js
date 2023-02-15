// Importamos el modelo de datos
import {productos, categorias} from "../db/db.js";
import {Util} from "./util.js"; 


/**
 * Clase conteniendo métodos del controlador de la base de datos de
 * productos (archivo javascript con el objeto "productos")
 */
export class ControladorDB {
    /**
     * Método que obtiene todos los productos que hay en el modelo de datos
     * @returns array con todos los productos
     */
    static getProductos() {
        return productos;
    }
    
    /**
     * Método que obtiene el producto cuyo id coincide con el parámetro de entrada
     * o null en caso de no existir
     * @param {String} id identificador del producto que queremos obtener 
     * @returns producto cuyo id coincide con el parámetro de entrada o null si no existe
     */
    static getProducto(id) {
        const productoArray = productos.filter(producto => producto.id === id);
        return productoArray.length === 0 ? null : productoArray[0];
    }

    /**
     * Método que obtiene todas las categorías a las que puede pertenecer un producto
     * @returns array con las categorías de la base de datos
     */
    static getCategorias() {
        return categorias;
    }

    /**
     * Método que obtiene la categoría cuyo id coincide con el parámetro de entrada
     * o null en caso de no existir
     * @param {String} id identificador de la categoría que queremos obtener 
     * @returns categoría cuyo id coincide con el parámetro de entrada o null si no existe
     */
    static getCategoria(id) {
        const categoriaArray = categorias.filter(categoria => categoria.id === id);
        return categoriaArray.length === 0 ? null : categoriaArray[0];
    }

    /**
     * Método que obtiene los productos que pertenecen a las categorías que se pasan
     * por parámetro
     * @param {Array} categorias array de identificadores de categorías 
     * @returns array con los productos que pertenecen a las categorías indicadas
     */
    static getProductosPorCategorias(categorias) {
        return productos.filter(producto => categorias.includes(producto.categoria));
    }

}

/**
 * Clase conteniendo métodos del controlador del carrito de productos (objeto LocalStorage)
 */
export class ControladorCarrito {

    /**
     * Método que elimina todos los productos almacenados en el carrito
     */
    static vaciarCarrito() {
        localStorage.clear();
    }

    /**
     * Método que elimina un producto almacenado en el carrito
     * @param {String} id identificador del producto a eliminar
     */
    static eliminarProducto(id) {
        localStorage.removeItem(id);
    }

    /**
     * Método que obtiene el producto cuyo id coincide con el pasado como parámetro
     * @param {String} id identificador del producto a devolver
     * @returns producto contenido en el carrito
     */
    static getProducto(id) {
        return JSON.parse(localStorage.getItem(id));
    }

    /**
     * Método que indica si un producto se encuentra en el carrito o no
     * @param {String} id identificador del producto que queremos ver si está en el carrito
     * @returns true si el producto se encuentra en el carrito y false si no está en el carrito
     */
    static existeProducto(id) {
        return ControladorCarrito.getProducto(id) !== null;
    }

    /**
     * Método que obtiene el número de unidades que hay en el carrito para el producto que
     * se indica mediante su id en el parámetro de entrada
     * @param {String} id identificador del producto del que queremos saber la cantidad que hay en el carrito
     * @returns cantidad de unidades del producto indicado que hay en el carrito
     */
    static getCantidadProducto(id) {
        const producto = ControladorCarrito.getProducto(id);
        return producto ? producto.cantidad : 0;
    }

    /**
     * Método que añade un producto al carrito. Si producto ya existe en el carrito,
     * se añade otra unidad del producto al carrito
     * @param {Object} producto objeto de tipo producto que se quiere añadir al carrito
     */
    static anadirProducto(producto) {
        if(producto) {
            const id = producto.id;
            if(ControladorCarrito.existeProducto(id)) {
                producto = ControladorCarrito.getProducto(id);
                producto.cantidad += 1;
            }else {
                producto.cantidad = 1;
            }
            localStorage.setItem(id, JSON.stringify(producto));
        }
    }
    
    /**
     * Método que obtiene todos los productos del carrito y los devuelve en un array
     * @returns array con todos los productos que hay en el carrito
     */
    static getProductos() {
        let productosCarrito = [];
        for(let i=0; i<localStorage.length; i++) {
            const id = localStorage.key(i);
            const producto = JSON.parse(localStorage.getItem(id));
            productosCarrito.push(producto);
        }
        return productosCarrito;
    }
}