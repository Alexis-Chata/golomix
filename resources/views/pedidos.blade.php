<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
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
            width: 320px;
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

        .p-30{
            padding-left: 30px;
        }
    </style>
</head>

<body>
    {{-- @dd($com36s->sortBy('cven')->groupBy(['cven', 'tven', 'crut'])) --}}
    {{-- @dd($pedidosAgrupados); --}}
    {{ 'Total de vendedores: '.$pedidosAgrupados->count() }}
    @foreach ($pedidosAgrupados as $cven => $tvens)
        <details open>
            <summary>{{ $cven . ' ' }}
                @foreach ($tvens as $tven => $cruts)
                    {{ $tven }}
            </summary>
            @foreach ($cruts as $crut => $pedidos)
                <details style="background: #d9d9be;">
                    <summary>{{ $crut.' - (#Clientes / #Pedidos) : ('.$pedidos->groupBy(['ccli'])->count().' / '.$pedidos->count().')' }}</summary>
                    <div>
                        @foreach ($pedidos as $key => $pedido)
                            <details>
                                <summary>
                                    {{ $pedido->ccli . ' ' }}<strong>{{ $pedido->tnomrep }}</strong>{{ ' - Total: S/. ' . $pedido->qimpvta }}
                                </summary>
                                <div>
                                    @foreach ($pedido->com37s as $item)
                                        <ul class="li p-30">
                                            <p>{{ $item->ccodart . ' | ' }}</p>
                                            <p class="w-320">{{ $item->tdes }}</p>{{ ' | ' }}<p
                                                class="w-50  text-end"><strong>{{ $item->qcanped }}</strong></p>
                                            {{ ' | ' }}<p class="w-50 text-end">{{ $item->qpreuni }}</p>
                                            {{ ' | ' }}<p class="w-70 text-end">
                                                <strong>{{ $item->qimp }}</strong>
                                            </p>
                                        </ul>
                                    @endforeach
                                    <ul class="li p-30">
                                        <p class="text-end" style="width: 76.31px"></p>
                                        <p class="w-320"></p>{{ ' | ' }}<p class="w-50  text-end"></p>
                                        {{ ' | ' }}<p class="w-50 text-end"><strong>TOTAL: </strong></p>
                                        {{ ' | ' }}<p class="w-70 text-end">
                                            <strong>{{ $pedido->qimpvta }}</strong>
                                        </p>
                                    </ul>
                            </details>
                        @endforeach
                    </div>
                </details>
            @endforeach
        </details>
    @endforeach

    {{-- <details>
                    <summary>{{ $com36->ccli.' '}}<strong>{{ $com36->tnomrep }}</strong>{{ ' - Total: S/. '.$com36->qimpvta }}</summary>
                    <div>
                        @foreach ($com36->com37s as $item)
                            <ul class="li">
                            <p>{{ $item->ccodart.' | ' }}</p><p class="w-320">{{ $item->tdes }}</p>{{ ' | ' }}<p class="w-50  text-end"><strong>{{ $item->qcanped }}</strong></p>{{ ' | ' }}<p class="w-50 text-end">{{ $item->qpreuni }}</p>{{ ' | ' }}<p class="w-70 text-end"><strong>{{ $item->qimp }}</strong></p>
                            </ul>
                        @endforeach
                        <ul class="li"><p class="text-end" style="width: 76.31px"></p><p class="w-320"></p>{{ ' | ' }}<p class="w-50  text-end"></p>{{ ' | ' }}<p class="w-50 text-end"><strong>TOTAL: </strong></p>{{ ' | ' }}<p class="w-70 text-end"><strong>{{ $com36->qimpvta }}</strong></p></ul>
                    </div>
                </details> --}}

    </details>
    @endforeach
</body>

</html>
