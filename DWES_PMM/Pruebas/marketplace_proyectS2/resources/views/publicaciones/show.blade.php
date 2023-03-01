 @extends('layouts.app')

 @section('content')

 @section('sidebar')

 @livewire('nav-panel-left')

@endsection

@section('content')
    <div class="container" py-8>

        <h1 class="text 4xl font-bold ">{{$product->name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {!!$product->description!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido Principal --}}
            <div class="lg:col-span-2">
                <figure> 
                    @if ($product->image)
    <img class="w-full h-72 object-cover object-center" src="{{Storage::url($product->image->url)}}" alt="">
        
    @else
    <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/03/23/18/56/beach-7087722_1280.jpg" alt="">
    
    @endif
                </figure>
                <div class="text-2xl text-gray-500 mt-4">
                    {{$product->price}} €
                </div>
                <div class="card-body mt-2">
                    <button type="button" class="btn btn-primary" wire:click="add_to_cart({{$product->id}})">Añadir al carrito</button>
                </div>
            </div>
            {{-- Contenido relacionado --}}

            <aside>

                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$product->category->name}}</h1>
                <ul>
                    @foreach ($relacionados as $relacionado)
                        <li class="mb-4">
                            <a style="text-decoration: none" class="flex" href="{{route('publicaciones.show', $relacionado)}}">
                                @if ($relacionado->image)
                                <img class="w-40 h-25 object-cover object-center" src="{{Storage::url($relacionado->image->url)}}" alt="">
                                @else
                                    <img class="w-40 h-25 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/03/23/18/56/beach-7087722_1280.jpg" alt="">
                                @endif
                                <span class="ml-2 text-gray-600">{{$relacionado->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    

    </div>

@endsection
    
