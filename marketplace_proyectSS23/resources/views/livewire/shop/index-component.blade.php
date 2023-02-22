@section('content')

@section('sidebar')

<div class="fixed top-0 left-0 h-screen w-64 bg-gray-900 overflow-y-auto">

    <ul class="py-4">
        <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <a href="#" style="text-decoration: none">Inicio</a>
        </li>
        <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <a href="#" style="text-decoration: none">Perfil</a>
        </li>
        <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <a href="#" style="text-decoration: none">Configuración</a>
        </li>
    </ul>
</div>
@endsection


<div>
    {{-- Se muestra la tienda con los productos y la informacion --}}
    <div class="container">
    
    <div class="row">
    @foreach ($products as $product)
        
    
    <div class="col-md-4">

        <div class="card">
            <img class="card-img-top" src="{{Storage::url($product->image->url)}}" alt="Card image cap">
            <div class="card-body"> {{--<a href="{{route('publicaciones.show',$product)}}"> --}}
                <h4 class="card-title" style="text-align: center"><a style="text-decoration: none" href="{{route('publicaciones.show',$product)}}"> {{$product->name}}</a></h4>
                <p class="card-text" style="text-align: center">{{$product->description}}</p>
                <h3 class="card-text" >{{$product->price}} €</h3>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" wire:click="add_to_cart({{$product->id}})">Añadir al carrito</button>
            </div>
        </div>

    </div>
    
    @endforeach
</div>

    {{$products->links()}} 

</div>

</div>


