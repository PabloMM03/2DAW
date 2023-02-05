<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
 <img class="imgPokemon" src="./public/img/PokemonLogo.png" alt="Pokemon">

 <a href="./"><input class="botons2" type="submit" name="vol" id="vol" value="INICIO"></a>
 <table>
    <?php////////////////////////////////////////////////////FORMULARIO CANTIDAD POKEMONS///////////////////////////////////////////////////////?>
    
    <thead>
        <!-- <th>ID</th> -->
        <th>Normal</th>
        <th>Shiny</th>     
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Añadir a BBDD</th>
    </thead>
    
        <br>
    <form class="formCant" action="./?controlador=pokemon&metodo=listar&source=api" method="POST">
            <fieldset>
                <h2>¿Cuantos Pokemons quieres mostrar?</h2>
            <input class="in2" type="text" name="cantPok"  placeholder="10" required ><br>
            </fieldset>
        <input class="botons2" type="submit" name="enviar"  value="Enviar">
        
    </form>
        <?php
        
////////////////////////////////////////////////////////API///////////////////////////////////////////////////////////////////////////////
        ?><tbody>
            <?php foreach($datos as $pokemon => $datos_pokemon): ?> 
                <tr>
                    <!-- <td><?php echo $datos_pokemon['id_pokemon'];?></td>  -->
                    <td><a href="./?controlador=pokemon&source=api&metodo=ver&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <img src="<?php echo $datos_pokemon['url_imagen']; ?>" ></a></td>
                    <td><img src="<?php echo $datos_pokemon['url_imagen_shiny']; ?>" ></td>
                    <td><?php echo ucwords($datos_pokemon['nombre']); ?></td>
                    <td><?php  echo ucwords($datos_pokemon['tipo']); ?></td>
                    <td><a href="./?controlador=pokemon&source=api&metodo=addPokemonToBD&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <input class="botons" type="submit" name="añadirABD" id="añadirABD" value="Añadir"></a></td>
                    <!-- ./?controlador=pokemon&metodo=eliminar&id= -->
                    
                </tr>
            <?php endforeach; ?>
        </tbody><br>
        <!-- <div class="alinear"> -->
        <!-- <a href="./?controlador=pokemon&source=api&metodo=tandaPokemons2"><input class="botons4" type="submit" name="prev" id="pag2" value="Previous"></a>
        <a href="./?controlador=pokemon&source=api&metodo=tandaPokemons"><input class="botons3" type="submit" name="next" id="pag" value="Next"></a> -->
        <!-- </div> -->
        </table>
      

<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>