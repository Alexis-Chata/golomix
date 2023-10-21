@extends('adminlte::page')

@section('title', 'Tomador de Pedidos')

@section('content_header')
<h1>Clientes {{isset($rutaDelDia)?"Ruta ".$clientes[0]->crut ." - ". $clientes[0]->tdes:""}}</h1>
<br>
@stop

@section('content')
<div class="container">
    <div class="row">
        @forelse($clientes as $key => $cliente)
        <div class="col-md-6">
            <div class="info-box">
                <div class="info-box-content">
                    <span class="info-box-number">#{{ $cliente->ccli }} - {{ $cliente->tcli }}</span>
                    <span class="info-box-text">
                        <ul class="m-0 pl-4">
                            <li>{{ $cliente->crut }} - {{ $cliente->tdes }}</li>
                        </ul>
                    </span>
                    <span class="info-box-text">{{ $cliente->tdir }}</span>
                </div>
                <span class="info-box-icon bg-info">
                    <i class="fas fa-address-card"></i>
                </span>
            </div>
        </div>
        @empty
        @endforelse
    </div>
</div>
@stop

@section('css')
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
