<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Precio {{ $precioMayorista ? 'Mayorista' : 'Bodega' }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        body{
            padding: 1.5rem;
        }
        tr.anulado.even, tr.anulado.odd{
            background: #ff00005c;
        }
    </style>
</head>
<body>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Cod</th>
                <th>Producto {{ $precioMayorista ? 'Mayorista' : 'Bodega' }}</th>
                <th  style="text-align: center;">Precio Cj</th>
                <th  style="text-align: center;">Marca</th>
                <th  style="text-align: center;">Cant/Cj</th>
                <th  style="text-align: center;">Precio Unidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($com01s as $com01)
                <tr class="{{ $com01->flagcre ? 'anulado' : '' }}">
                    <td>{{ $com01->cequiv }}</td>
                    <td style="font-size: 14px;">{{ $com01->tcor }}</td>
                    @if ($precioMayorista)
                        <td style="text-align: end;padding-right: 3rem;">{{ "S/. ".number_format($com01->qprecio2, 2) }}</td>
                    @else
                        <td style="text-align: end;padding-right: 3rem;">{{ "S/. ".number_format($com01->qprecio, 2) }}</td>
                    @endif
                    <td style="text-align: center;">{{ $com01->cc04 }} - {{ $marcas->where('ccod', $com01->cc04)->first()->tdes }}</td>
                    <td style="text-align: center;">{{ $com01->qfaccon }}</td>
                    @if ($precioMayorista)
                        <td style="text-align: end;padding-right: 3rem;">{{ "S/. ".number_format($com01->qprecio2/$com01->qfaccon, 2) }}</td>
                    @else
                        <td style="text-align: end;padding-right: 3rem;">{{ "S/. ".number_format($com01->qprecio/$com01->qfaccon, 2) }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Cod</th>
                <th>Producto {{ $precioMayorista ? 'Mayorista' : 'Bodega' }}</th>
                <th  style="text-align: center;">Precio Cj</th>
                <th  style="text-align: center;">Marca</th>
                <th  style="text-align: center;">Cant/Cj</th>
                <th  style="text-align: center;">Precio Unidad</th>
            </tr>
        </tfoot>
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#example').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                }
            });

        });
    </script>
</body>
</html>
