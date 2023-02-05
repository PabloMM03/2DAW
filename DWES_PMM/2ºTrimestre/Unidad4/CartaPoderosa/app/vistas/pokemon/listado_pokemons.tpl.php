<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
<img class="imgPokemon" src="./public/img/PokemonLogo.png" alt="Pokemon">

 <a href="./"><input class="botons2" type="submit" name="vol" id="vol" value="INICIO"></a>
 <div id="pokemons">
    <!-- ////////////////////////////////////FORMULARIO MOSTRAR POKEMONS/////////////////////////////////////// -->
 <?php if((isset($params['source'])&&($params['source']=='api'))){?>
<form class="formCant" action="./?controlador=pokemon&metodo=listar&source=api" method="POST">
            <fieldset>
                <h2>¿Cuantos Pokemons quieres mostrar?</h2>
            <input class="in2" type="text" name="cantPok"  placeholder="10" required ><br>
            </fieldset>
        <input class="botons2" type="submit" name="enviar"  value="Enviar">
        
    </form>

<!-- ////////////////////////////////////API/////////////////////////////////////// -->
<div class="container2">
<?php foreach($datos as $pokemon => $datos_pokemon): ?> 
    <div class="container">
        <div class="card">
            <div class="inner-card">
                <div class="header">
                    <div class="title">
                        <p><?php echo ucwords($datos_pokemon['nombre']); ?><span class="sub">LV</span><span class="level-number">12</span></p>
                    </div>
                    
                    <div class="hp">
                    
                        <p><span class="sub">HP</span><span class="life">60</span></p>        
                        <img src="./public/img/electric_energy.png" alt="electric">
                    </div>
                </div>

                <div class="image">
                <a href="./?controlador=pokemon&source=api&metodo=ver&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <img src="<?php echo $datos_pokemon['url_imagen']; ?>" alt="neutral"></a>
                    <?php  echo ucwords($datos_pokemon['tipo']); ?>
                </div>
                
                <div class="skill-container">
                <a href="./?controlador=pokemon&source=api&metodo=addPokemonToBD&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <input class="botons2" type="submit" name="añadirABD" id="añadirABD" value="Añadir"></a>
                    <div class="skill">
                        <div class="energy">
                        <img src="./public/img/neutral_energy.png" alt="neutral">
                        </div>
                        <div class="skill-name">
                            <p>Attack</p>
                        </div>
                        <div class="skill-cost">
                            <p>10+</p>
                        </div>
                    </div>
                    <p class="skill_text">
                        Flip a coin. If heads, this attack does 10 damage plus 10 more damage.
                    </p>
                </div>

                <div class="skill-container">
                    <div class="skill">
                        <div class="energy">
                            <img src="./public/img/electric_energy.png" alt="electric">
                            <img src="./public/img/neutral_energy.png" alt="neutral">
                            <img src="./public/img/neutral_energy.png" alt="neutral">
                        </div>
                        <div class="skill-name">
                            <p>Volt Tackle</p>
                        </div>
                        <div class="skill-cost">
                            <p>50</p>
                        </div>
                    </div>
                    <p class="skill_text">
                        <?php echo ucwords($datos_pokemon['nombre']);?> does 10 damage to itself
                        
                        <!-- Pikachu does 10 damage to itself. -->
                    </p>
                </div>
                
                <div class="text">
                    <div class="separator"></div>
                    <p> 
                       If it looses crackling power from the electric pouches on its <br />
                        cheeks, it is being wary. 
                    </p>
                </div>

                <div class="footer">
                    <div class="weakness costs">
                        <p>weakness</p>
                        <div class="cost-row">
                            <img src="./public/img/fight_energy.png" alt="fight">                           
                            <p> +10</p>
                        </div>
                    </div>
                    <div class="resistance costs">
                        <p>resistance</p>
                        <div class="cost-row">
                            <img src="./public/img/metalic_energy.png" alt="metalic">                           
                            <p> -10</p>
                        </div>             
                    </div>
                    <div class="retreat costs">
                        <p>retreat cost</p>
                        <div class="cost-row">
                            <img src="./public/img/neutral_energy.png" alt="neutral">                           
                        </div>
                    </div>
                </div>

                <div class="information">
                    <div class="manufacturer">
                        <p>2008 Pokémon/Nintendo</p>
                    </div>
                    <div class="collector-number">
                        <p>70/100</p>          
                    </div>
                </div>                   
            </div>

        </div>
    </div>
    <?php endforeach; ?>
</div>  
</div>
<button id="pag" class="botons2">Next</button>
<a href="./"><input class="botons2" type="submit" name="vol" id="vol" value="INICIO"></a>
<?php
}else {
?>
<!-- ////////////////////////////////////BASE DE DATOS/////////////////////////////////////// -->
    <a href="./?controlador=pokemon&metodo=addPokemon"><input class="botons2" type="submit" name="añadir" id="añadir" value="Añadir Pokemon"></a>
    <div class="container2">
        <?php foreach($datos as $pokemon => $datos_pokemon): ?> 
 <div class="container">
        <div class="card">
            <div class="inner-card">
                <div class="header">
                    <div class="title">
                        <p><?php echo ucwords($datos_pokemon['nombre']); ?><span class="sub">LV</span><span class="level-number">12</span></p>
                    </div>
                    
                    <div class="hp">
                    
                        <p><span class="sub">HP</span><span class="life">60</span></p>        
                        <img src="./public/img/electric_energy.png" alt="electric">
                    </div>
                </div>

                <div class="image">
                <a href="./?controlador=pokemon&metodo=ver&id=<?php echo $datos_pokemon['id_pokemon']; ?>">
                    <img src="<?php echo $datos_pokemon['url_imagen']; ?>" alt="neutral"></a>
                    <?php  echo ucwords($datos_pokemon['tipo']); ?>
                </div>
                
                <div class="skill-container">
                    <div class="skill">
                        <div class="energy">
                        <img src="./public/img/neutral_energy.png" alt="neutral">
                        </div>
                        <div class="skill-name">
                            <p>Attack</p>
                        </div>
                        <div class="skill-cost">
                            <p>10+</p>
                        </div>
                    </div>
                    <p class="skill_text">
                        Flip a coin. If heads, this attack does 10 damage plus 10 more damage.
                    </p>
                </div>

                <div class="skill-container">
                    <div class="skill">
                        <div class="energy">
                            <img src="./public/img/electric_energy.png" alt="electric">
                            <img src="./public/img/neutral_energy.png" alt="neutral">
                            <img src="./public/img/neutral_energy.png" alt="neutral">
                        </div>
                        <div class="skill-name">
                            <p>Volt Tackle</p>
                        </div>
                        <div class="skill-cost">
                            <p>50</p>
                        </div>
                    </div>
                    <p class="skill_text">
                        <?php echo ucwords($datos_pokemon['nombre']);?> does 10 damage to itself
                        
                        <!-- Pikachu does 10 damage to itself. -->
                    </p>
                </div>
                
                <div class="text">
                    <div class="separator"></div>
                    <p> 
                       If it looses crackling power from the electric pouches on its <br />
                        cheeks, it is being wary. 
                    </p>
                </div>

                <div class="footer">
                    <div class="weakness costs">
                        <p>weakness</p>
                        <div class="cost-row">
                            <img src="./public/img/fight_energy.png" alt="fight">                           
                            <p> +10</p>
                        </div>
                    </div>
                    <div class="resistance costs">
                        <p>resistance</p>
                        <div class="cost-row">
                            <img src="./public/img/metalic_energy.png" alt="metalic">                           
                            <p> -10</p>
                        </div>             
                    </div>
                    <div class="retreat costs">
                        <p>retreat cost</p>
                        <div class="cost-row">
                            <img src="./public/img/neutral_energy.png" alt="neutral">                           
                        </div>
                    </div>
                </div>

                <div class="information">
                    <div class="manufacturer">
                        <p>2008 Pokémon/Nintendo</p>
                    </div>
                    <div class="collector-number">
                        <p>70/100</p>          
                    </div>
                </div>                   
            </div>

        </div>
    </div>
    <?php endforeach; ?>
</div>     
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
                                let divv = document.getElementById("pokemons");
                                divv.innerHTML += xhttp.response;
                                
                        }
                };
                setTimeout(() => {
                        xhttp.open("GET", "./?controlador=pokemon&source=api&metodo=consultarPokemons", true);
                        xhttp.send();
                }, 1000);

        }, false);
</script>
<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>