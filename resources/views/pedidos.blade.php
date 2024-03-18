<x-app-layout>

    @if (request()->routeIs('allpedidos') || request()->routeIs('pedidos'))
        @push('title')
            <title>Pedidos {{ isset($cven) ? (isset($com36s->first()->tven) ? ' - ' . $cven . ' - ' . $com36s->first()->tven : $cven) : 'Todos' }}</title>
        @endpush

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(isset($cven) ? 'Pedidos ' . (isset($com36s->first()->tven) ? ' - ' . $cven . ' - ' . $com36s->first()->tven : $cven) : 'Todos los Pedidos') }}
            </h2>
        </x-slot>
    @endif

    @if (request()->routeIs('planillaCarga'))
        @push('title')
            <title>Planilla de Carga {{ isset($ccon) ? (isset($com36s->first()->ccon) ? ' - ' . $ccon . ' - ' . $com36s->first()->com05s->tnom : $ccon) : 'Todos' }}</title>
        @endpush

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(isset($ccon) ? 'Planilla de Carga ' . (isset($com36s->first()->ccon) ? ' - ' . $ccon . ' - ' . $com36s->first()->com05s->tnom : $ccon) : 'Planilla de Carga Todos') }}
            </h2>
        </x-slot>
    @endif

    <div class="py-12">
        <div class="lg:px-8 max-w-7xl mx-auto sm:px-6">
            <div id="pedidos" class="p-2 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                {{-- @dd($com36s->sortBy('cven')->groupBy(['cven', 'tven', 'crut'])) --}}
                {{-- @dd($pedidosAgrupados); --}}
                <div class="p-2">
                    {{ 'Total de vendedores: ' . $pedidosAgrupados->count() . ' - Fecha: ' . $fmov }}
                    {{-- @if (request()->routeIs('planillaCarga')) --}}
                        <br />
                        {{ 'Importe Total de Venta: S/.' . number_format($com36s->sum('qimpvta'), 2) }}
                    {{-- @endif --}}
                </div>
                @foreach ($pedidosAgrupados as $cvend => $tvens)
                    <details open>
                        <summary>{{ $cvend . ' ' }}
                            @foreach ($tvens as $tven => $cruts)
                                {{ $tven }}
                        </summary>
                        @foreach ($cruts as $crut => $pedidos)
                            <details style="background: #d9d9be;">
                                <summary>
                                    {{ $pedidos->first()->com30s->crut }}<strong>{{ ' ' . $pedidos->first()->com30s->tdes }}</strong>{{ ' - (#Clientes / #Pedidos) : (' . $pedidos->groupBy(['ccli'])->count() . ' / ' . $pedidos->count() . ')' }}<strong>{{ ' Monto: S/. ' . number_format($pedidos->sum('qimpvta'), 2, '.', ',') . ' ' }}</strong>
                                    @if ($pedidos->whereNull('ccon')->count())
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        {{ $pedidos->whereNull('ccon')->count() }}
                                    @else
                                        <i class="fa-sharp fa-solid fa-circle-check"></i>
                                    @endif
                                </summary>
                                <div>
                                    @foreach ($pedidos as $key => $pedido)
                                        <details>
                                            <summary>
                                                {{ $pedido->ccli . ' ' }}<strong>{{ $pedido->tnomrep }}</strong>{{ ' - Total: S/. ' . number_format($pedido->qimpvta, 2, '.', ',') . ' ( ' . $pedido->ctip . ' )' . ' ' }}
                                                @if ($pedido->ccon)
                                                    <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                @else
                                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                                @endif
                                            </summary>
                                            <div>
                                                <ul class="li p-30">
                                                    <p>{{ utf8_decode($pedido->tdir) }}</p>
                                                </ul>
                                                @foreach ($pedido->com37s as $item)
                                                    <ul class="li p-30">
                                                        <p>{{ $item->ccodart . ' | ' }}</p>
                                                        <p class="w-320">{{ $item->tdes }}</p>{{ ' | ' }}<p class="w-50  text-end">
                                                            <strong>{{ number_format($item->qcanped, 2, '.', ',') }}</strong>
                                                        </p>
                                                        {{ ' | ' }}<p class="w-50 text-end">
                                                            {{ number_format($item->qpreuni, 2, '.', ',') }}</p>
                                                        {{ ' | ' }}<p class="w-70 text-end">
                                                            <strong>{{ number_format($item->qimp, 2, '.', ',') }}</strong>
                                                        </p>
                                                    </ul>
                                                @endforeach
                                                <ul class="li p-30">
                                                    <p class="text-end" style="width: 76.31px"></p>
                                                    <p class="w-320"></p>{{ ' | ' }}<p class="w-50  text-end"></p>
                                                    {{ ' | ' }}<p class="w-50 text-end"><strong>TOTAL: </strong></p>
                                                    {{ ' | ' }}<p class="w-70 text-end">
                                                        <strong>{{ 'S/. ' . number_format($pedido->qimpvta, 2, '.', ',') }}</strong>
                                                    </p>
                                                </ul>
                                        </details>
                                    @endforeach
                                </div>
                            </details>
                        @endforeach
                @endforeach
                </details>
                @endforeach
                <br />

                <div class="p-2">
                    @if (request()->routeIs('planillaCarga'))
                        <br />
                        Importe Total de Carga: S/.{{ $com37s != [] ? number_format($com37s->sum('importe'), 2) : number_format(0, 2) }}
                    @endif
                    <br />
                </div>

                <table id="example" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Cod</th>
                            <th>Producto</th>
                            <th style="text-align: center;">bultos</th>
                            <th style="text-align: center;">Unidads</th>
                            @hasanyrole('Super-Admin')
                                <th>Importe</th>
                            @endhasanyrole
                            <th>Marca</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($com37s as $key => $com37)
                            <tr>
                                <td>{{ substr($key, -3) }}</td>
                                <td>{{ $com37->first()->tdes }}</td>
                                <td class="text-center">{{ $com37->totalqcanpedbultos }}</td>
                                <td class="text-center">{{ $com37->totalqcanpedunidads }}</td>
                                @hasanyrole('Super-Admin')
                                    <td class="text-end" style="padding-right: 1.4rem;">{{ number_format($com37->importe, 2) }}</td>
                                @endhasanyrole
                                <td>{{ $com37->marcacod }} - {{ $com37->marca }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cod</th>
                            <th>Producto</th>
                            <th style="text-align: center;">bultos</th>
                            <th style="text-align: center;">Unidads</th>
                            @hasanyrole('Super-Admin')
                                <th>Importe</th>
                            @endhasanyrole
                            <th>Marca</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @push('estiloscss')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <style>
            div#pedidos details {
                background: #e5e7eb;
                padding: .5rem;
                border-radius: 6px;
                margin: .5rem;
            }

            div#pedidos summary {
                cursor: pointer;
                list-style: none;
            }

            div#pedidos summary::before {
                content: '+';
                padding-right: 1rem;
            }

            div#pedidos details [opren] summary::before {
                content: '-';
            }

            div#pedidos div {
                font-size: 14px;
            }

            div#pedidos .w-320 {
                width: 270px;
            }

            div#pedidos .w-50 {
                width: 50px;
            }

            div#pedidos .w-70 {
                width: 70px;
            }

            div#pedidos p {
                display: inline-block;
                margin: 0px;
            }

            div#pedidos .text-end {
                text-align: end;
            }

            div#pedidos .p-30 {
                padding-left: 30px;
            }

            div#pedidos #example_wrapper {
                padding: 15px;
                padding-top: 30px;
                padding-bottom: 30px;
            }

            div#example_wrapper select {
                padding-right: 2.5rem;
            }
        </style>
    @endpush

    @push('javascriptjs')
        <script src="https://kit.fontawesome.com/1f2290df6f.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script defer>
            $(document).ready(function() {

                @php
                    $nro = 4;
                @endphp
                @hasanyrole('Super-Admin')
                    @php
                        $nro = 5;
                    @endphp
                @endhasanyrole

                $('#example').DataTable({
                    responsive: true,
                    order: [
                        [{{ $nro }}, 'asc'],
                        [0, 'asc']
                    ],
                    iDisplayLength: 25,
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    }
                });

                window.onload = function() {
                    setTimeout(() => {
                        document.querySelector('#example_filter input').focus();
                    }, 500);
                };

            });
        </script>
    @endpush

</x-app-layout>
