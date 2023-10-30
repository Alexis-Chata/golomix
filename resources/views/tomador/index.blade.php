@extends('adminlte::page')

@section('title', 'Tomador de Pedidos')

@section('content_header')
<h1>Clientes {{isset($rutaDelDia)?"Ruta ".$clientes[0]->crut ." - ". $clientes[0]->tdes:""}}</h1>
<br>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <input class="form-control" type="text" name="buscador" id="buscador" placeholder="Buscar...">
        </div>
        @forelse($clientes as $key => $cliente)
        <div class="col-md-6">
            <a class="info-box no-underline text-body" style="height: calc(100% - 1rem);" href="{{ route('tomador.show', $cliente->ccli) }}">
                <div class="info-box-content">
                    <span class="info-box-number cliente">#{{ $cliente->ccli }} - {{ $cliente->tcli }}</span>
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
            </a>
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
    document.addEventListener("keyup", e=>{
        if(e.target.matches("#buscador")){
            document.querySelectorAll(".cliente").forEach(element => {
                element.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                ? element.parentNode.parentNode.parentNode.classList.remove("d-none")
                : element.parentNode.parentNode.parentNode.classList.add("d-none")
            });
        }
})
</script>
@stop
