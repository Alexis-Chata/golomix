<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Precio {{ $precioMayorista ? 'Mayorista' : 'Bodega' }}</title>
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
    <style>
        body {
            padding: 1.5rem;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            border-width: 2px;
            border-style: outset;
            border-color: #95b3d7;
        }

        tbody tr:nth-child(odd) {
            background: #dce6f1;
        }

        td {
            border-top: 2px solid #95b3d7;
            border-bottom: 2px solid #95b3d7;
        }

        thead, tfoot{
            background: #4f81bd;
        }

        .m-1 {
            padding: 5px;
        }

        table {
            font-size: 11px;
        }
        html{
            margin: 10px
        }
    </style>
</head>

<body>
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
                    <td>{{ $com01->tcor }}</td>
                    @if ($precioMayorista)
                        <td style="text-align: end;">
                            {{ 'S/. ' . number_format($com01->qprecio2, 2) }}</td>
                    @else
                        <td style="text-align: end;">
                            {{ 'S/. ' . number_format($com01->qprecio, 2) }}</td>
                    @endif
                    <td style="text-align: center;">{{ $com01->cc04 }} -
                        {{ $marcas->where('ccod', $com01->cc04)->first()->tdes }}</td>
                    <td style="text-align: center;">{{ $com01->qfaccon }}</td>
                    @if ($precioMayorista)
                        <td style="text-align: center;">
                            {{ 'S/. ' . number_format($com01->qprecio2 / $com01->qfaccon, 2) }}</td>
                    @else
                        <td style="text-align: center;">
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
