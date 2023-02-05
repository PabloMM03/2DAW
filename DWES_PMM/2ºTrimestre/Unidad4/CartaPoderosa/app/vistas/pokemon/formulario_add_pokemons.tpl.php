<?php include_once('./app/vistas/inc/header.tpl.php');?>
<img class="imgPokemon" src="./public/img/pngaaa.com-14399.png" alt="Pokemon">
<img class="imgPokemon2" src="./public/img/pngaaa.com-11592.png" alt="Pokemon2">

<div id="cuadro">

    <form action="./?controlador=pokemon&metodo=addPokemon" method="POST">

    <h2>Formulario de Creacion</h2>
<div id="espacios">

    <p><label for="poke_nombre">Nombre</label> <input class="texto" id="poke_nombre" type="text" name="poke_nombre" required placeholder=" Pikachu"></p>
    <p><label for="poke_desc">Descripción</label> <input class="texto" id="poke_desc" type="text" name="poke_desc" required placeholder=" Todopoderoso Pickachu"></p>
    <p><label for="poke_img">Imagen</label> <input class="texto" id="poke_img" type="url" name="poke_img" required placeholder=" Url"></p>
<div id="tipos">
    
    <p><strong>Tipos</strong></p>
    <?php foreach($datos['tipos'] as $tipo):?>
    
    <p><label for="poke_tipo[<?php echo $tipo['id_tipo']; ?>]"><?php echo ucwords($tipo['nombre']) ;?></label> 
    <input class="check" type="checkbox" name="poke_tipo[<?php echo $tipo['id_tipo']; ?>]" id="poke_tipo[<?php echo $tipo['id_tipo']; ?>]"></p>
    <?php endforeach; ?>
</div>
    <input class="botons" type="submit" name="add_pokemon" value="Enviar"> 
    
</div>
   
    </form>
     
</div>

    <a href="./?controlador=pokemon&metodo=listar"><input class="botons2" type="submit" name="vol" id="vol" value="Volver"></a>

<?php include_once('./app/vistas/inc/footer.tpl.php');?>