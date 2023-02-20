export class ControladorPHP {

    /**
     * Método que elimina la base de datos para el caso de que se necesite
     * establecer el estado inicial.
     * La siguiente petición al servidor creará de nuevo la base de datos
     * y la rellenará con algunos datos de prueba.
     * @returns Respuesta del servidor en formato JSON
     */
    static async eliminarBD() {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "eliminarBD"
                })
            });
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }


    static async getProductos() {
        const respuesta = await fetch(`citasCliente.php`, {
            method : "POST",
            headers : {
                "content-type" : "application/x-www-form-urlencoded"
            },
            body : "metodo=getClientes"
        });
        const clientes = await respuesta.json();
        return clientes;
    }

}