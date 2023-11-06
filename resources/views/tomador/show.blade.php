@extends('adminlte::page')

@section('title', 'Tomador de Pedidos')

@section('content_header')
    <h1>Cliente {{ isset($rutaDelDia) ? 'Ruta ' . $clientes[0]->crut . ' - ' . $clientes[0]->tdes : '' }}</h1>
@stop

@section('content')
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pedido</button>
                <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Cliente</button>
            </div>
        </nav>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...Pedido</div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                ...Cliente
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> <strong> #{{ $com31->com07s->ccli }} - {{ $com31->com07s->tcli }} </strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="pl-3 mb-0">
                            <li><strong>Ruta: </strong>{{ $com31->com30s->crut }} - {{ $com31->com30s->tdes }}</li>
                            <li><strong>Direc.: </strong>{{ $com31->com07s->tdir }}</li>
                            <li><strong>{{ isset($com31->com07s->cruc) ? 'RUC: ' : 'DNI: ' }}</strong> {{ $com31->com07s->cruc ?? $com31->com07s->le }}</li>
                            <li><strong>Vend.: </strong>{{ $com31->com30s->com10s->tven }}</li>
                            <li><strong>Lista P.: </strong>{{ $com31->com07s->clistpr }}</li>
                            <br>
                        </ul>
                        @if (isset($com31->com07s->cruc))
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="001" checked>
                                <label class="form-check-label" for="inlineRadio1">001-Factura</label>
                            </div>
                        @else
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="002" checked>
                                <label class="form-check-label" for="inlineRadio2">002-Boleta</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="003">
                                <label class="form-check-label" for="inlineRadio3">003-Nota Pedido</label>
                            </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@stop

@section('css')
    {{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop
