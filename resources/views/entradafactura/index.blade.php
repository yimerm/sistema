@extends('layouts.app')
@section('title','Inventario')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page">Inventario</li>
@endsection
@section('content')
 
<tablaproducto-component></tablaproducto-component>
<formulario-component></formulario-component>


@endsection