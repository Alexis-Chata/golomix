<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Clientes {{ isset($cven) ? ' - ' . $com31s[0]->tven : '' }}</title>
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

        svg{
            width: 18px;
            fill: white;
        }

        span{
            margin: 0;
            padding: 0;
            color: white;
        }
        button{
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px;
            border-color: #ec4537;
            background-color: #ec4537;
            border-radius: 5px;
        }
        a{
            text-decoration: none
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
                        <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg><span> {{ $com10s->com30sr1->crut }} </span></button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr2)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr2->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg><span>{{ $com10s->com30sr2->crut }}</span></button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr3)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr3->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg><span>{{ $com10s->com30sr3->crut }}</span></button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr4)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr4->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg><span>{{ $com10s->com30sr4->crut }}</span></button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr5)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr5->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg><span>{{ $com10s->com30sr5->crut }}</span></button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr6)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr6->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg><span>{{ $com10s->com30sr6->crut }}</span></button>
                    </a>
                </div>
            </div>
        @endif
        @if ($com10s->com30sr7)
            <div class="row d-inline-block">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('listaclientesDownload-pdf', [$cven, $com10s->com30sr7->crut]) }}"
                        class="btn btn-success btn-sm">
                        <button type="button" class="pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H296 272 184 160c-35.3 0-64 28.7-64 64v80 48 16H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM160 352h24c30.9 0 56 25.1 56 56s-25.1 56-56 56h-8v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm24 80c13.3 0 24-10.7 24-24s-10.7-24-24-24h-8v48h8zm88-80h24c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H272c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm24 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16h-8v96h8zm72-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H400v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z"/></svg><span>{{ $com10s->com30sr7->crut }}</span></button>
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
                <th style="text-align: center;">RUC / DNI</th>
                <th style="text-align: center;">Ult. Compra</th>
                <th style="text-align: center;">Modulo</th>
                <th style="text-align: center;">Zona</th>
                <th style="text-align: center;">LP</th>
                <th style="text-align: center;">Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($com31s as $com31)
                <tr class="">
                    <td>{{ $com31->crut . ' - ' . $com31->tdes }}</td>
                    <td>{{ $com31->nsecprev }}</td>
                    <td>{{ $com31->ccli }}</td>
                    <td>{{ $com31->tcli }}</td>
                    <td>{{ $com31->tdir }}</td>
                    <td>{{ $com31->cruc ?? $com31->le }}</td>
                    <td>{{ $com31->femi ? $com31->femi : '-' }}</td>
                    <td>{{ $com31->cmod }}</td>
                    <td>{{ $com31->czon }}</td>
                    <td>{{ $com31->clistpr }}</td>
                    <td>{{ $com31->cven . ' - ' . $com31->tven }}</td>
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
                <th style="text-align: center;">RUC / DNI</th>
                <th style="text-align: center;">Ult. Compra</th>
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

        window.onload = function() {
            document.querySelector('#example_filter input').focus();
        };
    </script>

</body>

</html>
