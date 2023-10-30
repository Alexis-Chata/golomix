@extends('adminlte::page')

@section('title', 'Tomador de Pedidos')

@section('content_header')
<h1>Cliente {{isset($rutaDelDia)?"Ruta ".$clientes[0]->crut ." - ". $clientes[0]->tdes:""}}</h1>
@stop

@section('content')
<div class="container">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"> <strong> #{{ $com31->com07s->ccli }} - {{ $com31->com07s->tcli }} </strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="pl-3 mb-0">
                <li>{{ $com31->com30s->crut }} - {{ $com31->com30s->tdes }}</li>
                <li>{{ $com31->com07s->tdir }}</li>
                <li> <strong>{{ isset($com31->com07s->cruc)? "RUC: " : "DNI: " }}</strong> {{ $com31->com07s->cruc??$com31->com07s->le }}</li>
                <li><strong>Vendedor: </strong>{{ $com31->com30s->com10s->tven }}</li>
            </ul>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
