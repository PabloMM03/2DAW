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

    static async mostrarClientes() {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "getClientes"
                })
            });
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }

    static async setCliente(datos) {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch("citasClientes.php", {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "setCliente",
                   cliente: datos,
                })
            });
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }

    static async mostrarCitas(nif) {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "getCitasCliente",
                   nifCliente: nif,
                })
            });
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }
}