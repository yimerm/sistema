@extends('layouts.app')
@section('title','Productos')
@section('mis_rutas')
<li class="breadcrumb-item active" aria-current="page">Productos</li>
@endsection
@section('content')
 
<tablaproductos-component></tablaproductos-component>
<modalproducto-component></modalproducto-component>


@endsection