<?php

class ControladorRestApi{

    //Constructor
    public function __contructor(){



    }

    //Funcion principal

    public function procesar($params){


        $path = $params['path'];
        
        // $path = "path"
        $parameters = explode("/", $path);
        

        $methodPath = $_SERVER['REQUEST_METHOD'];

        switch($methodPath){
            case 'GET':
                if($parameters[0] == "pokemon" && isset($parameters[1]) && is_numeric($parameters[1])){
                    $this->getPokemon($params,$parameters[1]);
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
    private function getPokemon($params,$parameters){

      $modeloPokemon = new ModeloPokemon();
      $imprime = $modeloPokemon->getPokemonID($params, intval($parameters[1]));

      header('Content-Type: application/json; charset=utf-8');
        $encode = json_encode($imprime);

        return $encode;

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