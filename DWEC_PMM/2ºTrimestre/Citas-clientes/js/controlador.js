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

/**
 * 
 * @returns json clientes 
 */
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

/**
 * 
 * @param {*} datos 
 * @returns 
 */
    static async setCliente(datos) {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
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

    /**
 * 
 * @returns json citas clientes 
 */
    static async mostrarCitas(nif,datos) {
        
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
                   citas: datos
                })
            });
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }

    /**
     * 
     * @param {*} datos 
     * @returns 
     */
    static async setCita(datos) {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "setCita",
                   cita: datos,
                })
            });
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }

/**
 * Eliminar Cliente
 * @param {*} nif 
 * @returns 
 */
    static async eliminarCliente(nif) {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "eliminarCliente",
                   nif: nif,
                })
            });
            
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }

/**
 * Eliminar Cita
 * @param {*} nif 
 * @returns 
 */
    static async eliminarCita(id) {
        let respuestaJSON = null;
        try {
            const respuesta = await fetch(`citasClientes.php`, {
                method : "POST",
                headers : {
                    "content-type" : "application/json"
                },
                body : JSON.stringify({
                   metodo: "eliminarCita",
                   id: id,
                })
            });
            
            respuestaJSON = await respuesta.json();
        }catch(error) {
            console.error(error.message);
        }
        return respuestaJSON;
    }

}