@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

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
            <table class="table table-striped table-hover table-responsive-sm table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Nombre Usuario</th>
                        <th scope="col">ip</th>
                        <th scope="col">Url</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Permisos</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->descripcion }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->ip }}</td>
                            <td>{{ $user->url }}</td>
                            <td>{{ $user->roles_names }}</td>
                            <td>{{ $user->permisos_names }}</td>
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
        console.log('Hi!');
    </script>
@stop