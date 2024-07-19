@extends('plantillas.plantilla')
@section('titulo', 'Lista de Productos')
@section('contenido')
    <h1>Lista de productos para un CRUD con Laravel</h1>
    <hr>
    @if(session('mensaje'))
        <div class="alert alert-primary" role="alert">
            {{ session('mensaje')}}
        </div>
    @endif
    <a href="{{ route('productos.create') }}" class="btn btn-primary">CREAR</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Precio de venta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->precio_venta}}</td>
                    <td> 
                        <a class="btn btn-primary" href=" {{ route('producto.mostrar', ['id' => $producto->id]) }}">Ver</a> 
                        <a class="btn btn-warning" href=" {{ route('productos.edit', ['id' => $producto->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square warning" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="5">No hay productos todavia</td>
                </tr>
            @endforelse

        </tbody>

    </table>

    {{ $productos->links('pagination::bootstrap-4') }}

@endsection