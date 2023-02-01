<?php
  session_start();
  
  
  require_once('./productos.php');
  require_once('./funciones.php');

  //Aquí puedes inicializar, si procede, la variable de sesión de la cesta
  //La estructura de la cesta puede ser simplemente un array cuyas claves se correspondan a los identificadores de 
  //los productos y cuyo valor sea el número de unidades de ese producto en la cesta
  //Puedes sacar el resto de la información cruzando la información de la cesta con el array producto 
  
  if (!isset($_SESSION['cesta']) || empty($_SESSION['cesta'])) {
    $_SESSION['cesta'] = array();
    foreach($productos as $producto) {
      $_SESSION['cesta'][''.$producto['nombre'].''] = 0;
    }
    $_SESSION['totalProductos'] = 0;
    $_SESSION['totalPrecioCarro'] = 0;
  }

  //Aquí puedes gestionar los post. Hay varias funcionalidades en la página (dos formularios): incluir en cesta, subir un 
  //determinado producto en una unidad y bajar un determinado producto de la cesta en una unidad. La manera de sacar los
  // productos de la cesta es poner a 0 el número de unidades que hay en la cesta
  
  if(isset($_POST['add_to_cart']) && !empty($_POST['add_to_cart'])){
    foreach($_POST['add_to_cart'] as $clave =>$valor){
      $_SESSION['cesta'][$clave]++;
      $_SESSION['productos_totales'] ++;
      foreach($productos as $producto){
        if($producto['nombre'] == $clave){
          $_SESSION['totalPreciocarrito'] += $producto['precio'];
        }
      }
    }
  }


  $the_basket = getBasketMarkup($_SESSION,$productos);
  $the_products = getProductosMarkup($productos);
  include('./home.tpl.php'); 
?>
