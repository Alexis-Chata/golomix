<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos x Transporte</title>
    <script src="https://kit.fontawesome.com/1f2290df6f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        details {
            background: #f2f2f2;
            padding: .5rem;
            border-radius: 6px;
            margin: .5rem;
        }

        summary {
            cursor: pointer;
            list-style: none;
        }

        summary::before {
            content: '+';
            padding-right: 1rem;
        }

        details [opren] summary::before {
            content: '-';
        }

        div {
            font-size: 14px;
        }

        .w-320 {
            width: 270px;
        }

        .w-50 {
            width: 50px;
        }

        .w-70 {
            width: 70px;
        }

        p {
            display: inline-block;
            margin: 0px;
        }

        .text-end {
            text-align: end;
        }

        .p-30 {
            padding-left: 30px;
        }

        table.dataTable tbody td {
            padding: 4px 10px;
        }
    </style>
</head>

<body>
    {{-- @dd($com36s->sortBy('cven')->groupBy(['cven', 'tven', 'crut'])) --}}
    {{-- @dd($pedidosAgrupados); --}}
    {{ ' - Fecha: ' . $fupgr }}
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
                <td colspan=3 style="padding-top: 12px">{{ $indice ? $indice.' - '.$com05->where('ccon', $indice)->first()->tnom : "Pendientes por Programar" }}</td>
                <td style="padding-top: 12px; text-align: center;">{{ $com36s->where('ccon', $indice)->unique('ccli')->count() }}</td>
                <td style="padding-top: 12px; text-align: end;">{{ number_format($com36s->where('ccon', $indice)->sum('qimpvta'), 2, '.', ',') }}</td>
            </tr>
            <tr class="">
                <td rowspan="{{ $consesionarios->count() }}">{{ $indice }}</td>
                @foreach ($consesionarios as $crut => $rutas)
                    @foreach ($rutas as $trut => $vendedores)
                        @foreach ($vendedores as $cven => $vendedor)
                            @foreach ($vendedor as $tven => $pedidos)
                                    <td>{{ $crut . ' - ' . $trut }}</td>
                                    <td>{{ $cven . ' - ' . $tven }}</td>
                                    <td style="text-align: center;">{{ $pedidos->groupBy(['ccli'])->count() }}</td>
                                    <td style="text-align: end;">{{ number_format($pedidos->sum('qimpvta'), 2, '.', ',') }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
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

        });
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M5GTN7JJ32"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-M5GTN7JJ32');
    </script>

</body>

</html>
