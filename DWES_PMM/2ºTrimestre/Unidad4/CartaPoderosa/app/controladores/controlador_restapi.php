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
                //curl -X "DELETE" 'http://localhost/Temas/Unidad2/Ejercicio/CartaPoderosa/?controlador=restapi&metodo=procesar&path=deletePokemon/1'
                break;

            //Añadimos un pokemon 

            case 'POST':
                if(isset($parameters[0]) && $parameters[0] === "addPokemon"){

                
                $modeloPokemon = new ModeloPokemon();

                echo '<pre>';
                print_r($_POST);
                echo '</pre>';

                
                    // $nombre = $_POST['poke_nombre'];
                    // $tipo = $_POST['poke_tipo'];
                    // $url_imagen = $_POST['poke_img'];
                    // $descripcion = $_POST['poke_desc'];
                    
                 
                 $params_pokemon = array(
                     'poke_nombre' =>$_POST['poke_nombre'],
                     'poke_tipo'  =>$_POST['poke_tipo'],
                     'poke_img' =>$_POST['poke_img'],
                     'poke_desc' =>$_POST['poke_desc'],
                 );

                 $imp =$modeloPokemon->añadirPokemon($params_pokemon);
                 $encode = json_encode($imp);
                 echo $encode;
                }
                //Comprobar Terminal
                //curl -d '{"id_pokemon":2,"nombre":"Raichu","tipo":"electric","url_imagen":"https:\/\/raw.githubusercontent.com\/PokeAPI\/sprites\/master\/sprites\/pokemon\/26.png","descripcion":"Una descripci\u00f3n del malvado pokemon raichu."}' -X "POST" 'http://localhost/Temas/Unidad2/Ejercicio/CartaPoderosa/?controlador=restapi&metodo=procesar&path=pokemon/añadirPokemon/1'
                //curl -d '{"nombre":"Raichu","tipo":"electric","url_imagen":https:\/\/raw.githubusercontent.com\/PokeAPI\/sprites\/master\/sprites\/pokemon\/26.png","descripcion":"Una descripcion."}' -X "POST" http://localhost:3000/DWES_PMM/2%C2%BATrimestre/Unidad4/CartaPoderosa/?controlador=restapi&metodo=procesar&path=pokemon/addPokemon
                // curl-v -XPOST -H "Content-type: application/json" -d '{"nombre":"Raichu","tipo":"electric","url_imagen":"https:\/\/raw.githubusercontent.com\/PokeAPI\/sprites\/master\/sprites\/pokemon\/26.png","descripcion":"Una descripcion."}' 'http://localhost:3000/DWES_PMM/2%C2%BATrimestre/Unidad4/CartaPoderosa/?controlador=restapi&metodo=procesar&path=pokemon/addPokemon'
                
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