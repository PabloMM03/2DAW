<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

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

            //Mostramos un pokemon o todos dependiendo del parametro asignado
            case 'GET':
                if($parameters[0] == "pokemon" && isset($parameters[1]) && is_numeric($parameters[1])){
                   
                    
                       $modeloPokemon = new ModeloPokemon();
                       $imp = $modeloPokemon->getPokemonID($params,intval($parameters[1]));
                    
                    //   header('Content-Type: application/json; charset=utf-8');
                     
                      $encode = json_encode($imp);
                    
                      echo $encode;
                   
                }
                if($parameters[0] == "pokemons"){

                    $modeloPokemon = new ModeloPokemon();
                    $imp = $modeloPokemon->getAllPokemons($params);
                    // header('Content-Type: application/json; charset=utf-8');
                    $encode = json_encode($imp);
                    echo $encode;
                }
            break;



            //Eliminamos un pokemon 
            case 'DELETE':
                if(isset($parameters[0]) && $parameters[0] === "deletePokemon"){
                    
                   $modeloPokemon = new ModeloPokemon();
                   $imp = $modeloPokemon->deletePokemon($parameters[1]);
                   $imp = array();

                    if($modeloPokemon->deletePokemon(intval($parameters[1]))->fetchAll()){
                        $imp = array( //Mensaje pokemon eliminado
                            'status' =>200,
                            'results' => "Pokemon eliminado correctamente"
                        );

                           
                    }          
                    $encode = json_encode($imp, http_response_code($imp['status']));
                    echo $encode;  
                }
                //Comprobar terminal
                //curl -X "DELETE" 'http://localhost/Temas/Unidad2/Ejercicio/CartaPoderosa/?controlador=restapi&metodo=procesar&path=pokemon/deletePokemon/1'
                break;

            //Añadimos un pokemon 

            case 'POST':
                if(isset($parameters[0]) && $parameters[0] === "añadirPokemon"){

                
                $modeloPokemon = new ModeloPokemon();

                    $nombre = $_POST['poke_nombre'];
                    $tipo = $_POST['poke_tipo'];
                    $url_imagen = $_POST['poke_img'];
                    $descripcion = $_POST['poke_desc'];
                    
                 
                 $params_pokemon = array(
                     'poke_nombre' =>$nombre,
                     'poke_tipo'  =>$tipo,
                     'poke_img' =>$url_imagen,
                     'poke_desc' =>$descripcion,
                 );

                 $imp = $modeloPokemon->añadirPokemon($params_pokemon);
                 $encode = json_encode($imp);
                 echo $encode;
                }
                //Comprobar Terminal
                //curl -d '{"id_pokemon":2,"nombre":"Raichu","tipo":"electric","url_imagen":"https:\/\/raw.githubusercontent.com\/PokeAPI\/sprites\/master\/sprites\/pokemon\/26.png","descripcion":"Una descripci\u00f3n del malvado pokemon raichu."}' -X "POST" 'http://localhost/Temas/Unidad2/Ejercicio/CartaPoderosa/?controlador=restapi&metodo=procesar&path=pokemon/añadirPokemon/1'
                 break;

            case 'PUT':

                if(isset($parameters[0]) && $parameters[0] === "updatePokemon"){
                    $modeloPokemon = new ModeloPokemon();

                    $imp = $modeloPokemon->actualizar($params_pokemon['poke_id']);
                    $encode = json_encode($imp);
                    echo $encode;
                }

                break;

            default:
                 break;
            
        }
    }



}