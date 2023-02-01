///////////////////////////// FUNCIONES QUE DEBES IMPLEMENTAR /////////////////////////

// ACTIVIDAD 1:
// Clase Producto

class Producto{
    //Declaracion de atributos

    #id;
    #descripcion;
    #precio;

    //Constructor
    constructor(id,descripcion,precio){
        this.#id = id;
        this.#descripcion = descripcion;
        this.#precio = precio;
    }
    //Getter y Setters
    get id(){
        return this.#id;
    }
    set id(id){
        return this.#id = id;
    }
    get descripcion(){
        return this.#descripcion;
    }
    set descripcion(descripcion){
        return this.#descripcion = descripcion;
    }
    get precio(){
        return this.#precio;
    }
    set precio(precio){
        return this.#precio = precio;
    }

    //ToString
    toString(){
        let res = super.toString();
        res = `(${this.#id})  ${this.#descripcion} - ${this.#precio}€`;
        return res;
    }

}


//Clase ArticuloFactura

class ArticuloFactura extends Producto{

    //Declaracion de atributos

    #cantidad;

    //Constructor
    constructor(id,descripcion,precio,cantidad){
        super(id,descripcion,precio);
        this.#cantidad = cantidad;
    }
    //Getters y Settes
    get cantidad(){
        this.#cantidad;
    }
    set cantidad(cantidad){
        this.#cantidad = cantidad;
    }

    //Metodo geTotal
    geTotal(){
        let totalPrecioProd = this.#cantidad * this.precio;
        return totalPrecioProd;
    }
    //Metodo toString redefinido

    toString(){
        let res = super.toString();
        let este = ` x ${this.#cantidad}`;
        const total = res + este;
        return total;
    }
}
        

//ACTIVIDAD 2:
    function crearFactura(){
        //Se crea un array con 3 articulos y luego se devuelve otro array segun el formato con foreach
        
        console.log('FACTURA:');
        const articulos = [
          art1 = new ArticuloFactura(8,"Almendras bolsa 200gr",3.12,3),
          art2 = new ArticuloFactura(12,"Harina bolsa 1Kg",2.30,1),
          art3 = new ArticuloFactura(4,"Piña conserva lata 500gr",2.10,4),
        ]
        articulos.forEach(a =>console.log(`(${a.id}) ${a.descripcion} - ${a.precio} x ${a.cantidad} - ${a.geTotal()}`));
        let total = art1.geTotal() + art2.geTotal() + art3.geTotal();
        total = Math.round(total);
        console.log('TOTAL: ' + total);
        
    }
    crearFactura();



///////////////////////////// FIN FUNCIONES QUE DEBES IMPLEMENTAR /////////////////////////