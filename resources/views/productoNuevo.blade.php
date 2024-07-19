@extends('plantillas.plantilla')
@section('titulo', 'Crear productos')
@section('contenido')
<!-Formulario

<h1>Crear nuevo producto</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($producto)? route('productos.update', ['id'=>$producto->id]) : route('productos.store') }}" method="post">
    @csrf
    @if(isset($producto))
        @method('put')
    @endif
    <div class="form-group">
        <label for="nombre">Nombre del producto</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{  isset($producto)? $producto->nombre : old('nombre') }}">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" placeholder="0.00" value="{{  isset($producto)? $producto->precio : old('precio') }}">
    </div>
    <div class="form-group">
        <label for="precio_venta">Precio de venta</label>
        <input type="number" class="form-control" id="precio_venta" name="precio_venta" placeholder="0.00" value="{{  isset($producto)? $producto->precio_venta : old('precio_venta') }}">
    </div>
    <div class="form-group">
        <label for="categoria_id">Categoria id</label>
        <input type="number" class="form-control" id="categoria_id" name="categoria_id" placeholder="0" value="{{  isset($producto)? $producto->categoria_id : old('categoria_id') }}">
    </div>
    <input type="submit" value="Guardar" class="btn btn-primary">
    <input type="reset" value="Limpiar" class="btn btn-danger">

    <!-Para Actualizar contrasenia
    @if(!isset($producto))
    ("Formulario de contrasenia")
    @endif
</form>

@endsection