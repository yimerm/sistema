<?php

namespace App\Http\Controllers;
use App\proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProveedorRequest;
class proveedorControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = proveedor::paginate(3);
        return view('proveedor.index',compact('proveedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.crearproveedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProveedorRequest $request)
    {
       
        $proveedor = new proveedor();
        $proveedor->nombre = $request->input('nombre');
        $proveedor->celular = $request->input('celular');
        $proveedor->surtidor = $request->input('surtidor'); 
        $proveedor->slug_proveedor = $request->input('nombre').$request->input('surtidor');
        $proveedor->save();
        return redirect()->route('proveedor.create', [$proveedor])->with('status','Proveedor creado');
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
    public function edit(proveedor $proveedor)
    {
         return view('proveedor.editarproveedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProveedorRequest $request, proveedor $proveedor)
    {
        $proveedor->fill($request->all());
        $proveedor->save();
        return redirect()->route('proveedor.edit', [$proveedor])->with('status','Proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(proveedor $proveedor)
    {
         $proveedor->delete();
        return redirect()->route('proveedor.index', [$proveedor])->with('status','Proveedor borrado');
    }
}
