<?php

/** La siguiente función debe generar el código HTML de la cesta, y su formulario asociado
 * Ten presente los ámbitos de las variables y los modificadores que puedes utilizar para cambiarlo
 */
function getBasketMarkup(&$carrito, $productos)
{

  $basket_markup = '<div class="rd-navbar-basket-wrap">';
  $basket_markup .= '<button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline">';
  $basket_markup .= '<span>'.$carrito['productos_totales'].'</span>';

  // Si no hay productos en la cesta, no aparecerá el desplegable de cesta
  if($carrito['productos_totales'] != 0){
  $basket_markup .= '<form action="./index.php" method="post">';
  $basket_markup .= '<div class="cart-inline">';
  $basket_markup .= '<div class="cart-inline-header">';
  $basket_markup .= '<h5 class="cart-inline-title">In cart:<span> '.$carrito['productos_totales'].'</span> Products</h5>';
  $basket_markup .= '<h6 class="cart-inline-title">Total price:<span> '.$carrito['precioCarrito'].'</span></h6></div>';



 //Si el valor es cero, no se mostrará en el desplegable
  // he creado un foreach dentro para mostrar los precios y miniatura del interior
  foreach($carrito['cesta'] as $clave => $valor) {
    if ($valor != 0) {
      foreach ($productos as $producto) {
        if ($producto['nombre'] == $clave) {
          $imagenProducto = $producto['img_miniatura'];
          $precioProducto = $producto['precio'];
        }
      }
      $basket_markup .= '<div class="cart-inline-body"><div class="cart-inline-item">
      <div class="unit align-items-center">';
      $basket_markup .= '<div class="unit-left"><img src="'.$imagenProducto.'" alt="" width="108" height="100"/></div>
    <div class="unit-body">';
    $basket_markup .= '<h6 class="cart-inline-name">'.$clave.'</h6>';
    $basket_markup .= '<div>
    <div class="group-xs group-inline-middle">
    <div class="table-cart-stepper">
    <input class="form-input" type="number" data-zeros="true" value="'.$valor.'" min="0" max="1000" name="cantidad['.$clave.']">';
    $basket_markup .= '</div>
    <h6 class="cart-inline-title">$'.$precioProducto.'</h6>
    </div>
    </div>
    </div>
    </div>
    </div>';
  }
}
  $basket_markup .= '</div>
  <div class="cart-inline-footer">
  <div class="group-sm">
  <a class="button button-md button-default-outline-2 button-wapasha" href="./cart.php">
  Go to cart</a><input style="background-color: #3c6a36;" type="submit" class="button button-md button-primary button-pipaluk" value="update" name="update_cart_button"></div>
  </div>
  </div>
  </form>
  </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>4</span></a>';

}

  //Ejemplo del HTML generado: ( no tiene por qué coincidir exactamente con el presente en la plantilla HTML )
  /*  
 <!-- RD Navbar Basket-->
                    <div class="rd-navbar-basket-wrap">
                    <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>4</span></button>
                    <form action="./index.php" method="post">
                    <div class="cart-inline">
                    <div class="cart-inline-header">
        <h5 class="cart-inline-title">In cart:<span> 4</span> Products</h5>
        <h6 class="cart-inline-title">Total price:<span> $109</span></h6>
      </div>
      <div class="cart-inline-body"><div class="cart-inline-item">
          <div class="unit align-items-center">
            <div class="unit-left"><img src="./images/product-mini-5-108x100.png" alt="" width="108" height="100"/></div>
            <div class="unit-body">
              <h6 class="cart-inline-name">Avocados</h6>
              <div>
                <div class="group-xs group-inline-middle">
                  <div class="table-cart-stepper">
                    <input class="form-input" type="number" data-zeros="true" value="1" min="0" max="1000" name="cantidad[0]">
                  </div>
                  <h6 class="cart-inline-title">$28</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="cart-inline-item">
          <div class="unit align-items-center">
            <div class="unit-left"><img src="./images/product-mini-6-108x100.png" alt="" width="108" height="100"/></div>
            <div class="unit-body">
              <h6 class="cart-inline-name">Corn</h6>
              <div>
                <div class="group-xs group-inline-middle">
                  <div class="table-cart-stepper">
                    <input class="form-input" type="number" data-zeros="true" value="3" min="0" max="1000" name="cantidad[1]">
                  </div>
                  <h6 class="cart-inline-title">$81</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
      <div class="cart-inline-footer">
        <div class="group-sm">
        <a class="button button-md button-default-outline-2 button-wapasha" href="./cart.php">
        Go to cart</a><input style="background-color: #3c6a36;" type="submit" class="button button-md button-primary button-pipaluk" value="update" name="update_cart_button"></div>
      </div>
    </div>
    </form>
  </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>4</span></a>
*/
  return $basket_markup;
}

/** La siguiente función debe generar el código HTML de los productos, con sus botones de 'add to cart' cesta
 * Ten presente los ámbitos de las variables y los modificadores que puedes utilizar para cambiarlo
 */

