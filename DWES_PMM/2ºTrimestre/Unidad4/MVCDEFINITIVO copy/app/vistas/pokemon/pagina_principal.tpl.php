<?php include_once('./app/vistas/inc/header.tpl.php');?>


<!-- pagina principal, añadir botones para cargar bbdd o api -->
<img class="imgPokemon" src="./public/img/PokemonLogo.png" alt="Pokemon">

<a href="./?controlador=pokemon&metodo=listar&source=api"><input class="botons2" type="submit" name="api" id="api" value="API"></a>
<a href="./?controlador=pokemon&metodo=listar"><input class="botons2" type="submit" name="bbdd" id="bbdd" value="BBDD"></a>
<a href="./?controlador=restapi&metodo=procesar&path=pokemons"><input class="botons2" type="submit" name="apirest" id="apirest" value="API REST ALL POKEMONS"></a>
<a href='./?controlador=restapi&metodo=procesar&path=pokemon/1'><input class="botons2" type="submit" name="apirest" id="apirest" value="API REST POKEMON ID"></a>


<?php include_once('./app/vistas/inc/footer.tpl.php');?>