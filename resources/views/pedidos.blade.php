<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos {{ isset($cven) ? ' - '.$com36s->first()->tven : '' }}</title>
    <script src="https://kit.fontawesome.com/1f2290df6f.js" crossorigin="anonymous"></script>
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
    </style>
</head>

<body>
    {{-- @dd($com36s->sortBy('cven')->groupBy(['cven', 'tven', 'crut'])) --}}
    {{-- @dd($pedidosAgrupados); --}}
    {{ 'Total de vendedores: ' . $pedidosAgrupados->count() . ' - Fecha: ' . $fupgr }}
    @foreach ($pedidosAgrupados as $cven => $tvens)
        <details open>
            <summary>{{ $cven . ' ' }}
                @foreach ($tvens as $tven => $cruts)
                    {{ $tven }}
            </summary>
            @foreach ($cruts as $crut => $pedidos)
                <details style="background: #d9d9be;">
                    <summary>
                        {{ $pedidos->first()->com30s->crut }}<strong>{{ ' ' . $pedidos->first()->com30s->tdes }}</strong>{{ ' - (#Clientes / #Pedidos) : (' . $pedidos->groupBy(['ccli'])->count() . ' / ' . $pedidos->count() . ')' }}<strong>{{ ' Monto: S/. ' . number_format($pedidos->sum('qimpvta'), 2, '.', ',')." " }}</strong>
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
                                    {{ $pedido->ccli . ' ' }}<strong>{{ $pedido->tnomrep }}</strong>{{ ' - Total: S/. ' . number_format($pedido->qimpvta, 2, '.', ',') . ' ( ' . $pedido->ctip . ' )'." "  }}
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
                                            <p class="w-320">{{ $item->tdes }}</p>{{ ' | ' }}<p
                                                class="w-50  text-end">
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

</body>

</html>
