<?php

class ControladorRestApi{

    //COnstructor
    public function __contructor(){



    }

    //Funcion principal

    public function procesar($params){

        $params = "path";

        $path = $params['path'];
        // $ruta = "hola, adios, donPepito"
        $parameters = explode("/", $path);
        print_r($parameters);

        $methodPath = $_SERVER['REQUEST_METHOD'];

        switch($methodPath){
            case 'GET':
                if($parameters[0] == "pokemon"){
                    $this->getPokemon($parameters[1]);
                }
                if($parameters[0] == "pokemons"){
                    $this->getAllPokemons();
                }
            break;

            case 'POST':
                break;
            
            case 'PUT':
                break;

            case 'DELETE':
                break;

            default:
            break;
        }
    }

//Funcion que obtiene el json de un solo pokemon
    private function getPokemon($id){

        $modeloPokemon = new ModeloPokemon();
        $sourceDB['source'] = "DB";

        $pokemon = $modeloPokemon->getPokemonID($sourceDB, $id);

        $encode = json_encode($pokemon);

        header('Content-Type: application/json; charset=utf-8');

        // echo "<pre>";
        // print_r($pokemon);
        // echo "</pre>";

        echo $encode;
    }

    //Funcion qur obtiene el json de todos los pokemons 

private function getAllPokemons(){

    $modeloPokemon = new ModeloPokemon();
    $sourceDB['source'] = "db";

    $pokemon = $modeloPokemon->getAllPokemons($sourceDB);
    
    $encode = json_encode($pokemon);

    header('Content-Type: application/json; charset=utf-8');

    echo $encode;
}

}