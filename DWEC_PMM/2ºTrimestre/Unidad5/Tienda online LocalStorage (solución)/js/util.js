
/**
 * Clase de utilidad conteniendo métodos estáticos que pueden servir para
 * solucionar problemas comunes de programación.
 */
export class Util {
    /**
     * Método que devuelve un array de elementos sin repetición (únicos) provenientes
     * del array que se pasa por parámetro y que puede tener elementos repetidos
     * @param {Array} array array en del que se obtendrá un nuevo array con elementos únicos (sin repetición) 
     * @returns array con elementos únicos provenientes del array de entrada
     */
    static getArraySinRepeticion(array) {
        return [...new Set(array)];
    }
}