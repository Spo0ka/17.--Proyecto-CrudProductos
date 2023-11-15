<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->Middleware('auth');
    }
    public function index()
    {
        // $Producto = Producto::all();
        $Producto = Producto::paginate(5);
        return view('productos.index',['productos' => $Producto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('Productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:30',
            'descripcion' => 'required|min:5|max:100',
            'precio' => ['required','numeric','regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $Producto = Producto::create([
            'nombre' => $request ->nombre,
            'descripcion' => $request ->descripcion,
            'precio' => $request ->precio
        ]);
        session() -> flash('status','Se guardo el producto ',$request ->Producto);
        return to_route('ProductosIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        return view('productos.edit',['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:30',
            'descripcion' => 'required|min:5|max:100',
            'precio' => ['required','numeric','regex:/^\d+(\.\d{1,2})?$/']
        ]);

        $producto = Producto::find($id);

        if($producto){
            $producto -> nombre = $request->input('nombre');
            $producto -> descripcion = $request->input('descripcion');
            $producto -> precio = $request->input('precio');

            $producto->save();
        }
        session() -> flash('status','Se Actualizo el producto ',$request ->Producto);
        return to_route('ProductosIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id); 
        if($producto) 
        { 
            $producto->delete(); 
        } 
        session()->flash('status','El producto se eliminó correctamente');
        return to_route('ProductosIndex');
    }
}
