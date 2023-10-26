@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('plugins.Datatables', true)
@section('plugins.Datatables-Plugins', true)

@section('content')

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Bitacora</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <span class="badge badge-primary">Todos</span>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped table-hover" id="bitacora">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Nombre Usuario</th>
                        <th scope="col">ip</th>
                        <th scope="col">Url</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Permisos</th>
                        <th scope="col">Fecha Hora</th>
                        <th scope="col">Time Transcurrido</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bitacoras as $bitacora)
                        <tr>
                            <th scope="row">{{ $bitacora->id }}</th>
                            <td>{{ $bitacora->descripcion }}</td>
                            <td>{{ $bitacora->user_name }}</td>
                            <td>{{ $bitacora->ip }}</td>
                            <td>{{ $bitacora->url }}</td>
                            <td>{{ $bitacora->roles_names }}</td>
                            <td>{{ $bitacora->permisos_names }}</td>
                            <td>{{ $bitacora->created_at }}</td>
                            <td>{{ $bitacora->created_at->diffForHumans() }}</td>
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
        $('#bitacora').DataTable({
            order: [[0, 'desc']],
            responsive: true,
            autoWidth: false,
            "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    }
        });
    </script>
@stop
