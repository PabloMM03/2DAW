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
 
  // Verificar si se ha enviado el formulario de agregar a la cesta
if (isset($_POST['add_to_cart']) && !empty($_POST['add_to_cart'])) {
  // Recorrer los productos seleccionados
  foreach ($_POST['add_to_cart'] as $clave => $valor) {
    // Incrementar el número de unidades del producto en la cesta
    $_SESSION['cesta'][$clave] ++;
    $_SESSION['productos_totales'] ++;
    // Obtener el precio del producto y agregarlo al precio total del carrito
    foreach ($productos as $producto) {
      if ($producto['nombre'] == $clave) {
        $_SESSION['precioCarrito'] += $producto['precio'];
      }
    }
  }
}


  // Verificar si se ha enviado el formulario de actualizar la cesta
if (isset($_POST['update_cart_button']) && !empty($_POST['cesta'])) {
  // Recorrer los productos en la cesta
  foreach ($_POST['cesta'] as $clave => $valor) {
    // Actualizar el número de unidades del producto en la cesta
    if ($valor == 0) {
      // Si el número de unidades es cero, eliminar el producto de la cesta
      unset($_SESSION['cesta'][$clave]);
    } else {
      // Si el número de unidades es distinto de cero, actualizar el valor
      $_SESSION['cesta'][$clave] = $valor;
    }
  }
}

  
  $the_basket = getBasketMarkup($_SESSION,$productos);
  $the_products = getProductosMarkup($productos);
  include('./home.tpl.php'); 

/**
 * La primera línea verifica si el botón "add_to_cart" fue enviado y que no está vacío. 
 * Si es así, se inicia un bucle foreach para iterar a través del array $_POST['add_to_cart'] que contiene los nombres de los productos seleccionados y la cantidad de cada uno.
 * Dentro del bucle, se utiliza el nombre del producto como clave para el array $_SESSION['cesta'], que almacenará la cantidad de cada producto en el carrito de compras. 
 * El valor de $_SESSION['cesta'][$clave] se incrementa en uno en cada iteración del bucle.
 * También se utiliza $_SESSION['productos_totales'] para llevar un registro del número total de productos en el carrito. Este valor se incrementa en uno en cada iteración del bucle.
 * Dentro del segundo bucle foreach, se busca el precio del producto correspondiente al nombre almacenado en la clave $clave en el array $productos. Si se encuentra el producto, 
 * el precio se agrega a la variable $_SESSION['precioCarrito'], que lleva un registro del precio total del carrito.
 * 
 */



?>
