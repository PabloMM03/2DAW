<?php

class ControladorRestApi
{

    // Constructor
    public function __construct()
    {
    }

    /**
     * Funcion para procesar todo
     */
    public function procesar($params)
    {

        $path = $params['path'];
        $parametros = explode("/", $path);

        $metodo = $_SERVER['REQUEST_METHOD'];

        switch ($metodo) {
            case 'GET':
                // Mostrar todo o solo un Pokemon
                $this->getHandler($parametros);
                break;

            case 'DELETE':
                // Eliminar un Pokemon
                $this->deleteHandler($parametros);
                break;

            case 'PUT':
                // Actualizar un Pokemon
                $this->putHandler($parametros);
                break;

            
            case 'POST':
                // Crear un nuevo Pokemon
                $this->postHandler($parametros);
                break;

            default:
                # code...
                break;
        }
    }

    /**
     * Obtiene un json de un solo pokemon
     */
    private function getPokemon($id)
    {

        $modeloPokemon = new ModeloPokemon();
        $sourceDDBB['source'] = "DDBB";

        $pokemon = $modeloPokemon->getDatosPokemon($sourceDDBB, $id);

        // echo "<pre>";
        // print_r($pokemon);
        // echo "</pre>";

        $paraEnviar = json_encode($pokemon);

        header('Content-Type: application/json; charset=utf-8');

        echo $paraEnviar;
    }

    private function getAllPokemons()
    {
        $modeloPokemon = new ModeloPokemon();
        $sourceDDBB['source'] = "ddbb";

        $pokemon = $modeloPokemon->getAllPokemons($sourceDDBB);

        $paraEnviar = json_encode($pokemon);

        header('Content-Type: application/json; charset=utf-8');

        echo $paraEnviar;
    }

    private function getHandler($parametros)
    {
        if ($parametros[0] === "pokemon") {
            $this->getPokemon($parametros[1]);
        }

        if ($parametros[0] === "pokemons") {
            $this->getAllPokemons();
        }
    }

    private function putHandler($parametros)
    {
    }

    private function deleteHandler($parametros)
    {
        // echo "<pre>";
        // print_r($parametros);
        // echo "</pre>";

        if (isset($parametros[0]) && $parametros[0] === 'borrarPokemon') {
            $json = $this->deletePokemon($parametros[1]);
        } else {
            $json = array(
                'status' => 400,
                'results' => "Error, los campos están vacíos."
            );
        }

        echo json_encode($json, http_response_code($json['status']));
    }


    private function deletePokemon($id)
    {
        $json = array();
        $modeloPokemon = new ModeloPokemon();
        if($modeloPokemon->deletePokemon($id)->fetchAll()){
            $json = array(
                'status' => 200,
                'results' => "Se ha eliminado correctamente"
            );
        } else {
            $json = array(
                'status' => 404,
                'results' => "Algo va mal, no se ha encontrado"
            );
        }

        return $json;
    }

    private function postHandler() {
        $modeloPokemon = new ModeloPokemon();
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
        }
        if (isset($_POST['tipo']) && !empty($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
        }
        if (isset($_POST['imagen']) && !empty($_POST['imagen'])) {
            $imagen = $_POST['imagen'];
        }
        if (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {
            $descripcion = $_POST['descripcion'];
        }

        $params_pokemon = array(
            'poke_nombre' => $nombre,
            'poke_tipo' => $tipo,
            'poke_img' => $imagen,
            'poke_desc' => $descripcion
        );

        $modeloPokemon->insertPokemon($params_pokemon);

    }
}
