
<div class="fixed top-0 left-0 h-screen w-64 bg-gray-900">
    <h1 style="color:white" class="h5, text-items:center ml-6 mt-4">Categorías</h1>
    <ul class="py-4">
{{--Mostrar Categorias --}}
        @foreach ($categories as $category)

        <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <a style="text-decoration: none" href="{{route('products.category', $category)}}">{{$category->name}}</a>
        </li>

        @endforeach
        

        {{-- <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <a href="#">Perfil</a>
        </li>
        <li class="px-6 py-3 text-gray-400 hover:text-white hover:bg-gray-800">
            <a href="#">Configuración</a>
        </li> --}}
    </ul>
</div>