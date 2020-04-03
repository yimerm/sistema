<?php

namespace App\Http\Controllers;
use App\Usuarios; 
use Illuminate\Http\Request;

class usuariosControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tablaUsu = Usuarios::all();
        return view('user.index',compact('tablaUsu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('user.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasfile('imagenusu')) {

            $imagen = $request->file('imagenusu');
            $nombreimg = time().$imagen->getClientOriginalName();
            $imagen->move(public_path().'/imagenes/',$nombreimg);
           
        }

        $user = new Usuarios();
        $user->nombre = $request->input('nombre');
        $user->apellidos = $request->input('apellidos');
        $user->celular = $request->input('celular');
        $user->direcion = $request->input('direcion');
        $user->monto_deuda = $request->input('monto_deuda');
        $user->imagenusu = $nombreimg;
        $user->save();
        return 'save';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $Usuarios)
    {  
        //$usuarios = usuarios::find($id); 
        return view('user.editar', compact('Usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

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
