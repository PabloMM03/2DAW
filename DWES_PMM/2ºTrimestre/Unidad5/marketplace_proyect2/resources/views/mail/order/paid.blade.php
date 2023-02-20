<x-mail::message>
# factura 

Gracias pro la compra
Aquí esta su factura

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td scope="row">{{$item->name}}</td>
            <td>{{$item->pivote->quantity}}</td>
            <td>{{$item->pivote->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

Total: {{$order->total}} €

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
