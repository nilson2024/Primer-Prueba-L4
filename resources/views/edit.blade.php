<!-- resources/views/productos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" required>
        </div>
        <div>
            <label for="precio_venta">Precio de Venta:</label>
            <input type="number" name="precio_venta" id="precio_venta" value="{{ $producto->precio_venta }}" required>
        </div>
        <button type="submit">Actualizar Producto</button>
    </form>
@endsection
