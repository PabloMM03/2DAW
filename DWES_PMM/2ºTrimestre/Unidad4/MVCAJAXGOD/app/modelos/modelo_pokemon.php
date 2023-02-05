<?php

class ModeloPokemon{
    
    private $host = DB_HOST;
    private $usuario = DB_USER;
    private $password = DB_PASS;
    private $nombre_base = DB_NAME;

    private $manejador_conexion; 
    private $manejador_query;

    //Constructor
    public function __construct(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->nombre_base;
        //Explicar en qué contexto puede ser útil la conexión persistente tal y como se crea.
        $opts = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        //Explicar por qué hemos decidido no utilizar aquí un bloque try-catch
        $this->manejador_conexion = new PDO($dsn,$this->usuario,$this->password,$opts);
        $this->manejador_conexion->exec('set names utf8');
    }
    
    //Obtener todos o un solo pokemon 
    
    public function getAllPokemons($params){
        if((isset($params['source'])&&($params['source']=='api'))){
            return $this->_getAllPokemonsFromAPI();
        }else{
            return $this->_getAllPokemonsFromBD();
                          
        }
        
    }

    private function _getAllPokemonsFromAPI(){
        //EN CASO DE QUE EL USUARIO HAYA DEFINIDO CUANTOS POKEMONS QUIERE MOSTRAR SE EJECUTARA LO SIGUIENTE

        $datosAPI = array(); //Array para más adelante

        if(isset($_POST['cantPok'])&& !empty($_POST['cantPok']) && (isset($_POST['enviar']) && $_POST['enviar'] == "Enviar")){
        
        $poklist = $_POST['cantPok']; //Cantidad de pokemons a mostrar obtenidos del usuario mediante peticion POST

        $ch = curl_init("https://pokeapi.co/api/v2/pokemon/?limit=400"); //Url de la API
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //opciones de la url
        
        $resultado = curl_exec($ch); //ejecutar url
        $resultado = json_decode($resultado,true); //Convertir el json en un array
        curl_close($ch);

        
        //Recorres los pokemons para sacar la información, se vuelve a hacer un curl de la url.
         for($i = 0;$i<$poklist;$i++){ 
            $url = $resultado['results'][$i]['url'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $resultado2 = curl_exec($ch);
                $resultado2 = json_decode($resultado2, true);
                
            curl_close($ch);

            //Por último se sacan los demás datos a mostrar.
            
            $datosAPI[$i]['id_pokemon'] = $resultado2['id'];
            $datosAPI[$i]['nombre'] = $resultado2['forms'][0]['name'];
            $datosAPI[$i]['tipo'] = $resultado2['types'][0]['type']['name'];
            $datosAPI[$i]['url_imagen'] = $resultado2['sprites']['front_default'];
            $datosAPI[$i]['url_imagen_shiny'] = $resultado2['sprites']['front_shiny'];
    } 
        }else{//EN CASO DE QUE EL USUARIO NO HAYA DEFINIDO CUANTOS POKEMONS QUIERE MOSTRAR SE EJECUTARA LO SIGUIENTE

            $poklist = 10; //Cantidad de pokemons a mostrar obtenidos del usuario mediante peticion POST

        $ch = curl_init("https://pokeapi.co/api/v2/pokemon/?limit=400"); //Url de la API
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //opciones de la url
        
        $resultado = curl_exec($ch); //ejecutar url
        $resultado = json_decode($resultado,true); //Convertir el json en un array
        curl_close($ch);

        
        //Recorres los pokemons para sacar la información, se vuelve a hacer un curl de la url.
         for($i = 0;$i<$poklist;$i++){ 
            $url = $resultado['results'][$i]['url'];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $resultado2 = curl_exec($ch);
                $resultado2 = json_decode($resultado2, true);
                
            curl_close($ch);

            //Por último se sacan los demás datos a mostrar.
            
            $datosAPI[$i]['id_pokemon'] = $resultado2['id'];
            $datosAPI[$i]['nombre'] = $resultado2['forms'][0]['name'];
            $datosAPI[$i]['tipo'] = $resultado2['types'][0]['type']['name'];
            $datosAPI[$i]['url_imagen'] = $resultado2['sprites']['front_default'];
            $datosAPI[$i]['url_imagen_shiny'] = $resultado2['sprites']['front_shiny'];

     
    } 


        }
         return $datosAPI;

            //    echo '<pre>';
            //    print_r($resultado);
            //    echo '<pre>';
        
    }

    private function _getAllPokemonsFromBD(){
        $resultado = $this->manejador_conexion->query('SELECT pokemons.id_pokemon, pokemons.nombre, 
        tipos.nombre AS tipo, pokemons.url_imagen FROM pokemons INNER JOIN tipos ON 
        pokemons.tipo = tipos.id_tipo')->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;      
    }
    //Obtener todos los tipos

    public function getAllTipos(){
        $resultado = $this->manejador_conexion->query('SELECT * FROM tipos')->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    //Obtener el id de la API o BBDD

    public function getPokemonID($params,$id){
        if(isset($params['source'])&& ($params['source'] == 'api')){
            return $this->_getIdPokemonAPI($id);
        }else{
            return $this->_getIdPokemonBD($id);
        }
    }

    private function _getIdPokemonAPI($id){

        $ch = curl_init("https://pokeapi.co/api/v2/pokemon/".$id); //Url de la API
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //opciones de la url
        
        $resultado = curl_exec($ch); //ejecutar url
        $resultado = json_decode($resultado,true); //Convertir el json en un array
        curl_close($ch);

        $infoPokemon = array();

        $infoPokemon['id_pokemon'] = $resultado['id'];
        $infoPokemon['nombre'] = $resultado['forms'][0]['name'];
        $infoPokemon['tipo'] = $resultado['types'][0]['type']['name'];
        $infoPokemon['descripcion'] = 'El amigable, divertido, peligroso y todopoderoso \''.ucwords($resultado['forms'][0]['name']).'\'';
        $infoPokemon['url_imagen'] = $resultado['sprites']['front_default'];
        
        return $infoPokemon;


    }


    private function _getIdPokemonBD($id){
        $resultado = $this->manejador_conexion->query('SELECT pokemons.id_pokemon, pokemons.nombre,
        tipos.nombre AS tipo, pokemons.url_imagen, pokemons.descripcion FROM pokemons INNER JOIN tipos ON 
        pokemons.tipo = tipos.id_tipo WHERE pokemons.id_pokemon = \''.$id.'\'')->fetchAll(PDO::FETCH_ASSOC);
        
        return reset($resultado);
    }

    //Eliminar Pokemon
    public function deletePokemon($id){
    
        //   $query = 'DELETE FROM pokemons WHERE id_pokemon ='.$id;
        //   $del = $this->manejador_conexion->prepare($query);
        //   $del->execute();

          return $this->manejador_conexion->query('DELETE from pokemons WHERE pokemons.id_pokemon = '.$id);
        }

        //Añadir Pokemon a traves de formulario
    public function añadirPokemon($params_pokemon){
       
        $query = $this->manejador_conexion->prepare('INSERT INTO pokemons(nombre, tipo, url_imagen, descripcion) 
        VALUES (:poke_nombre, :poke_tipo, :poke_img, :poke_desc)');

        return $query->execute(array(

            'poke_nombre' =>$params_pokemon['poke_nombre'],
            'poke_tipo' =>$params_pokemon['poke_tipo'],
            'poke_img' =>$params_pokemon['poke_img'],
            'poke_desc' =>$params_pokemon['poke_desc'],

        ));
    }

    //Añadir pokemon de API a Base de datos
public function alimentarBBDD($id){


    $ch = curl_init("https://pokeapi.co/api/v2/pokemon/".$id); //Url de la API
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //opciones de la url
        
        $resultado = curl_exec($ch); //ejecutar url
        $resultado = json_decode($resultado,true); //Convertir el json en un array

            //     echo '<pre>';
            //    print_r($resultado);
            //    echo '<pre>';
               
        curl_close($ch);

        $infoPokemon = array();

        $infoPokemon['id_pokemon'] = $resultado['id'];
        $infoPokemon['nombre'] = $resultado['forms'][0]['name'];
        $infoPokemon['tipo'] = $resultado['types'][0]['slot'];
        //$infoPokemon['tipo'] = $resultado['types'][0]['type']['name'];
        $infoPokemon['descripcion'] = 'El amigable, divertido, peligroso y todopoderoso \''.ucwords($resultado['forms'][0]['name']).'\'';
        $infoPokemon['url_imagen'] = $resultado['sprites']['front_default'];
        
        //  echo intval($infoPokemon['tipo']);

        //Consulta para insertar datos de la api en la base de datos 
    $query = $this->manejador_conexion->prepare('INSERT INTO pokemons(nombre,tipo,url_imagen,descripcion) 
    VALUES (:poke_nombre, :poke_tipo, :poke_desc, :poke_img)');


    return $query->execute(array(

    //Opcion1
    
    'poke_nombre' =>$infoPokemon['nombre'],
    'poke_tipo' =>$infoPokemon['tipo'],
    'poke_desc' =>$infoPokemon['url_imagen'],
    'poke_img' =>$infoPokemon['descripcion'],


));
      
    


    // consulta($queryTipo);

    // if($queryTipo == true){

    //     $infoPokemon['tipo'] = 'poke_tipo';

    // }

        

}

public function consulta(){

    $queryTipo = $this->manejador_conexion->prepare('SELECT tipo FROM pokemons WHERE nombre =:poke_nombre')->fetchAll(PDO::FETCH_ASSOC);

    return $queryTipo->execute(array(

        'poke_tipo' =>$infoPokemon['tipo'],
    
    ));

}
//Obtener pokemons de 20 en 20
public function tandaPokemons($params){
    if((isset($params['source'])&&($params['source']=='api'))){
        return $this->_tandaPokemonsAPInext();
    }else{
        return $this->_tandaPokemonsBD();
                      
    }
}

private function _tandaPokemonsAPInext(){

    //Comprobacion de Session
    
    if (!isset($_SESSION['datosAPI'])) {
        $_SESSION['datosAPI'] = array(
            'url' => 'https://pokeapi.co/api/v2/pokemon',
        );
       //Conversion de Json a array
        $ch = curl_init($_SESSION['datosAPI']['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);
        $resultado = json_decode($resultado, true);
        curl_close($ch);

        $_SESSION['datosAPI']['url'] = $resultado['next']; //Siguiente tanda de pokemons a mostrar
    }
    

    $ch = curl_init($_SESSION['datosAPI']['url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $resultado = json_decode($resultado, true);
    curl_close($ch);

    $_SESSION['datosAPI']['url'] = $resultado['next'];
    
  
    //Obtenemos los datos de los pokemons

    for ($i = 0; $i < 20; $i++) {

        $url = $resultado['results'][$i]['url'];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $resultado2 = curl_exec($ch);
            $resultado2 = json_decode($resultado2, true);
         curl_close($ch);

            // echo("<pre>");
            // print_r($resultado2);
            // echo("</pre>");

       
        $datosAPI[$i]['nombre'] = $resultado2['forms'][0]['name'];
        $datosAPI[$i]['id_pokemon'] = $resultado2['id'];
        $datosAPI[$i]['tipo'] = $resultado2['types'][0]['type']['name'];
        $datosAPI[$i]['url_imagen'] = $resultado2['sprites']['front_default'];
        $datosAPI[$i]['url_imagen_shiny'] = $resultado2['sprites']['front_shiny'];
    }

    
    return $datosAPI;
}

public function _tandaPokemonsBD(){

}


}