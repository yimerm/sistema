<?php

namespace App\Http\Controllers;
use App\caregorias; 
use Illuminate\Http\Request;

class categoriaControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = caregorias::paginate(3);
        return view('categoria.index',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.crearcategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $categoria = new caregorias();
         $categoria->nombre = $request->input('nombre');
         $categoria->slug_categoria = $request->input('nombre').time();
         $categoria->save();
         return redirect()->route('categoria.create', [$categoria])->with('status','Categoria creado');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(caregorias $categoria)
    {
        $categoria = caregorias::find($id); 
        return view('categoria.editarcategoria', compact('categoria'));
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
    public function destroy(caregorias $categoria)
    {
         $categoria->delete();
        return redirect()->route('categoria.index', [$categoria])->with('status','Categoria borrado');
    }
}
