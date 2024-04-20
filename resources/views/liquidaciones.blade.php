@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>liquidaciones</h1>
@stop

@section('plugins.Datatables', true)
@section('plugins.Datatables-Plugins', true)

@section('content')

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">liquidaciones</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="badge badge-primary">Todos</span>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped table-hover" id="liquidacion">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cantidad Pedidos</th>
                        <th scope="col">Monto Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($liquidaciones as $liquidacion)
                        <tr>
                            <th scope="row">{{ $liquidacion->femi }}</th>
                            <td>{{ $liquidacion->cantidad_pedidos }}</td>
                            <td>{{ number_format($liquidacion->importe_ventas, 2) }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer">
            The footer of the card
        </div> --}}
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

@stop

@section('js')
    <script>
        $('#liquidacion').DataTable({
            "columnDefs": [{
                "type": "num",
                "targets": 0
            }],
            order: [
                [0, 'desc']
            ],
            responsive: true,
            autoWidth: false,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            "pagingType": "numbers",
        });
    </script>
@stop
