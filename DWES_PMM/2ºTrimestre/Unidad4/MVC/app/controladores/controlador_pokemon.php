<?php

class ControladorPokemon
{
    private $mensajes_usuario;


    // Constructor
    public function __construct()
    {
        if (isset($_SESSION['mensajes_usuario'])) {
            $this->mensajes_usuario = $_SESSION['mensajes_usuario'];
        } else {
            $this->mensajes_usuario = '';
        }
    }

    // Métodos 
    public function listar($params)
    {
        $mensajes_usuario = $this->mensajes_usuario;
        $modelo_pokemon = new ModeloPokemon();
        $datos = $modelo_pokemon->getAllPokemons($params);

        if (is_file("./app/vistas/pokemon/listado_pokemons.tpl.php")) {
            require_once('./app/vistas/pokemon/listado_pokemons.tpl.php');
            $_SESSION['mensajes_usuario'] = '';
        } else {
            throw new Exception('Vista no disponible');
        }
    }

    /**
     * Muestra los datos del pokemon
     * $parametros Tiene todos los datos pasados como parámetros
     */
    public function ver($parametros)
    {

        if (is_file(RUTA_APP . '\modelos\modelo_pokemon.php')) {
            $modelo_pokemon = new ModeloPokemon();
        } else {
            throw new Exception("No se ha encontrado el modelo", 1);
        }

        // Comprueba si es un dígito o no
        if (ctype_digit($parametros['id'])) {

            // Lanza modelo y obtiene los datos del pokemon
            if (is_file(RUTA_APP . '\modelos\modelo_pokemon.php')) {
                $datos = $modelo_pokemon->getDatosPokemon($parametros, $parametros['id']);
            } else {
                throw new Exception("No se ha encontrado el modelo", 1);
            }

            // Con los datos de antes, los mete en la vista
            if (is_file(RUTA_APP . '\vistas\pokemon\info_pokemon.tpl.php')) {
                require_once(RUTA_APP . '\vistas\pokemon\info_pokemon.tpl.php');
            } else {
                throw new Exception("No se ha encontrado la vista", 1);
            }
        } else {
            throw new Exception("El ID no es un dígito");
        }
    }


    /* Delete */
    public function delete($params)
    {

        if (is_file(RUTA_APP . '\modelos\modelo_pokemon.php')) {
            $modelo_pokemon = new ModeloPokemon();
        } else {
            throw new Exception("No se ha encontrado el modelo", 1);
        }

        $modelo_pokemon->deletePokemon($_POST['id']);

        $datos = $modelo_pokemon->getAllPokemons($params);
        require_once(RUTA_APP . '\vistas\pokemon\listado_pokemons.tpl.php');
    }

    public function addPokemon()
    {
        $modelo = new ModeloPokemon();
        if (!isset($_POST['add_pokemon'])) {
            //Aquí entra la primera vez, o cuando no hay datos en $_POST['add_pokemon']
            if (is_file("./app/vistas/pokemon/formulario_add_pokemon.tpl.php")) {
                $datos = array();

                $datos['tipos'] = $modelo->getAllTipos();

                require_once('./app/vistas/pokemon/formulario_add_pokemon.tpl.php');
            } else {
                throw new Exception('Vista no disponible');
            }
        } else {
            //Aquí entra si el usuario ha pulsado el botón add_pokemon del formulario
            $parametros_pokemon = $_POST;
            $parametros_pokemon['poke_tipo'] = reset(array_keys($parametros_pokemon['poke_tipo']));
            if ($modelo->insertPokemon($parametros_pokemon)) {
                $_SESSION['mensajes_usuario'] = 'Pokemon insertado adecuadamente';
                $this->mensajes_usuario = $_SESSION['mensajes_usuario'];
                header('Location: ./?controlador=pokemon&metodo=listar');
            } else {
                $_SESSION['mensajes_usuario'] = 'Se ha petao';
                $this->mensajes_usuario = $_SESSION['mensajes_usuario'];
                header('Location: ./?controlador=pokemon&metodo=insertPokemon');
            };
        }
    }

    public function cargarEnBBDD($params)
    {
        $modelo = new ModeloPokemon();

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        if (is_file("./app/vistas/pokemon/listado_pokemons.tpl.php")) {
            $datos = array();

            $datos['pokemons'] = $modelo->getAllPokemons($params);

            echo "<pre>";
            print_r($datos['pokemons']);
            echo "</pre>";

            require_once('./app/vistas/pokemon/listado_pokemons.tpl.php');
        } else {
            throw new Exception('Vista no disponible');
        }
    }
}
