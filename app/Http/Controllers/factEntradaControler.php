<?php

namespace App\Http\Controllers;
use App\entradafactura;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class factEntradaControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){

            $proveedors = entradafactura::with('proveedor')->get();  

            $codprove = entradafactura::codprove(); 
            $data = ["codprove"=> $codprove,"proveedors"=> $proveedors]; 
            return response()->json($data,200);
        }


        return view('entradafactura.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $proveedor = proveedor::all(); 

        return view('entradafactura.crearentradafactura',compact('proveedor'));
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
            $entradafactura = new entradafactura();
            $entradafactura->codigo = $request->input('codigo');
            $entradafactura->proveedor = $request->input('proveedor');
            $entradafactura->total = '0';
            $entradafactura->slug_entradafactura = Str::of($request->input('codigo'));
            $entradafactura->save(); 
            return response()->json([
                "message"=>"Producto creado",
                "entradafactura"=>$entradafactura
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
