<?php

/** La siguiente función debe generar el código HTML de la cesta, y su formulario asociado
 * Ten presente los ámbitos de las variables y los modificadores que puedes utilizar para cambiarlo
 */
function getBasketMarkup(&$carro,$productos){
  
  //Ejemplo del HTML generado: ( no tiene por qué coincidir exactamente con el presente en la plantilla HTML )
  //Hay que incluir form
  $basket_markup = '';


    $basket_markup .= '<form action ="./index.php" method="POST">';
    $basket_markup .= '<p><strong>Número de items:</strong>'.$carro['totalProductos'].'</p>';
    $basket_markup .= '<p><strong>Precio total:</strong>$'.$carro['totalPrecioCarro'].'</p>';
    $basket_markup .= '<hr>';
    $basket_markup .= '<div class="cItemContainer">';
  

  foreach($carro['cesta'] as $clave => $valor){
    if($valor !=0){
      foreach($productos as $producto){
        if($producto['nombre'] == $clave){
          $imgProducto = $producto['img_miniatura'];
          $precioProducto = $producto['precio'];

        }
      }
      $basket_markup .= '<div class="cFoto"><img src="'.$imgProducto.'"></div>';
      $basket_markup .= '<div class="cNombreProducto"><h3>'.$clave.'</h3></div>';
      $basket_markup .= '<input type="submit" value="-">'.$valor.'<input type="submit" value="+">';
      $basket_markup .= '<strong>Precio:</strong>$'.$precioProducto.'';
      $basket_markup .= '</div>';
      $basket_markup .= '</form>';
    }
    }
  
  
/*  
 <p><strong>Número de items:</strong> 2</p>
      <p><strong>Precio total:</strong> $800</p>
      <hr>
      <div class="cItemContainer">
        <div class="cFoto"><img src="./images/product-mini-1-108x100.png"></div>
        <div class="cNombreProducto"><h3>Blueberries</h3></div>
        <input type="submit" value="-"> 1 <input type="submit" value="+">
        <strong>Precio:</strong> $550
      </div>

      <div class="cItemContainer">
        <div class="cFoto"><img src="./images/product-mini-2-108x100.png"></div>
        <div class="cNombreProducto"><h3>Avocados</h3></div>
        <input type="submit" value="-"> 1 <input type="submit" value="+">
        <strong>Precio:</strong> $250
      </div>
*/    
    return $basket_markup;
  }

/** La siguiente función debe generar el código HTML de los productos, con sus botones de 'add to cart' cesta
 * Ten presente los ámbitos de las variables y los modificadores que puedes utilizar para cambiarlo
 */
  function getProductosMarkup($productos){
   //Ejemplo del HTML generado: ( no tiene por qué coincidir exactamente con el presente en la plantilla HTML )
   //Hay que incluir form
   $productos_markup = '';

   $productos_markup .= '<form action="./index.php" method="POST">';

    foreach($productos as $producto){
      $productos_markup .= '<div class="cProductoContainer"><img src="'.$producto['img_url'].'" alt="" width="270" height="280"';
      $productos_markup .= '</div>';
      $productos_markup .= '<input type="submit" value="Incluir en cesta" name="add_to_cart">';
      $productos_markup .= '<h4>'.$producto['nombre'].'</h4>';
      $productos_markup .= '<p><strong> $'.$producto['precio'].'</strong></p>';
      $productos_markup .= '</div>';
      $productos_markup .= '</form>';

    }
   
    /*<!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Avocados</h4>
        <p><strong>$ 28.00</strong></p>
      </div>
      <!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Corn</h4>
        <p><strong>$ 27.00</strong></p>
      </div>
      <!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Artichokes</h4>
        <p><strong>$ 23.00</strong></p>
      </div>
      <!-- Producto-->          
      <div class="cProductoContainer"><img src="./images/product-5-270x280.png" alt="" width="270" height="280">
        <input type="submit" value="Incluir en cesta">
        <h4>Broccoli</h4>
        <p><strong>$ 25.00</strong></p>
      </div>*/
    return $productos_markup;
  }