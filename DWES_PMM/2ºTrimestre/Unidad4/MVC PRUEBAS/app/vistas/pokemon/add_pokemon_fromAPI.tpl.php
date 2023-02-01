<?php include_once('./app/vistas/inc/header.tpl.php');?>

<div id="cuadro">

    <form action="./?controlador=pokemon&metodo=addPokemon" method="POST">
<div id="espacios">

    <p><label for="tipo">Nombre Pokemon:</label> <input type="text" name="nombre" id="nombre" required placeholder="Charmander"></p>

    <p><label for="descripcion">Descripcion Pokemon:</label><br> <input type="text" name="descripcion" id="descripcion" placeholder="A.K.A Lanzallamas"></p>

    <p><label for="url_imagen">Imagen Pokemon:</label><br> <input type="url" name="url_imagen" id="url_imagen" required placeholder="Url"></p>

<div id="tipos">
    <p><strong>Tipos</strong></p>
    <?php foreach($datos['tipos'] as $tipo):?>

    <p><label for="poke_tipo[<?php echo $tipo['id_tipo'];?>]"><?php echo ucwords($tipo['nombre']);?></label> 
    <input class="check" type="checkbox" name="poke_tipo[<?php echo $tipo['id_tipo'];?>" id="poke_tipo['<?php echo $tipo['id_tipo'];?>"> </p>
    
    <?php endforeach; ?>

</div>

    <input class="botons" type="submit" name="add_pokemon" value="Enviar"> 
    
</div>
    </form>

</div>

<?php include_once('./app/vistas/inc/footer.tpl.php');?>