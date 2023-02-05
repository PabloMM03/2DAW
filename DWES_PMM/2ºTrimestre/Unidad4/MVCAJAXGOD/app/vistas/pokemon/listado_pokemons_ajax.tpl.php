<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
 <table>
    <?php////////////////////////////////////////////////////FORMULARIO CANTIDAD POKEMONS///////////////////////////////////////////////////////?>
    <?php if((isset($params['source'])&&($params['source']=='api'))){
        ?>    
<?php////////////////////////////////////////////////////////API///////////////////////////////////////////////////////////////////////////////?>
        <tbody>
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
        </table>
        <!-- <a href="./?controlador=pokemon&source=api&metodo=tandaPokemons"><input class="botons3" type="submit" id="pag" value="Next"></a> -->
        <?php
        
    }else {
//////////////////////////////////////////////////////BBDD/////////////////////////////////////////////////////////////////////////////////
    ?>
   <table>
    <thead>
        <!-- <th>ID</th> -->
        <th>Imagen</th>   
        <th>Nombre</th>
        <th>Tipo</th>
    </thead>
    <?php
    ?><tbody>
    <a href="./?controlador=pokemon&metodo=addPokemon"><input class="botons2" type="submit" name="añadir" id="añadir" value="Añadir Pokemon"></a>
        <?php foreach($datos as $pokemon => $datos_pokemon): ?> 
            <tr>
                <!-- <td><?php echo $datos_pokemon['id_pokemon'];?></td> -->
                <td><a href="./?controlador=pokemon&metodo=ver&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                <img src="<?php echo $datos_pokemon['url_imagen']; ?>" ></a></td>
                <td><?php echo ucwords($datos_pokemon['nombre']); ?></td>
                <td><?php echo ucwords($datos_pokemon['tipo']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody><?php
}  ?>
</table>
<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>