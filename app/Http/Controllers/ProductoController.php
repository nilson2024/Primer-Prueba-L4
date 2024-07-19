<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('productosIndex') ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    
     public function create()
     {
         return view('productoNuevo');
     }

     public function store(Request $request)
    {
    // Validar todo
    $request->validate([
        'nombre' => 'required|max:50',
        'precio' => 'required|numeric',
        'precio_venta' => 'required|numeric',
        'categoria_id' => 'required'
    ]);

    // Crear un nuevo producto
    $productoNuevo = new Producto();
    
    // Asignar valores
    $productoNuevo->nombre = $request->input('nombre');
    $productoNuevo->precio = $request->input('precio');
    $productoNuevo->precio_venta = $request->input('precio_venta');
    $productoNuevo->categoria_id = $request->input('categoria_id');
    
    // Guardar
    try {
        if ($productoNuevo->save()) {
            return redirect()->route('productos.index')->with('mensaje', 'El producto se creó con éxito');
        } else {
            return redirect()->route('productos.index')->with('mensaje', 'Error, el producto no se pudo crear');
        }
    } catch (\Exception $e) {
        // Capturar la excepción y mostrar el mensaje de error
        return redirect()->route('productos.index')->with('mensaje', 'Error: ' . $e->getMessage());
    }
    }

 
     /**
      * Store a newly created resource in storage.
      */
     /*****public function store(Request $request)
     {
         //dd($request);
         //VALIDAR TODO
         $request->validate([
            'nombre' => 'required|max:50',
            //'email' => 'required|email|max:50',
            //'contrasenia' => 'required||min:6',
            'precio' => 'required',
            'precio_venta' => 'required',
            //'price' => 'decimal:2,4'
            ]);
 
         //CREAR UN NUEVO PRODUCTO
         $productoNuevo = new Producto();
         
         //ASIGNAMOS VALORES
         $productoNuevo->nombre = $request->input('nombre');
         $productoNuevo->precio = $request->input('precio');
         $productoNuevo->precio_venta = $request->input('precio_venta');
         //$usuario->password = Hash::make($request->input('password'));
         
         //GUARDAMOS
        if ($productoNuevo->save()) {
            return redirect()->route('productos.Index')->with('mensaje', 'El producto Se creo con exito');
 
        } else {
            return redirect()->route('productos.Index')->with('mensaje', 'Error, El producto no se pudo crear');
        }
        
     }*****/
 
     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $producto = Producto::findOrFail($id);
        return view('productoIndividual')->with('producto', $producto);
    }
 
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
     {
         //buscar el ususario a editar
         $producto = Producto::findOrFail($id);
         
         //Mostrar el formulario con datos existentes
         return view('productoNuevo')->with('producto', $producto);
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update($id, Request $request)
     {
         //Validar
         /**$request->validate([
             'nombre' => 'required',
             'precio' => 'required',
             'precio_venta' => 'required',
         ]);
         */
 
         //buscar el producto
         $producto = Producto::findOrFail($id);
 
         //hacer cambios
         $producto->nombre = $request->input('nombre');
         $producto->precio = $request->input('precio');
         $producto->precio_venta = $request->input('precio_venta');
         
         //guardar cambios
         $actualizado = $producto->save();
 
         //redirigir
         if ($actualizado) {
             return redirect()->route('productos.index') ->with('mensaje', 'El producto '. $producto ->nombre.' Se edito con exito');
 
         } else {
             return redirect ->back();
         }
 
         
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('mensaje', 'Al producto '. $producto ->nombre.' se le dio chicharron correctamente');
     }

}

