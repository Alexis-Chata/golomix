<x-app-layout>

    @push('title')
        <title>Vendedor Ruta</title>
    @endpush

    @push('estiloscss')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <style>
            tr.anulado.even,
            tr.anulado.odd {
                background: #ff00005c;
            }

            tr {
                font-size: 10px;
            }

            table.dataTable tbody th,
            table.dataTable tbody td {
                padding: 5px 10px
            }

            div#example_wrapper select {
                padding-right: 2.5rem;
            }

            div#example_wrapper {
                padding: 15px;
                padding-bottom: 30px;
            }
        </style>
    @endpush

    <div class="py-12">
        <div class="lg:px-8 max-w-7xl mx-auto sm:px-6">
            <div id='productos_pdf' class="p-2 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cod. Zona</th>
                            <th>Cod. Ven</th>
                            <th>Vendedor</th>
                            <th style="text-align: center;">Lunes</th>
                            <th style="text-align: center;">Martes</th>
                            <th style="text-align: center;">Miercoles</th>
                            <th style="text-align: center;">Jueves</th>
                            <th style="text-align: center;">Viernes</th>
                            <th style="text-align: center;">Sabado</th>
                            <th style="text-align: center;">Domingo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($com10s as $com10)
                            <tr class="">
                                <td>{{ $com10->czon }}</td>
                                <td>{{ $com10->cven }}</td>
                                <td>{{ $com10->tven }}</td>
                                <td>{{ $com10->com30sr1 ? $com10->r1 . ' - ' . $com10->com30sr1->tdes : '-' }}</td>
                                <td>{{ $com10->com30sr2 ? $com10->r2 . ' - ' . $com10->com30sr2->tdes : '-' }}</td>
                                <td>{{ $com10->com30sr3 ? $com10->r3 . ' - ' . $com10->com30sr3->tdes : '-' }}</td>
                                <td>{{ $com10->com30sr4 ? $com10->r4 . ' - ' . $com10->com30sr4->tdes : '-' }}</td>
                                <td>{{ $com10->com30sr5 ? $com10->r5 . ' - ' . $com10->com30sr5->tdes : '-' }}</td>
                                <td>{{ $com10->com30sr6 ? $com10->r6 . ' - ' . $com10->com30sr6->tdes : '-' }}</td>
                                <td>{{ $com10->com30sr7 ? $com10->r7 . ' - ' . $com10->com30sr7->tdes : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Cod. Zona</th>
                            <th>Cod. Ven</th>
                            <th>Vendedor</th>
                            <th style="text-align: center;">Lunes</th>
                            <th style="text-align: center;">Martes</th>
                            <th style="text-align: center;">Miercoles</th>
                            <th style="text-align: center;">Jueves</th>
                            <th style="text-align: center;">Viernes</th>
                            <th style="text-align: center;">Sabado</th>
                            <th style="text-align: center;">Domingo</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @push('javascriptjs')
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {

                $('#example').DataTable({
                    iDisplayLength: 50,
                    order: [
                        [1, 'asc']
                    ],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    }
                });

            });

            window.onload = function() {
                document.querySelector('#example_filter input').focus();
            };
        </script>
    @endpush

</x-app-layout>
