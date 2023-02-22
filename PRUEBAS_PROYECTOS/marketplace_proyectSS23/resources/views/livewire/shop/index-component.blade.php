<div>
    {{-- Se muestra la tienda con los productos y la informacion --}}
    <div class="container">
    
    <div class="row">
    @foreach ($products as $product)
        
    
    <div class="col-md-4">

        <div class="card">
            <img class="card-img-top" src="{{asset('default_product.jpg')}}" alt="Card image cap">
            <div class="card-body"> {{--<a href="{{route('publicaciones.show',$product)}}"> --}}
                <h4 class="card-title"><a href="{{route('publicaciones.show',$product)}}"> {{$product->name}}</a></h4>
                <p class="card-text">{{$product->description}}</p>
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




