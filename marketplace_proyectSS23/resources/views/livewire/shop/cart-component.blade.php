<div>
    {{-- In work, do what you enjoy. --}}

<!--Se mostrarán el icono del carrito mas los productos que se han añadido, y se actualiza automaticamente -->

<a href="{{route('cart')}}" class="btn btn-none" >
     <svg xmlns="http://www.w3.org/2000/svg"  width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
        <circle cx="9" cy="21" r="1"/>
        <circle cx="20" cy="21" r="1"/>
        <path d="M1 1h4l2.45 11.7a2 2 0 0 0 2 1.7h10a2 2 0 0 0 2-1.7L23 6H6"/>
      </svg> 

      {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" enable-background="new 0 0 24 24"  class="feather feather-shopping-cart">
        <circle cx="18" cy="20" r="2"></circle>
        <circle cx="10" cy="20" r="2"></circle>
        <path d="M2 2v2h3.2l2.8 12.2c.1.5.5.8 1 .8h10c.5 0 .9-.3 1-.8l2-8c.1-.3 0-.6-.2-.9-.2-.2-.5-.3-.8-.3h-.4l1.3-2.6c.2-.5.1-1-.3-1.3l-3-2c-.3-.1-.6-.1-.9-.1-.3.1-.5.3-.6.5l-2.1 4.3v-1.8c0-.6-.4-1-1-1h-4c-.6 0-1 .4-1 1v3h-1.1l-.9-4.2c-.1-.5-.5-.8-1-.8h-4zm11 3v2h-2v-2h2zm5.4 2h-1.8l1.8-3.5 1.3.9-1.3 2.6zm-10 2h11.3l-1.5 6h-8.4l-1.4-6z"></path>

      </svg>  --}}
      
</a>
 <i style="color:white"> {{\Cart::session(auth()->id())->getTotalQuantity()}}</i> 
     
     {{-- {{\Cart::session(auth()->id())->getContent()->count()}} <!--Obtiene el total de productos pero si hay 20 solo se añaden 20, 1 de cada--> --}}
     <!--  Obtiene el total completo-->
<!--Acceder de nuevo a la tienda -->
@auth
{{\Cart::session(auth()->id())->getTotalQuantity()}} 
    
@else
 0

@endauth

    
</div>
