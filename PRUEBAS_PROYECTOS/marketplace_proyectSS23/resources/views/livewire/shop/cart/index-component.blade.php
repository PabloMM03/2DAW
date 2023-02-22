<div>
    {{-- Success is as dangerous as failure. --}}
<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cart_items->sortBy('id') as $key => $item)
            
            <tr>
                <td>{{$item->name}}</td>
                <!--Cantidad de productos, Se llama a una funcion para actualizar el precio segun la cantidad -->
                {{-- <td><input type="number" class="form-control" value="{{$item->quantity}}"></td>  --}}
                <td>{{$item->quantity}}</td> 

                {{-- id="v{{$item->id}}" wire:change="update_quantity({{$item->id}}, $('#v' + {{$item->id}}).val())" 
            class="form-control" value="{{$item->quantity}}"></td>  --}}
                <td>{{\Cart::session(auth()->id())->get($item->id)->getPriceSum()}}</td> <!--Obtenemos el id del producto  y suma el total de los precio -->
                {{-- <td>{{$item->price}}</td> <!--Precio de 1 -->   --}}
                <td>
                    <button type="button" class="btn btn-danger" wire:click="delete_item({{$item->id}})">Eliminar</button>
                </td>
            </tr>

            @endforeach
           
            
        </tbody>
    </table>

    <h3>Total: {{\Cart::session(auth()->id())->getTotal()}} €</h3> <!--Total de el carrito -->

    <a href="{{route('checkout')}}" class="btn btn-primary">Pagar</a>
</div>


</div>
