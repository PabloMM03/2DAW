 @extends('layouts.app')

 @section('content')

 @section('sidebar')

 @livewire('nav-panel-left')

@endsection

@section('content')
    <div class="container" py-8>

        <h1 class="text 4xl font-bold ">{{$product->name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {{$product->description}}
        </div>

        <div class="grid grid-cols-3">
            {{-- Contenido Principal --}}
            <div class="col-span-2">
                <figure>
                    
                    <img src="{{Storage::url($product->image->url)}}" alt="">
                  
                    
                </figure>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" wire:click="add_to_cart({{$product->id}})">Añadir al carrito</button>
                </div>
            </div>
            {{-- Contenido relacionado --}}

            <aside>


            </aside>

        </div>
    

    </div>

@endsection
    
