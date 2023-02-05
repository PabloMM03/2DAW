<?php include_once('./app/vistas/inc/header.tpl.php'); ?>
<img class="imgPokemon" src="./public/img/PokemonLogo.png" alt="Pokemon">
<a href="./"><input class="botons2" type="submit" name="vol" id="vol" value="INICIO"></a>

<?php////////////////////////////////////////////////////////API///////////////////////////////////////////////////////////////////////////////?>
<?php if(isset($params['source'])&& ($params['source'] == 'api')){
    ?>
    <div class="container">
        <div class="card">
            <div class="inner-card">
                <div class="header">
                    <div class="title">
                        <p><?php echo ucwords($datos['nombre']); ?><span class="sub">LV</span><span class="level-number">12</span></p>
                    </div>
                    
                    <div class="hp">
                    
                        <p><span class="sub">HP</span><span class="life">60</span></p>        
                        <img src="./public/img/electric_energy.png" alt="electric">
                    </div>
                </div>

                <div class="image">
                <a href="./?controlador=pokemon&source=api&metodo=ver&id=<?php echo $datos['id_pokemon']; ?>">
                    <img src="<?php echo $datos['url_imagen']; ?>" alt="neutral"></a>
                    <?php  echo ucwords($datos['tipo']); ?>
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
                        <?php echo ucwords($datos['nombre']);?> does 10 damage to itself
                        
                        <!-- Pikachu does 10 damage to itself. -->
                    </p>
                </div>
                
                <div class="text">
                    <div class="separator"></div>
                    <p> 
                    <?php echo $datos['descripcion']; ?>
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
    <a href="./?controlador=pokemon&metodo=listar&source=api"><input class="botons2"  type="submit" name="volver" id="voilver" value="Volver Atrás"></a>
    
<?php
}else{
////////////////////////////////////////////////////////BBDD///////////////////////////////////////////////////////////////////////////////
    ?>
    <div class="container">
        <div class="card">
            <div class="inner-card">
                <div class="header">
                    <div class="title">
                        <p><?php echo ucwords($datos['nombre']); ?><span class="sub">LV</span><span class="level-number">12</span></p>
                    </div>
                    
                    <div class="hp">
                    
                        <p><span class="sub">HP</span><span class="life">60</span></p>        
                        <img src="./public/img/electric_energy.png" alt="electric">
                    </div>
                </div>

                <div class="image">
                <a href="./?controlador=pokemon&metodo=ver&id=<?php echo $datos['id_pokemon']; ?>">
                    <img src="<?php echo $datos['url_imagen']; ?>" alt="neutral"></a>
                    <?php  echo ucwords($datos['tipo']); ?>
                </div>
                
                <div class="skill-container">
                <a href="./?controlador=pokemon&metodo=eliminar&id=<?php echo $datos['id_pokemon']; ?>">
                    <input class="botons2"  type="submit" name="eliminar" id="eliminar" value="X"></a>
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
                        <?php echo ucwords($datos['nombre']);?> does 10 damage to itself
                        
                        <!-- Pikachu does 10 damage to itself. -->
                    </p>
                </div>
                
                <div class="text">
                    <div class="separator"></div>
                    <p> 
                    <?php echo $datos['descripcion']; ?>
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
<a href="./?controlador=pokemon&metodo=listar"><input class="botons2"  type="submit" name="volver" id="voilver" value="Volver Atrás"></a>

<?php
}
?>

<?php include_once('./app/vistas/inc/footer.tpl.php'); ?>