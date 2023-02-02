<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
<img class="imgPokemon" src="./public/img/PokemonLogo.png" alt="Pokemon">
<table>

<?php////////////////////////////////////////////////////////API///////////////////////////////////////////////////////////////////////////////?>
<?php if(isset($params['source'])&& ($params['source'] == 'api')){
    ?>
    <thead>
    <tr>
        <th>Imagen</th>
        <th>Tipo</th>
        <th>Descripcion</th>
    </tr>
</thead>
<tbody>
    
        <h1><?php echo ucwords($datos['nombre']); ?></h1>
            <td><img src="<?php echo $datos['url_imagen'];?>" ></td> 
            <td><?php echo ucwords($datos['nombre']); ?></td>
            <td><?php echo $datos['descripcion']; ?></td>
    </tbody>
    <a href="./?controlador=pokemon&metodo=listar&source=api"><input class="botons2"  type="submit" name="volver" id="voilver" value="Volver Atrás"></a>
    
<?php
}else{
////////////////////////////////////////////////////////BBDD///////////////////////////////////////////////////////////////////////////////
    ?>
    <thead>
    <tr>
        <th>Imagen</th>
        <th>Tipo</th>
        <th>Descripcion</th>
        <th>Eliminar</th>
    </tr>
</thead>
<tbody>
    
    <h1><?php echo ucwords ($datos['nombre']); ?></h1>
        <td><img src="<?php echo $datos['url_imagen'];?>" ></td> 
        <td><?php echo ucwords ($datos['nombre']); ?></td>
        <td><?php echo $datos['descripcion']; ?></td>
        <td><a href="./?controlador=pokemon&metodo=eliminar&id=<?php echo $datos['id_pokemon']; ?>">
    <input class="botons"  type="submit" name="eliminar" id="eliminar" value="X"></a></td>
    
</tbody>
<a href="./?controlador=pokemon&metodo=listar"><input class="botons2"  type="submit" name="volver" id="voilver" value="Volver Atrás"></a>

<?php
}
?>
</table>

<a href="./"><input class="botons2" type="submit" name="vol" id="vol" value="INICIO"></a>
<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>