<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
    <style>
    details{
        background: #f2f2f2;
        padding: .5rem;
        border-radius: 6px;
        margin: .5rem;
    }

    summary{
        cursor: pointer;
        list-style: none;
    }

    summary::before{
        content: '+';
        padding-right: 1rem;
    }

    details [opren] summary::before{
        content: '-';
    }
    </style>
</head>
<body>
    @foreach ($com36s as $com36)
        <details>
            <summary>{{ $com36->ccli.' '}}<strong>{{ $com36->tnomrep }}</strong>{{ ' - Total: S/. '.$com36->qimpvta }}</summary>
            <div>
                <ul class="li">acordeion</ul>
                <ul class="li">acordeion</ul>
                <ul class="li">acordeion</ul>
            </div>
        </details>
    @endforeach
</body>
</html>
