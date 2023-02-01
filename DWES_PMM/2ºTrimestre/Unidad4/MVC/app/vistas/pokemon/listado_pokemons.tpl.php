<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
<h1>Listado de pokemons</h1>
<table>
    <thead>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Cargar en BBDD</th>
    </thead>
    <tbody>
        <?php foreach ($datos as $clavePokemon => $valorPokemon) : ?>
            <tr>
                <td><img src=<?php echo $valorPokemon['url_imagen'] ?>></td>
                <td><a href="./?controlador=controlador_pokemon&source=api&metodo=ver&id=<?php echo $valorPokemon['id_pok'] ?>"><?php echo $valorPokemon['nombre'] ?></td>
                <td><?php echo $valorPokemon['tipo'] ?></a></td>
                <td>
                    <a href="./?controlador_pokemon&metodo=cargarEnBBDD&source=api&id=<?php echo $valorPokemon['id_pok'] ?>">
                        <button>freeCodeCamp</button>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<form class="form" action="./?controlador=controlador_pokemon&metodo=addPokemon" method="POST">
    <input type="submit" value="Nuevo Pokemon" />
</form>
<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>