<?php

class ModeloPokemon
{

    private $host;
    private $dbName;
    private $user;
    private $pass;
    public $conection;

    public function __construct()
    {
        $this->host = constant('DB_HOST');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');
        $this->dbName = constant('DB_NAME');

        try {
            $opts = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );
            $this->conection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName . '', $this->user, $this->pass, $opts);
            $this->conection->exec('set names utf8');
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    // Obtener el listado de pokemons
    public function getAllPokemons($params)
    {
        if (isset($params['source']) && ($params['source'] == 'api')) {
            return $this->_getAllPokemonsFromAPI();
        } else {
            return $this->_getAllPokemonsFromDB();
        }
    }

    private function _getAllPokemonsFromAPI()
    {

        ////////////Primera petición para Nombre e ID//////////////////
        $ch = curl_init("https://pokeapi.co/api/v2/pokemon/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_URL, "https://pokeapi.co/api/v2/pokemon/1");
        $resultado = curl_exec($ch);
        $resultado = json_decode($resultado, true);
        curl_close($ch);

        // echo("<pre>");
        // print_r($resultado['results']);
        // echo("</pre>");


        ////////////Primera petición para info del Pokemon//////////////////

        $arrayPokemon = array();

        for ($i = 0; $i < 15; $i++) {
            $url = $resultado['results'][$i]['url'];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($ch);
            $respuesta = json_decode($respuesta, true);
            curl_close($ch);

            // echo("<pre>");
            // print_r($respuesta);
            // echo("</pre>");

            $arrayPokemon[$i]['nombre'] = $respuesta['forms'][0]['name'];
            $arrayPokemon[$i]['id_pok'] = $respuesta['id'];
            $arrayPokemon[$i]['tipo'] = $respuesta['types'][0]['type']['name'];
            $arrayPokemon[$i]['url_imagen'] = $respuesta['sprites']['front_default'];
        }

        return $arrayPokemon;
    }

    private function _getAllPokemonsFromDB()
    {
        $resultado = $this->conection->query('SELECT pokemons.id_pokemon, pokemons.nombre, tipos.nombre AS tipo, pokemons.url_imagen FROM pokemons INNER JOIN tipos ON pokemons.tipo = tipos.id_tipo')->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function getAllTipos()
    {
        $resultado = $this->conection->query('SELECT * FROM tipos')->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    /**
     * Hace una consulta para obtener los datos de solo un pokemon
     * @id Se le pasa el id del pokemon que se quieren consultar los datos
     */
    public function getDatosPokemon($params, $id)
    {
        if (isset($params['source']) && ($params['source'] == 'api')) {
            return $this->_getPokemonsFromAPI($id);
        } else {
            return $this->_getPokemonsFromDB($id);
        }
    }

    private function _getPokemonsFromAPI($id)
    {
        $datosPokemon = array();

        ////////////Primera petición para Nombre e ID//////////////////
        $ch = curl_init("https://pokeapi.co/api/v2/pokemon/".$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);
        $resultado = json_decode($resultado, true);
        curl_close($ch);

        $datosPokemon['pok_nombre'] = $resultado['forms'][0]['name'];
        $datosPokemon['pok_id'] = $resultado['id'];
        $datosPokemon['tipo_nombre'] = $resultado['types'][0]['type']['name'];
        $datosPokemon['pok_imagen'] = $resultado['sprites']['front_default'];
        
        return $datosPokemon;
    }

    private function _getPokemonsFromDB($id)
    {
        $resultadoConsulta = $this->conection->query('SELECT pokemons.nombre AS pok_nombre,
        pokemons.descripcion AS pok_descrip,
        tipos.nombre AS tipo_nombre,
        pokemons.url_imagen AS pok_imagen,
        pokemons.id_pokemon AS pok_id FROM pokemons, tipos WHERE pokemons.tipo = tipos.id_tipo')->fetchAll();

        return $resultadoConsulta[$id];
    }

    /* Delete note by id */
    public function deletePokemon($id)
    {
        return $this->conection->query('DELETE from pokemons WHERE pokemons.id_pokemon = ' . $id);
    }

    public function insertPokemon($params_pokemon)
    {
        //return $this->manejador_conexion->query('INSERT INTO pokemons ('.$params_pokemon['poke_nombre'].', '.$param_pokemon['poke_tipo'].', '.$params_pokemon['poke_url'].', '.$params_pokemon['poke_desc']);
        $consulta = $this->conection->prepare('INSERT INTO pokemons (nombre, tipo, url_imagen, descripcion) VALUES (:poke_nombre, :poke_tipo, :poke_img, :poke_desc)');
        return $consulta->execute(array(
            'poke_nombre' => $params_pokemon['poke_nombre'],
            'poke_tipo' => $params_pokemon['poke_tipo'],
            'poke_img' => $params_pokemon['poke_img'],
            'poke_desc' => $params_pokemon['poke_desc'],
        ));
    }
}
