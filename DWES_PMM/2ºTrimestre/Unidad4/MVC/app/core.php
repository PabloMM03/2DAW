<?php
class Core
{
    protected $controladorActual = 'controlador_pokemon';
    protected $metodoActual = 'listar';
    protected $parametros = [];

    // Constructor
    public function __construct()
    {

        // Aquí sobreescribimos el controlador actual, el método y los parámetros que hay por defecto.

        if (isset($_GET['controlador']) && !empty($_GET['controlador'])) {
            $this->controladorActual = filter_var($_GET['controlador'], FILTER_SANITIZE_URL);
        }

        if (isset($_GET['metodo']) && !empty($_GET['metodo'])) {
            $this->metodoActual = filter_var($_GET['metodo'], FILTER_SANITIZE_URL);
        }

        $parametros = array_filter($_GET, fn ($element) => !in_array($element, ['controlador', 'metodo']), ARRAY_FILTER_USE_KEY);
        $this->parametros = filter_var_array($parametros, FILTER_SANITIZE_URL);


        // Cogemos de aquí la dirección del controlador que queremos poner
        $controllerDireccion = './app/controladores/' . $this->controladorActual . '.php';

        // Comprobamos si existe el archivo
        if (is_file($controllerDireccion)) {
            require_once $controllerDireccion;

            //Si todo esta bien, creamos una instancia del controlador y llamamos a la acción
            $controladorMayus = str_replace('_', '', ucwords($this->controladorActual, '_'));
            $controlador = new $controladorMayus();
        } else {
            throw new Exception("No existe el controlador solicitado", 1);
        }


        if(method_exists($controlador, $this->metodoActual)){
            $metodo = $this->metodoActual;
            $controlador -> $metodo($this->parametros);
        } else {
            throw new Exception("No existe el método solicitado", 1);
        }
    }
}
