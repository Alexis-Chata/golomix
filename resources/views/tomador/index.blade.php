@extends('adminlte::page')

@section('title', 'Index')

@section('content_header')
    <h1>Index</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">#70272 - ESPEJO LIZARASO JOHAN MICHAEL</span>
                        <span class="info-box-number">AV. GRAN CHIMU 876 URB. ZARATE</span>
                    </div>
                    <span class="info-box-icon bg-info">
                        <i class="fas fa-address-card"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
