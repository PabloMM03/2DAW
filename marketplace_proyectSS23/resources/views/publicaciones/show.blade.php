 @extends('layouts.app')

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

            </div>
            {{-- Contenido relacionado --}}

            <aside>


            </aside>

        </div>
    

    </div>

@endsection
    
