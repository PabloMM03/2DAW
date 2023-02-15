// Importamos el modelo de datos
import {productos, categorias} from "../db/db.js";
import {Util} from "./util.js"; 


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

export class ControladorCarrito {

    static vaciarCarrito() {
        localStorage.clear();
    }

   
    static eliminarProducto(id) {
        localStorage.removeItem(id);
    }

}