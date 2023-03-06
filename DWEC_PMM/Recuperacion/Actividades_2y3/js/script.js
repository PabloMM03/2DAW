///////////////////////////// FUNCIONES QUE DEBES IMPLEMENTAR /////////////////////////

// ACTIVIDAD 2:

// Clase Producto
class Producto{

    //atributos privados
    #id;
    #descripcion;
    #precio;

    //Contructor de la clase 

    constructor(id, descripcion, precio){
        this.#id = id;
        this.#descripcion = descripcion;
        this.#precio = precio;
    }

    //Getters y setters

    get id(){
        return this.#id;
    }
    set id(id){
        this.#id = id;
    }

    get descripcion(){
        return this.#descripcion;
    }
    set descripcion(descripcion){
        this.#descripcion = descripcion;
    }

    get precio(){
        return this.#precio;
    }
    set precio(precio){
         this.#precio = precio;
    }

    //Metodo toString
    toString(){
        return `${this.#id} ${this.#descripcion} ${this.#precio}`;
    }


}

//Clase ArticuloFactura

class ArticuloFactura extends Producto{
    //Atributos privados
    #cantidad;

    //Contructor clase 
    constructor(id,descripcion,precio,cantidad){
        super(id,descripcion,precio);
        this.#cantidad = cantidad;
    }

    //Getters y setters
    get cantidad(){
        return this.#cantidad;
    }
    set cantidad(cantidad){
        this.#cantidad = cantidad;
    }

    //Metodo toString
    toString(){
            return `(${this.id}) ${this.descripcion} ${this.precio.toFixed(2)}€ x ${this.cantidad}`
        }

    getTotal(){
        return this.precio * this.cantidad;
    }

}


//ACTIVIDAD 3:


function crearFatura(){
    //Crear array con articulos

    const factura = [
        new ArticuloFactura(8, "Almendras bolsa 200gr", 3.12, 3),
        new ArticuloFactura(12, "Harina bolsa 1kg", 2.30, 1),
        new ArticuloFactura(4, "Piña coserva lata 500gr", 2.10, 4)
    ];

    let total = 0;
    console.log("FACTURA:");
    for(const articulo of factura){
        total +=articulo.getTotal();
        console.log(`${articulo.toString()} - ${articulo.getTotal().toFixed(2)}€`);
    }
    console.log(`TOTAL -  ${total.toFixed(2)}€`);


    console.log('//////////////////////////////////////PUNTO 3////////////////////////////////////////');

     factura.filter(articulo =>articulo.precio>2).sort((articulo1, articulo2)=>articulo1.cantidad - articulo2.cantidad).forEach(
        articulo =>console.log(`${articulo.toString()} - ${articulo.getTotal().toFixed(2)}€`));
     
    
}

crearFatura();





///////////////////////////// FIN FUNCIONES QUE DEBES IMPLEMENTAR /////////////////////////





