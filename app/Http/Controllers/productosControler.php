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
    public function index(Request $request)
    { 
         if ($request->ajax()){

            $tablaprod = productos::with('categoria')->get(); 
            $codcategoria = productos::codcategoria();  

           
            $data = ["tablaprod"=> $tablaprod,"codcategoria"=> $codcategoria]; 
            return response()->json($data,200);
            
        } 
        return view('productos.index',compact('tablaprod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                if ($request->ajax()) 
        { 
            $producto = new productos();
            $producto->codigo = $request->input('codigo');
            $producto->categoria = $request->input('categoria');
            $producto->nombre = $request->input('nombre');
            $producto->precio_ini = $request->input('precio_ini');
            $producto->Porcentaje = $request->input('Porcentaje');
            $producto->precio_final = $request->input('precio_ini')*$request->input('Porcentaje')/100+$request->input('precio_ini');
            $producto->cantidades = $request->input('cantidades');
            $producto->total_cantidades = $request->input('cantidades');
            $producto->salidas_cantidades = '0'; 
            $producto->imagenprod = $request->input('imagenprod');
            $producto->slug_pro = Str::of($request->input('codigo'));
            $producto->save(); 
            return response()->json([
                "message"=>"Producto creado",
                "producto"=>$producto
            ],200);
        }

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeproductosrequest $request, productos $producto)
    {
        if ($request->ajax()) 
        {


            $comparar = Str::of($request->input('nombre'))->slug('-');
            if ($comparar == $producto->slug_pro || !productos::where('slug_pro', $comparar)->exists()) 
            {

            if ($request->hasfile('imagenprod')) {

            $imagen = $request->file('imagenprod');
            $nombreimg = time().$imagen->getClientOriginalName();
            $imagen->move(public_path().'/imagenes/',$nombreimg);

            }

                $producto->slug_pro = $comparar;

                $producto->codigo = $request->input('codigo');
                $producto->categoria = $request->input('categoria');
                $producto->nombre = $request->input('nombre');
                $producto->precio_ini = $request->input('precio_ini');
                $producto->Porcentaje = $request->input('Porcentaje');
                $producto->precio_final = $request->input('precio_final');
                $producto->cantidades = $request->input('cantidades');
                $producto->imagenprod = $nombreimg;

                $producto->save();
                $productos = productos::with('categoria')->where('productos.slug_pro', $producto->slug_pro)->first();
                return response()->json(["message"=>"productos editado","slug_pro"=>$producto->slug_pro,"productos"=>$productos],200);
            }
            else
            {
                $validateData = $request->validate(['nombre'=> 'unique:productos']);
            }
        }
  
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
