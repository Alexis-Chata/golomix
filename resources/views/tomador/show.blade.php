@extends('adminlte::page')

@section('title', 'Tomador de Pedidos')

@section('content_header')
<h1>Clientes {{isset($rutaDelDia)?"Ruta ".$clientes[0]->crut ." - ". $clientes[0]->tdes:""}}</h1>
<br>
@stop

@section('content')
<div class="container">
    <div class="row">
        {{ $com31->ccli }}
    </div>
</div>
@stop

@section('css')
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
</script>
@stop
