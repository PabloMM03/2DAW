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
                   $imp = array();
                    if($modeloPokemon->deletePokemon(intval($parameters[1]))->fetchAll()){
                        $imp = array(
                            'status' =>200,
                            'results' => "Pokemon eliminado correctamente"
                        );
                        $encode = json_encode($imp, http_response_code($imp['status']));
                        echo $encode;
                        
                    }else{
                        $imp = array(
                            'status' =>404,
                            'results' =>"Pokemon no encontrado"
                        );

                    }                    
                    
                }else{

                    $imp = array(
                        'status' =>400,
                        'results' =>"Error, no hay datos en los campos"
                    );         
                }
                    $encode = json_encode($imp, http_response_code($imp['status']));
                    echo $encode;

                break;

            //Añadimos un pokemon 

            case 'POST':
                // $modeloPokemon = new ModeloPokemon();

                // if(isset($_POST['poke_nombre']) && !empty($_POST['poke_nombre'])){
                //     $nombre = $_POST['poke_nombre'];
                // }if(isset($_POST['poke_tipo']) && !empty($_POST['poke_tipo'])){
                //     $tipo = $_POST['poke_tipo'];
                // }
                // if(isset($_POST['poke_img']) && !empty($_POST['poke_img'])){
                //     $url_imagen = $_POST['poke_img'];
                // }
                // if(isset($_POST['poke_desc']) && !empty($_POST['poke_desc'])){
                //     $descripcion = $_POST['poke_desc'];
                // }

                // $params_pokemon = array(
                //     'poke_nombre' =>$nombre,
                //     'poke_tipo'  => $tipo,
                //     'poke_img' =>$url_imagen,
                //     'poke_desc' =>$descripcion,
                // );

                // $modeloPokemon->añadirPokemon($params_pokemon);

                 break;

            //

            case 'PUT':

                break;

            default:
                 break;
            
        }
    }



}