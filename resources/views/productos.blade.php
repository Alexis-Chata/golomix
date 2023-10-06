<x-app-layout>

    @push('title')
        <title>Precio {{ $precioMayorista ? 'Mayorista' : 'Bodega' }}</title>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($precioMayorista ? 'Productos Mayorista' : 'Productos Bodega') }}
        </h2>
    </x-slot>

    @push('estiloscss')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <style>
            tr.anulado.even,
            div#productos_pdf tr.anulado.odd {
                background: #ff00005c;
            }

            div#productos_pdf .btn {
                display: inline-block;
                font-weight: 400;
                color: #212529;
                text-align: center;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-color: transparent;
                border: 1px solid transparent;
                padding: .375rem .75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius: .25rem;
                transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            }

            div#productos_pdf .btn-primary {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            }

            div#productos_pdf .m-1 {
                padding: 5px;
            }

            div#productos_pdf .pointer {
                cursor: pointer;
            }

            div#productos_pdf svg {
                width: 18px;
                fill: white;
            }

            div#productos_pdf button {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 5px;
                border-color: #ec4537;
                background-color: #ec4537;
                border-radius: 5px;
            }

            div#productos_pdf a {
                text-decoration: none
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
                <div class="row d-inline-block">
                    <div class="col-xl-12 text-right">
                        <a href="{{ route('ProductosDescargarPdf', [$precioMayorista ? '002' : '001']) }}" class="btn btn-success btn-sm">
                            <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z" />
                                </svg></button>
                        </a>
                    </div>
                </div>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Producto {{ $precioMayorista ? 'Mayorista' : 'Bodega' }}</th>
                            <th style="text-align: center;">Precio Cj</th>
                            <th style="text-align: center;">Marca</th>
                            <th style="text-align: center;">Cant/Cj</th>
                            <th style="text-align: center;">Precio Unidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($com01s as $com01)
                            <tr class="{{ $com01->flagcre == 1 ? 'anulado' : '' }}">
                                <td>{{ $com01->cequiv }}</td>
                                <td style="font-size: 14px;">{{ $com01->tcor }}</td>
                                @if ($precioMayorista)
                                    <td style="text-align: end;padding-right: 3rem;">
                                        {{ 'S/. ' . number_format($com01->qprecio2, 2) }}</td>
                                @else
                                    <td style="text-align: end;padding-right: 3rem;">
                                        {{ 'S/. ' . number_format($com01->qprecio, 2) }}</td>
                                @endif
                                <td style="text-align: center;">{{ $com01->cc04 }} -
                                    {{ $marcas->where('ccod', $com01->cc04)->first()->tdes }}
                                    {{ $com01->tipo_producto_id == 5
                                        ? '-
                                                                                                                                PROMOS'
                                        : '' }}
                                </td>
                                <td style="text-align: center;">{{ $com01->qfaccon }}</td>
                                @if ($precioMayorista)
                                    <td style="text-align: end;padding-right: 3rem;">
                                        {{ 'S/. ' . number_format($com01->qprecio2 / $com01->qfaccon, 2) }}</td>
                                @else
                                    <td style="text-align: end;padding-right: 3rem;">
                                        {{ 'S/. ' . number_format($com01->qprecio / $com01->qfaccon, 2) }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cod</th>
                            <th>Producto {{ $precioMayorista ? 'Mayorista' : 'Bodega' }}</th>
                            <th style="text-align: center;">Precio Cj</th>
                            <th style="text-align: center;">Marca</th>
                            <th style="text-align: center;">Cant/Cj</th>
                            <th style="text-align: center;">Precio Unidad</th>
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
