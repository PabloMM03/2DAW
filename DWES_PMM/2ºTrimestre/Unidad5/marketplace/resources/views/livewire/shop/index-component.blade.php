<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="row">

    @foreach ($products as $product)
        
        <div class="col-md-4">

            <div class="card">
                <img class="card-img-top" src="{{asset('default_product.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$product->name}}</h4>
                    <p class="card-text">{{$product->description}}</p>
                </div>
                <div class="card-body">
                    <a href="#" class="card-link">Añadir al carrito</a>
                </div>
            </div>

        </div>

    @endforeach
</div>
</div>
