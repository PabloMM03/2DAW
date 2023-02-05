<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
<img class="imgPokemon" src="./public/img/PokemonLogo.png" alt="Pokemon">

 <a href="./"><input class="botons2" type="submit" name="vol" id="vol" value="INICIO"></a>
 
 <?php if((isset($params['source'])&&($params['source']=='api'))){?>
<form class="formCant" action="./?controlador=pokemon&metodo=listar&source=api" method="POST">
            <fieldset>
                <h2>¿Cuantos Pokemons quieres mostrar?</h2>
            <input class="in2" type="text" name="cantPok"  placeholder="10" required ><br>
            </fieldset>
        <input class="botons2" type="submit" name="enviar"  value="Enviar">
        
    </form>


<?php foreach($datos as $pokemon => $datos_pokemon): ?> 
<div class="background">
        <div class="card-container">

            <div class="card">
                <div class="card-image">
                <a href="./?controlador=pokemon&source=api&metodo=ver&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <img src="<?php echo $datos_pokemon['url_imagen']; ?>" ></a>
                </div>
                <div class="card-text">
                    <h2><i class="fas fa-fire"></i><?php echo ucwords($datos_pokemon['nombre']); ?></h2>
                    <span class="date date-1"><?php  echo ucwords($datos_pokemon['tipo']); ?></span>
                    <p>Personalidad energica y optimista</p>
                </div>
                <div class="card-stats card-1">
                    <div class="stat">
                        <div class="value"><a href="./?controlador=pokemon&source=api&metodo=addPokemonToBD&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <input class="botons" type="submit" name="añadirABD" id="añadirABD" value="Añadir"></a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php endforeach; ?>
    <button id="pag" class="botons2">Next</button>
<?php
}else {
?>
    <a href="./?controlador=pokemon&metodo=addPokemon"><input class="botons2" type="submit" name="añadir" id="añadir" value="Añadir Pokemon"></a>
        <?php foreach($datos as $pokemon => $datos_pokemon): ?> 
            <div class="background">
        <div class="card-container">

            <div class="card">
                <div class="card-image">
                <a href="./?controlador=pokemon&source=api&metodo=ver&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <img src="<?php echo $datos_pokemon['url_imagen']; ?>" ></a>
                </div>
                <div class="card-text">
                    <h2><i class="fas fa-fire"></i><?php echo ucwords($datos_pokemon['nombre']); ?></h2>
                    <span class="date date-1"><?php  echo ucwords($datos_pokemon['tipo']); ?></span>
                    <p>Personalidad energica y optimista</p>
                </div>
                <div class="card-stats card-1">
                    <div class="stat">
                        <div class="value"><a href="./?controlador=pokemon&source=api&metodo=addPokemonToBD&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <input class="botons" type="submit" name="añadirABD" id="añadirABD" value="Añadir"></a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php endforeach; ?>
            
 <?php           
}
?>
<!-- Script ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
        document.querySelector('#pag').addEventListener('click', () => {


                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                let tabla = document.getElementById("pokemons");
                                tabla.innerHTML += xhttp.response;
                                
                        }
                };


                setTimeout(() => {
                        xhttp.open("GET", "./?controlador=pokemon&source=api&metodo=consultarPokemons", true);
                        xhttp.send();
                }, 1000);

        }, false);
</script>
<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>