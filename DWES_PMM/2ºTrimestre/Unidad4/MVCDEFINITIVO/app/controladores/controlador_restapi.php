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
                   
                       $modeloPokemon = new ModeloPokemon();
                       $imp = $modeloPokemon->getPokemonID($params,intval($parameters[1]));
                    

                      header('Content-Type: application/json; charset=utf-8');
                      $encode = json_encode($imp);
                    
                      echo $encode;
                   
                }
                if($parameters[0] == "pokemons"){
                    $this->getAllPokemons();
                }
            break;

            case 'POST':
                break;

            default:
            break;
            
        }
    }

    
//Funcion que obtiene el json de un solo pokemon
    private function getPokemon($id){

        $modeloPokemon = new ModeloPokemon();
        $sourceDB['source'] = "DB";

         $modeloPokemon->getPokemonID($sourceDB, $id);

        $encode = json_encode($modeloPokemon);
        

        header('Content-Type: application/json; charset=utf-8');

        //  echo "<pre>";
        //  print_r($pokemon);
        //  echo "</pre>";

        return $encode;
    }

    //Funcion qur obtiene el json de todos los pokemons 

}