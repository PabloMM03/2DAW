// Importamos el modelo de datos
import {productos, categorias} from "../db/db.js";
import {Util} from "./util.js"; 

//ControladorCarrito
export class ControladorDB {
   
    static getProductos() {
        return productos;
    }
    
    static getProducto(id) {
        const productoArray = productos.filter(producto => producto.id === id);
        return productoArray.length === 0 ? null : productoArray[0];
    }

   
    static getCategorias() {
        return categorias;
    }

    static getCategoria(id) {
        const categoriaArray = categorias.filter(categoria => categoria.id === id);
        return categoriaArray.length === 0 ? null : categoriaArray[0];
    }

    static getProductosPorCategorias(categorias) {
        return productos.filter(producto => categorias.includes(producto.categoria));
    }

}
//COntroladorCarrito
export class ControladorCarrito {

    static vaciarCarrito() {
        localStorage.clear();
    }

    static eliminarProducto(id) {
        localStorage.removeItem(id);
    }
    
    static getProducto(id) {
        return JSON.parse(localStorage.getItem(id));
    }

    static existeProducto(id) {
        return ControladorCarrito.getProducto(id) !== null;
    }

    static getCantidadProducto(id) {
        const producto = ControladorCarrito.getProducto(id);
        return producto ? producto.cantidad : 0;
    }


    static addProducto(producto) {
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