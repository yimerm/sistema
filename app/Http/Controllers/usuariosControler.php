<?php

namespace App\Http\Controllers;
use App\Usuarios; 
use Illuminate\Http\Request;
use App\Http\Requests\StoreusuariosRequest;

class usuariosControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tablaUsu = Usuarios::paginate(3);
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
    public function store(StoreusuariosRequest $request)
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
        $user->slug = $request->input('nombre').time();
        $user->imagenusu = $nombreimg;
        $user->save();
        return redirect()->route('user.create', [$user])->with('status','Usuario creado'); 
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
    public function edit(Usuarios $user)
    {   
        return view('user.editar', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $user)
    {
        $user->fill($request->except('imagenusu'));
        if ($request->hasfile('imagenusu')) {

            $imagen = $request->file('imagenusu');
            $nombreimg = time().$imagen->getClientOriginalName();
            $user->imagenusu = $nombreimg;
            $imagen->move(public_path().'/imagenes/',$nombreimg);
        }
        $user->save();
        return redirect()->route('user.edit', [$user])->with('status','Usuario actualizado'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $user)
    {
        $file_path = public_path().'/imagenes/'.$user->imagenusu;
        \File::delete($file_path);

        $user->delete();
        return redirect()->route('user.index', [$user])->with('status','Usuario borrado');
    }
}
