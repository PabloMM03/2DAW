<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
<h1><?php echo $datos['pok_nombre']; ?></h1>

<table>
    <thead>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Descripcion</th>
    </thead>
    <tbody>
        <tr>
            <td><img src=<?php echo $datos['pok_imagen'] ?>></td>
            <td><?php echo $datos['pok_nombre'] ?></td>
            <td><?php echo $datos['tipo_nombre'] ?></td>
            <!-- <td><?php //echo $datos['pok_descrip'] 
                        ?></td> -->
            <td>
                <form class="form" action="./?controlador=controlador_pokemon&metodo=delete" method="POST">
                    <input type="hidden" name="id" value="<?php echo $datos['pok_id']; ?>" />
                    <input type="submit" value="Eliminar" />
                </form>
            </td>
        </tr>
    </tbody>
</table>
<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>