<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
    <div style="height: 100vh; display:flex; justify-content: center; align-items: center;">
        <form style="margin: auto; width: 220px;" action="./?controlador=controlador_pokemon&metodo=addPokemon" method="POST">
            Introduzca nombre: <input type="text" name="nombre_pokemon"/>
            <br>
            Introduzca tipo: <input type="text" name="tipo_pokemon"/>
            <br>
            Introduzca imagen(link): <input type="text" name="url_imagen"/>
            <br>
            Introduzca descripción: <input type="text" name="descrip_pokemon"/>
            <input type="submit" value="Submit" />
        </form>
    </div>
<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>