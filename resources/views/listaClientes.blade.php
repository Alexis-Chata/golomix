<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Clientes {{ isset($cven) ? ' - ' . $com31s->first()->com30s->com10s->tven : '' }}</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        body {
            padding: 1.5rem;
        }

        tr.baja.even,
        tr.baja.odd {
            background: #ff00005c;
        }

        .d-inline-block {
            display: inline-block;
        }

        .pointer {
            cursor: pointer;
        }

        div#example_wrapper {
            margin-top: 12px;
        }
    </style>
</head>

<body>
    @if (isset($com10s))

        @if ($com10s->com30sr1)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr1->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer">{{ $com10s->com30sr1->crut }}</button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr2)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr2->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer">{{ $com10s->com30sr2->crut }}</button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr3)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr3->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer">{{ $com10s->com30sr3->crut }}</button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr4)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr4->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer">{{ $com10s->com30sr4->crut }}</button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr5)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr5->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer">{{ $com10s->com30sr5->crut }}</button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr6)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr6->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer">{{ $com10s->com30sr6->crut }}</button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr7)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr7->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer">{{ $com10s->com30sr7->crut }}</button>
                    </a>
                </div>
            </div>
        @endif

    @endif

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Ruta</th>
                <th>Nro Secuencia</th>
                <th style="text-align: center;">Codigo Cliente</th>
                <th style="text-align: center;">Nombre Cliente</th>
                <th style="text-align: center;">Direccion Cliente</th>
                {{-- <th style="text-align: center;">RUC / DNI</th>
                <th style="text-align: center;">Ult. Compra</th> --}}
                <th style="text-align: center;">Modulo</th>
                <th style="text-align: center;">Zona</th>
                <th style="text-align: center;">LP</th>
                <th style="text-align: center;">Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($com31s as $com31)
                <tr class="">
                    <td>{{ $com31->com30s->crut . ' - ' . $com31->com30s->tdes }}</td>
                    <td>{{ $com31->nsecprev }}</td>
                    <td>{{ $com31->ccli }}</td>
                    <td>{{ $com31->com07s->tcli }}</td>
                    <td>{{ $com31->com07s->tdir }}</td>
                    {{-- <td>{{ $com31->com07s->cruc ?? $com31->com07s->le }}</td>
                    <td>{{ $com31->scrhcom20s->count() ? $com31->scrhcom20s->last()->femi : '-' }}</td> --}}
                    <td>{{ $com31->cmod }}</td>
                    <td>{{ $com31->com30s->czon }}</td>
                    <td>{{ $com31->com07s->clistpr }}</td>
                    <td>{{ $com31->com30s->com10s->cven . ' - ' . $com31->com30s->com10s->tven }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Ruta</th>
                <th>Nro Secuencia</th>
                <th style="text-align: center;">Codigo Cliente</th>
                <th style="text-align: center;">Nombre Cliente</th>
                <th style="text-align: center;">Direccion Cliente</th>
                {{-- <th style="text-align: center;">RUC / DNI</th>
                <th style="text-align: center;">Ult. Compra</th> --}}
                <th style="text-align: center;">Modulo</th>
                <th style="text-align: center;">Zona</th>
                <th style="text-align: center;">LP</th>
                <th style="text-align: center;">Vendedor</th>
            </tr>
        </tfoot>
    </table>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {

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
