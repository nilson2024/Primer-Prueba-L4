<!-- resources/views/productos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Crear Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" required>
        </div>
        <div>
            <label for="precio_venta">Precio de Ven:</label>
            <input type="number" name="precio_venta" id="precio_venta" required>
        </div>
        <button type="submit">Crear Producto</button>
    </form>
@endsection
