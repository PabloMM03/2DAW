<?php
  session_start();
  
  
  require_once('./productos.php');
  require_once('./funciones.php');

  //Aquí puedes inicializar, si procede, la variable de sesión de la cesta
  //La estructura de la cesta puede ser simplemente un array cuyas claves se correspondan a los identificadores de los productos y cuyo valor sea el número de unidades de ese producto en la cesta
  if (!isset($_SESSION['cesta']) || empty($_SESSION['cesta'])) {
    $_SESSION['cesta'] = array();
    foreach($productos as $producto) {
      $_SESSION['cesta'][''.$producto['nombre'].''] = 0;
    }
    $_SESSION['productos_totales'] = 0;
    $_SESSION['precioCarrito'] = 0;
  }
  //Puedes sacar el resto de la información cruzando la información de la cesta con el array producto 
  

  //Aquí puedes gestionar los post. Hay dos funcionalidades en la página (dos formularios): add_to_cart, y update_cart_button (actualizar unidades). La manera de sacar los productos de la cesta es poner a 0 el número de unidades que hay en la cesta y pulsar "UPDATE"
  if (isset($_POST['add_to_cart']) && !empty($_POST['add_to_cart'])) {
    foreach ($_POST['add_to_cart'] as $clave => $valor) {
      $_SESSION['cesta'][$clave] ++;
      $_SESSION['productos_totales'] ++;
      foreach ($productos as $producto) {
        if ($producto['nombre'] == $clave) {
          $_SESSION['precioCarrito'] += $producto['precio'];
        }
      }
    }
  }
  
  $the_basket = getBasketMarkup($_SESSION,$productos);
  $the_products = getProductosMarkup($productos);
  include('./home.tpl.php'); 
?>
