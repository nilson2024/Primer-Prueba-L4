@extends('plantillas.plantilla')

@section('titulo', 'Producto')

@section('contenido')

    <h1>Detalle del producto: {{ $producto->nombre }}</h1>
    <hr>

    <table class="table">
        <thead>
            <th>Campos</th>
            <th>Valor</th>
            
        </thead>
        <tbody>       
            <tr>
                <th scope="row">Nombre</th>
                <td>{{$producto->nombre}}</td>               
            </tr>
            <tr>
                <th scope="row">Precio</th>
                <td>{{$producto->precio}}</td>               
            </tr>
            <tr>
                <th scope="row">Precio de venta</th>
                <td>{{$producto->precio_venta}}</td>               
            </tr>
        </tbody>

    </table>

    <a class="btn btn-danger" href="{{route('productos.index')}}">Volver</a>


@endsection

