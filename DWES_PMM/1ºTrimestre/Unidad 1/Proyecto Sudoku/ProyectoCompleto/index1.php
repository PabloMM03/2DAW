<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Sudoku</title>
  </head>

  <body>
  
  <div id="logotipo">
    <img src="https://image.shutterstock.com/image-vector/sudoku-vector-lettering-name-game-260nw-1717953703.jpg" width ="200" height="100"
    alt="">
</div></br>

  <?php    
  /*
  Div con nombre tablas para dar estilo con css.
  y se llama a la funcion creacion para crear un sudoku de cada nivel.
  */
  ?>
 <div class ="tablas">

  <?php include './Sudokus.php'; ?>
  <?php require './GeneraFunci.php'; ?>

  <?php  
  //Llamada a las funciones de cada Nivel creada en Archivo Genera.php
  creacionNivelFacil($arrayFacil, 'NivelFacil');
  creacionNivelMedio($arrayMedio, 'NivelMedio');
  creacionNivelDificil($arrayDificil, 'NivelDificil');
  
  
  ?>
</div>

<?php 
/*
Se crea otro div con nombre Form para dar formato y estilo con css.
Se crea el formulario.
*/
?>
<div class="Form">
  <form method="POST" action ="./index2.php">

  
    <input type="radio" id="facil" name="nivel" value="arrayFacil" checked >
   <label for="fácil">Facil</label>

    <input type="radio" id="medio" name="nivel" value="arrayMedio">
      <label for="medio">Medio</label>

    <input type="radio" id="dificil" name="nivel" value="arrayDificil">
    <label for="dificil">Difícil</label>
    
    <input type="submit" name="elegir" value="Elegir">
    </form>
  </div>
  

  
</body>

</html>