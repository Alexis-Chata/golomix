<x-app-layout>
    @push('title')
        <title>Pedidos x Transporte</title>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Distribucion de Carga') }}
        </h2>
    </x-slot>

    @push('estiloscss')
        <script src="https://kit.fontawesome.com/1f2290df6f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <style>

            div {
                font-size: 14px;
            }

            table.dataTable tbody td {
                padding: 4px 10px;
            }

            div#example_wrapper select {
                padding-right: 2.5rem;
            }

            div#example_wrapper {
                padding: 15px;
                padding-bottom: 30px;
            }
        </style>
    @endpush

    <div class="py-12">
        <div class="lg:px-8 max-w-7xl mx-auto sm:px-6">
            <div id='productos_pdf' class="p-2 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                {{-- @dd($com36s->sortBy('cven')->groupBy(['cven', 'tven', 'crut'])) --}}
                {{-- @dd($pedidosAgrupados); --}}
                {{ ' - Fecha: ' . $fmov }}
                <table id="example" class="display" style="width:100%; font-size:9px">
                    <thead>
                        <tr>
                            <th>Consesionario</th>
                            <th>Rutas</th>
                            <th>Vendedor</th>
                            <th style="text-align: center;">Nro Clientes</th>
                            <th style="text-align: center;">Total Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidosAgrupados as $indice => $consesionarios)
                            <tr style="font-weight: bold;">
                                <td colspan=3 style="padding-top: 12px">{{ $indice ? $indice . ' - ' . $com05->where('ccon', $indice)->first()->tnom : 'Pendientes por Programar' }}</td>
                                {{-- <td></td>
                                <td></td> --}}
                                <td style="padding-top: 12px; text-align: center;">{{ $com36s->where('ccon', $indice)->unique('ccli')->count() }}</td>
                                <td style="padding-top: 12px; text-align: end;">{{ number_format($com36s->where('ccon', $indice)->sum('qimpvta'), 2, '.', ',') }}</td>
                            </tr>
                            @foreach ($consesionarios as $crut => $rutas)
                            <tr class="">
                                <td>{{ $indice }}</td>
                                    @foreach ($rutas as $trut => $vendedores)
                                        @foreach ($vendedores as $cven => $vendedor)
                                            @foreach ($vendedor as $tven => $pedidos)
                                                <td>{{ $crut . ' - ' . $trut }}</td>
                                                <td>{{ $cven . ' - ' . $tven }}</td>
                                                <td style="text-align: center;">{{ $pedidos->groupBy(['ccli'])->count() }}</td>
                                                <td style="text-align: end;">{{ number_format($pedidos->sum('qimpvta'), 2, '.', ',') }}</td>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Consesionario</th>
                            <th>Rutas</th>
                            <th>Vendedor</th>
                            <th style="text-align: center;">Nro Clientes</th>
                            <th style="text-align: center;">Total Importe</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

    @push('javascriptjs')
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {

                $('#example').DataTable({
                    iDisplayLength: -1,
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    }
                });

                window.onload = function() {
                    document.querySelector('#example_filter input').focus();
                };

            });
        </script>
    @endpush

</x-app-layout>
