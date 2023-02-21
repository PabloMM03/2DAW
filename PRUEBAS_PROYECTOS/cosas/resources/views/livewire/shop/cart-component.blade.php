<div>
    {{-- In work, do what you enjoy. --}}

<!--Se mostrarán el icono del carrito mas los productos que se han añadido, y se actualiza automaticamente -->

<a href="{{route('cart')}}" class="btn btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
        <circle cx="9" cy="21" r="1"/>
        <circle cx="20" cy="21" r="1"/>
        <path d="M1 1h4l2.45 11.7a2 2 0 0 0 2 1.7h10a2 2 0 0 0 2-1.7L23 6H6"/>
      </svg>
</a>
     {{-- {{\Cart::session(auth()->id())->getContent()->count()}} <!--Obtiene el total de productos pero si hay 20 solo se añaden 20, 1 de cada--> --}}
     <!--  Obtiene el total completo-->
<!--Acceder de nuevo a la tienda -->
@auth
{{\Cart::session(auth()->id())->getTotalQuantity()}} 
    
@else
 0

@endauth

    
</div>
