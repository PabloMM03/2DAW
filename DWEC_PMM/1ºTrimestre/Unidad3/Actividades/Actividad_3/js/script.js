///////////////////////////// CÓDIGO QUE DEBES UTILIZAR /////////////////////////
const factura = [
    {id: 1, descripcion: "Atún 3 latas 30gr", precio: 2.4, cantidad: 3},
    {id: 2, descripcion: "Tomate frito 3 briks 390gr", precio: 1.45, cantidad: 1},
    {id: 3, descripcion: "Café molido 250gr", precio: 3.99, cantidad: 2},
    {id: 4, descripcion: "Garbanzos cocidos 400gr", precio: 0.85, cantidad: 4},
    {id: 5, descripcion: "Azúcar blanco 1kg", precio: 1.47, cantidad: 2},
    {id: 6, descripcion: "Arroz 1kg", precio: 1.35, cantidad: 1},
    {id: 7, descripcion: "Leche semidesnatada 1l", precio: 1.06, cantidad: 6},
    {id: 8, descripcion: "Tomate triturado 390gr", precio: 0.72, cantidad: 2},
    {id: 9, descripcion: "Nata líquida 3 unidades de 200 ml", precio: 1.75, cantidad: 1},
    {id: 10, descripcion: "Aceite de oliva suave 1l", precio: 4.99, cantidad: 4}
];
///////////////////////////// FIN CÓDIGO QUE DEBES UTILIZAR /////////////////////////

///////////////////////////// AQUÍ COMIENZA TU CÓDIGO /////////////////////////

// ACTIVIDAD 3:
// Apartado 1:
function obtenerCarosOrdenadosPorCantidad (factura){

    //Se hace un filter para obtener el precio con la condicion y se ordena con sort
    //luego se imprime todo el arry con un foreach
    const imprime = factura.filter(f => f.precio > 2).sort((f)=> f.cantidad).forEach( f => 
    console.log(`ID: ${f.id},Descripcion: ${f.descripcion}, Precio: ${f.precio}, Cantidad: ${f.cantidad}`));
    
    return imprime;
}

//Comprobacion 
obtenerCarosOrdenadosPorCantidad(factura);

// Apartado 2:

function obtenerNMasCaros(factura,num){

    if(num < 0 || num >=10){
        console.error("Numero introducido erroneo");
    }else{
    factura.filter(f => f.precio && num === f.cantidad).forEach(f=> 
    console.log(`ID: ${f.id},Descripcion: ${f.descripcion}, Precio: ${f.precio}, Cantidad: ${f.cantidad}`));
    }
}

//Comprobacion
obtenerNMasCaros(factura,3);

///////////////////////////// AQUÍ TERMINA TU CÓDIGO /////////////////////////