//Meto los datos necesarios en el HTML mediante el foreach
function getProductosMarkup($productos)
{
  $productos_markup = '<div class="col-md-5 col-lg-6"><form method="post" action="./index.php">
      <div class="row row-30 justify-content-center">';

      foreach ($productos as $producto) {
        $productos_markup .= '<div class="col-sm-6 col-md-12 col-lg-6">
        <div class="oh-desktop"';
        $productos_markup .= '<article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
        <div class="unit flex-row flex-lg-column">
          <div class="unit-left">';
        $productos_markup .= '<div class="product-figure">';
        $productos_markup .= '<img src="'.$producto['img_url'].'" alt="" width="270" height="280"/>';
        $productos_markup .= '<div class="product-button"><!--<a class="button button-md button-white button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-md button-white button-ujarak" value="Add to cart" name="add_to_cart['.$producto['nombre'].']"></div>
        </div>
      </div>';
        $productos_markup .= '<div class="unit-body">';
        $productos_markup .= '<h6 class="product-title"><a href="#">'.$producto['nombre'].'</a></h6>';
        $productos_markup .= '<div class="product-price-wrap">';
        $productos_markup .= '<div class="product-price">$'.$producto['precio'].'</div>';
        $productos_markup .= '</div><!--<a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-sm button-secondary button-ujarak" value="Add to cart" name="add_to_cart['.$producto['nombre'].']" >
        </div>
      </div>
    </article>
  </div>
</div>';
      }

  /*<div class="col-md-5 col-lg-6"><form method="post" action="./index.php">
      <div class="row row-30 justify-content-center"><div class="col-sm-6 col-md-12 col-lg-6">
      <div class="oh-desktop">
        <!-- Product-->
        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
          <div class="unit flex-row flex-lg-column">
            <div class="unit-left">
              <div class="product-figure"><img src="./images/product-5-270x280.png" alt="" width="270" height="280"/>
              <div class="product-button"><!--<a class="button button-md button-white button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-md button-white button-ujarak" value="Add to cart" name="add_to_cart[0][1]" ></div>
            </div>
          </div>
          <div class="unit-body">
            <h6 class="product-title"><a href="#">Avocados</a></h6>
            <div class="product-price-wrap">
              <div class="product-price">$28.00</div>
            </div><!--<a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-sm button-secondary button-ujarak" value="Add to cart" name="add_to_cart[0][2]" >
          </div>
        </div>
      </article>
    </div>
  </div><div class="col-sm-6 col-md-12 col-lg-6">
      <div class="oh-desktop">
        <!-- Product-->
        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
          <div class="unit flex-row flex-lg-column">
            <div class="unit-left">
              <div class="product-figure"><img src="./images/product-6-270x280.png" alt="" width="270" height="280"/>
              <div class="product-button"><!--<a class="button button-md button-white button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-md button-white button-ujarak" value="Add to cart" name="add_to_cart[1][1]" ></div>
            </div>
          </div>
          <div class="unit-body">
            <h6 class="product-title"><a href="#">Corn</a></h6>
            <div class="product-price-wrap">
              <div class="product-price">$27.00</div>
            </div><!--<a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-sm button-secondary button-ujarak" value="Add to cart" name="add_to_cart[1][2]" >
          </div>
        </div>
      </article>
    </div>
  </div><div class="col-sm-6 col-md-12 col-lg-6">
      <div class="oh-desktop">
        <!-- Product-->
        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
          <div class="unit flex-row flex-lg-column">
            <div class="unit-left">
              <div class="product-figure"><img src="./images/product-7-270x280.png" alt="" width="270" height="280"/>
              <div class="product-button"><!--<a class="button button-md button-white button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-md button-white button-ujarak" value="Add to cart" name="add_to_cart[2][1]" ></div>
            </div>
          </div>
          <div class="unit-body">
            <h6 class="product-title"><a href="#">Artichokes</a></h6>
            <div class="product-price-wrap">
              <div class="product-price">$23.00</div>
            </div><!--<a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-sm button-secondary button-ujarak" value="Add to cart" name="add_to_cart[2][2]" >
          </div>
        </div>
      </article>
    </div>
  </div><div class="col-sm-6 col-md-12 col-lg-6">
      <div class="oh-desktop">
        <!-- Product-->
        <article class="product product-2 box-ordered-item wow slideInRight" data-wow-delay="0s">
          <div class="unit flex-row flex-lg-column">
            <div class="unit-left">
              <div class="product-figure"><img src="./images/product-8-270x280.png" alt="" width="270" height="280"/>
              <div class="product-button"><!--<a class="button button-md button-white button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-md button-white button-ujarak" value="Add to cart" name="add_to_cart[3][1]" ></div>
            </div>
          </div>
          <div class="unit-body">
            <h6 class="product-title"><a href="#">Broccoli</a></h6>
            <div class="product-price-wrap">
              <div class="product-price">$25.00</div>
            </div><!--<a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>--><input type="submit" class="button button-sm button-secondary button-ujarak" value="Add to cart" name="add_to_cart[3][2]" >
          </div>
        </div>
      </article>
    </div>
  </div></div>
    </form></div> */
  return $productos_markup;
}