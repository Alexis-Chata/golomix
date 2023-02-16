<!doctype html>
<html lang="es">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 8px;
        }
        html{
            margin: 20px
        }
    </style>
</head>

<body>
    <div class="">
        <header>
            <h6 class="">*** RUTA: {{ ucwords(Str::lower($com31s->first()->com30s->crut . ' - ' . $com31s->first()->com30s->tdes)) }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PREVENDEDOR: {{ ucwords(Str::lower($com31s->first()->com30s->com10s->cven . ' - ' . $com31s->first()->com30s->com10s->tven)) }}</h6>
        </header>

        <table id="example" class="display" style="width:100%;">
            <thead>
                <tr>
                    <th>Nro</th>
                    <th style="text-align: center;">Modulo</th>
                    <th>Nro Sec.</th>
                    <th style="text-align: center;">Codigo Cliente</th>
                    <th style="text-align: center;">Nombre Cliente</th>
                    <th style="text-align: center;">Direccion Cliente</th>
                    <th style="text-align: center;">RUC / DNI</th>
                    <th style="text-align: center;">Ult. Compra</th>
                    <th style="text-align: center;">Zona</th>
                    <th style="text-align: center;">LP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($com31s as $com31)
                    <tr class="">
                        <td>{{ $nro++ }}</td>
                        <td>{{ $com31->cmod }}</td>
                        <td>{{ $com31->nsecprev }}</td>
                        <td>{{ $com31->ccli }}</td>
                        <td>{{ $com31->com07s->tcli }}</td>
                        <td>{{ $com31->com07s->tdir }}</td>
                        <td>{{ $com31->com07s->cruc ?? $com31->com07s->le }}</td>
                        <td>{{ $com31->scrhcom20s->count() ? $com31->scrhcom20s->last()->femi : '-' }}</td>
                        <td>{{ $com31->com30s->czon }}</td>
                        <td>{{ $com31->com07s->clistpr }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nro</th>
                    <th>Nro Secuencia</th>
                    <th style="text-align: center;">Codigo Cliente</th>
                    <th style="text-align: center;">Nombre Cliente</th>
                    <th style="text-align: center;">Direccion Cliente</th>
                    <th style="text-align: center;">Modulo</th>
                    <th style="text-align: center;">RUC / DNI</th>
                    <th style="text-align: center;">Zona</th>
                    <th style="text-align: center;">LP</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
