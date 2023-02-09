<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Clientes {{ isset($cven) ? ' - '.$com31s->first()->com30s->com10s->tven : '' }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        body{
            padding: 1.5rem;
        }
        tr.baja.even, tr.baja.odd{
            background: #ff00005c;
        }
    </style>
</head>
<body>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Ruta</th>
                <th>Nro Secuencia</th>
                <th  style="text-align: center;">Codigo Cliente</th>
                <th  style="text-align: center;">Nombre Cliente</th>
                <th  style="text-align: center;">Direccion Cliente</th>
                <th  style="text-align: center;">Modulo</th>
                <th  style="text-align: center;">Zona</th>
                <th  style="text-align: center;">LP</th>
                <th  style="text-align: center;">Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($com31s as $com31)
                <tr class="">
                    <td>{{ $com31->com30s->crut .' - '. $com31->com30s->tdes }}</td>
                    <td>{{ $com31->nsecprev }}</td>
                    <td>{{ $com31->ccli }}</td>
                    <td>{{ $com31->com07s->tcli }}</td>
                    <td>{{ $com31->com07s->tdir }}</td>
                    <td>{{ $com31->cmod }}</td>
                    <td>{{ $com31->com30s->czon }}</td>
                    <td>{{ $com31->com07s->clistpr }}</td>
                    <td>{{ $com31->com30s->com10s->cven .' - '. $com31->com30s->com10s->tven }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Ruta</th>
                <th>Nro Secuencia</th>
                <th  style="text-align: center;">Codigo Cliente</th>
                <th  style="text-align: center;">Nombre Cliente</th>
                <th  style="text-align: center;">Direccion Cliente</th>
                <th  style="text-align: center;">Modulo</th>
                <th  style="text-align: center;">Zona</th>
                <th  style="text-align: center;">LP</th>
                <th  style="text-align: center;">Vendedor</th>
            </tr>
        </tfoot>
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#example').DataTable({
                iDisplayLength: 25,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                }
            });

        });
    </script>
</body>
</html>
