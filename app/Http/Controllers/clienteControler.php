<?php

namespace App\Http\Controllers;
use App\clientes; 
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientesRequest;

class clienteControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tablacliente = clientes::paginate(3);
        return view('clientes.index',compact('tablacliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.crearcliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientesRequest $request)
    {
        if ($request->hasfile('imagencliente')) 
        {

            $imagen = $request->file('imagencliente');
            $nombreimg = time().$imagen->getClientOriginalName();
            $imagen->move(public_path().'/imagenes/',$nombreimg);
           
        }
        $cliente = new clientes();
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->celular = $request->input('celular');
        $cliente->direcion = $request->input('direcion');
        $cliente->monto_deuda = $request->input('monto_deuda');
        $cliente->slug_clientes = $request->input('nombre').time();
        $cliente->imagencliente = $nombreimg;
        $cliente->save();
        return redirect()->route('clientes.create', [$cliente])->with('status','Usuario creado');
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
    public function edit(clientes $cliente)
    {
        return view('clientes.editarCliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clientes $cliente)
    {

         $cliente->fill($request->except('imagencliente'));
        if ($request->hasfile('imagencliente')) {
            $imagen = $request->file('imagencliente');
            $nombreimg = time().$imagen->getClientOriginalName();
            $cliente->imagencliente = $nombreimg;
            $imagen->move(public_path().'/imagenes/',$nombreimg);
        }
        $cliente->slug_clientes = $request->input('nombre').time();
        $cliente->save();
        return redirect()->route('clientes.edit', [$cliente])->with('status','Usuario actualizado'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(clientes $cliente)
    {
         $file_path = public_path().'/imagenes/'.$cliente->imagencliente;
        \File::delete($file_path);

        $cliente->delete();
        return redirect()->route('clientes.index', [$cliente])->with('status','Usuario borrado');
    }
}
