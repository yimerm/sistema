<?php

namespace App\Http\Controllers;
use App\caregorias; 
use App\productos;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\storeproductosrequest;
class productosControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tablaprod = productos::with('categorianom')->paginate(3);
        return view('productos.index',compact('tablaprod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = caregorias::all();
        return view('productos.crearProducto',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeproductosrequest $request)
    {
         $producto = new productos();
          $imagenprod = 'productos.png';
        if ($request->hasfile('imagenprod')) {

            $imagen = $request->file('imagenprod');
            $imagenprod = time().$imagen->getClientOriginalName();
            $imagen->move(public_path().'/imagenes/',$imagenprod);
           
        }

       
        $producto->codigo = $request->input('codigo');
        $producto->categoria = $request->input('categoria');
        $producto->nombre = $request->input('nombre');
        $producto->precio_ini = $request->input('precio_ini');
        $producto->Porcentaje = $request->input('Porcentaje');
        $producto->precio_final = $request->input('precio_ini')*$request->input('Porcentaje')/100+$request->input('precio_ini');
        $producto->cantidades = $request->input('cantidades');
        $producto->total_cantidades = $request->input('cantidades');
        $producto->salidas_cantidades = '0'; 
        $producto->imagenprod = $imagenprod;

        $producto->slug_pro = Str::of($request->input('nombre'))->slug('-');
        $producto->save();
        return redirect()->route('productos.create', [$producto])->with('status','Usuario creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(productos $producto)
    {
        $categorias = caregorias::all();
        return view('productos.editarproduct', compact('producto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productos $producto)
    {
        
        $producto->fill($request->except('imagenprod'));
        if ($request->hasfile('imagenprod')) {

            $imagen = $request->file('imagenprod');
            $imagenprod = time().$imagen->getClientOriginalName();
            $producto->imagenprod = $imagenprod;
            $imagen->move(public_path().'/imagenes/',$imagenprod);
        }
        $producto->slug_pro = $request->input('codigo').$request->input('nombre');
        $producto->save();
        return redirect()->route('productos.edit', [$producto])->with('status','Usuario actualizado');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(productos $producto)
    {
        if ($producto->imagenprod == 'productos.png' ) 
        {
            
            $producto->delete();
            return redirect()->route('productos.index', [$producto])->with('status','Usuario borrado');
        }
        else
        {
            $file_path = public_path().'/imagenes/'.$producto->imagenprod;
            \File::delete($file_path);

            $producto->delete();
            return redirect()->route('productos.index', [$producto])->with('status','Usuario borrado');
        

        }
       
    }
}
