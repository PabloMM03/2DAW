<?php

class ControladorRestApi{

    public function __contructor(){



    }

    public function procesar($params){

        $path;
        
        $path = $params['path'];

        $parameters = explode("/", $path);

        $methodPath = $_SERVER['REQUEST_METHOD'];

        switch($methodPath){
            case 'GET':
                if($parameters[0]== "pokemon"){
                    $this->getPokemon($parameters[1]);
                }
                if($parameters[0] == "pokemons"){
                    $this->getAllPokemons();
                }
            break;

            case 'POST':
                break;
            
            case 'UPDATE':
                break;

            case 'DELETE':
                break;

            default:
            break;
        }
    }


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

private function getAllPokemons(){

    $modeloPokemon = new ModeloPokemon();
    $sourceDB['source'] = "db";

    $pokemon = $modeloPokemon->getAllPokemons($sourceDB);
    
    $encode = json_encode($pokemon);

    header('Content-Type: application/json; charset=utf-8');

    echo $encode;
}

}