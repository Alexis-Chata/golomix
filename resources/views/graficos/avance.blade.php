<x-app-layout>

    @push('title')
        <title>Dashboard {{ config('app.name', 'Golomix') }}</title>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1">

                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white shadow-xl sm:rounded-lg">
                                <div class="p-2 pb-5 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                                    <canvas id="myChart" height="600"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Loading HTML -->
    <div id="divloading" class="loading show">
        <div class="spin"></div>
    </div>
    <!-- Loading HTML -->

    @push('estiloscss')
        <!-- Loading CSS -->
        <style>
            .loading {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                transition: 1s all;
                opacity: 0;
            }

            .loading.show {
                opacity: 1;
            }

            .loading .spin {
                border: 3px solid hsla(185, 100%, 62%, 0.2);
                border-top-color: #3cefff;
                border-radius: 50%;
                width: 3em;
                height: 3em;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                to {
                    transform: rotate(360deg);
                }
            }
        </style>
        <!-- Loading CSS -->
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> --}}
    @endpush

    @push('eventsubmit-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

        <script>
            const ctx = document.getElementById('myChart').getContext('2d');

            const data = {
                datasets: [{
                    label: 'Venta Agosto',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                plugins: [ChartDataLabels],
                options: {
                    layout: {
                        padding: {
                            right: 40 // Añade padding en el lado derecho para evitar que el texto se corte
                        }
                    },
                    responsive: true, // Hacer el gráfico responsivo
                    maintainAspectRatio: false, // Opcional: Esto permite que el gráfico ocupe todo el espacio disponible en el contenedor
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                font: {
                                    size: 10 // Reduce el tamaño de la fuente para el eje Y
                                }
                            }
                        },
                        x: {
                            ticks: {
                                font: {
                                    size: 10 // Reduce el tamaño de la fuente para el eje X
                                }
                            }
                        }
                    },
                    indexAxis: 'y', // Esto hace que el gráfico sea horizontal
                    plugins: {
                        datalabels: {
                            color: 'black', // Color del texto
                            align: 'end', // Alineación del texto al final de la barra
                            anchor: 'end', // Ancla el texto al final de la barra
                            //offset: -10,    // Mueve el texto 10px hacia adentro de la barra
                            font: {
                                weight: 'normal',
                                size: 10 // Tamaño de la fuente
                            },
                            formatter: (value) => value.toLocaleString(), // Formatea el texto para mostrar el valor
                        }
                    }
                }
            };

            var mychart = new Chart(ctx, config);

            //fetch('{{route('api.avancedata')}}', {
            fetch('https://golomix.realpedidos.com/api/avancedata', {
                    method: 'POST', // Método de solicitud
                    headers: {
                        'Content-Type': 'application/json' // Tipo de contenido de los datos
                    },
                    body: JSON.stringify({
                        cven: '013',
                    }) // Datos a enviar en el cuerpo de la solicitud
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json(); // Parsear la respuesta como JSON
                })
                .then(data => {
                    // Agrupar por marca y sumar ventas
                    const totalesPorMarca = data.reduce((acc, item) => {
                        if (!acc[item.ccodmarca]) {
                            acc[item.ccodmarca] = {
                                tdesmarca: item.tdesmarca,
                                total_ventas: 0
                            };
                        }
                        // Asegurarse de que total_ventas es un número antes de sumarlo
                        acc[item.ccodmarca].total_ventas += parseFloat(item.qimp) || 0;
                        return acc;
                    }, {});

                    // Convertir el objeto en un array si es necesario
                    const resultArray = Object.keys(totalesPorMarca).map(key => ({
                        ccodmarca: key,
                        tdesmarca: totalesPorMarca[key].tdesmarca,
                        total_ventas: parseFloat(totalesPorMarca[key].total_ventas.toFixed(2))
                    }));

                    // Ordenar el array por ccodmarca
                    resultArray.sort((a, b) => a.ccodmarca.localeCompare(b.ccodmarca));

                    console.log(resultArray); // Maneja los datos agrupados y sumados aquí
                    return resultArray;
                })
                .then(datos => mostrar(datos))
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });

            const mostrar = (articulos) => {
                console.log(mychart);
                articulos.forEach(element => {
                    mychart.data['labels'].push(element.tdesmarca)
                    mychart.data['datasets'][0].data.push(element.total_ventas)
                    mychart.update()
                });
            }
        </script>

        <script>
            document.body.addEventListener('submit', cargando);

            function cargando(event) {

                const clickedElement = event.target;
                clickedElement.parentNode.classList.add("relative");
                clickedElement.classList.add("opacity-50");

                buttons = document.querySelectorAll("body main button");
                inputs = document.querySelectorAll("body main input[type=file]");

                buttons.forEach((element) => element.classList.add("pointer-events-none"));
                inputs.forEach((element) => element.classList.add("pointer-events-none"));

                const div = document.createElement("div");
                div.innerHTML =
                    '<div id="cargando" role="status" class="hidden absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2"><svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" /><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" /></svg><span class="sr-only">Loading...</span></div>';
                clickedElement.parentNode.appendChild(div);

                clickedElement.parentNode.querySelector("div#cargando").classList.remove("hidden");

                forms = document.querySelectorAll("main form");
                forms.forEach((element) => element.classList.add("opacity-50"));

            }
        </script>

        <!-- Loading Javascript -->
        <script type="text/javascript">
            window.onload = function() {
                divloading = document.getElementById("divloading");
                divloading.classList.remove("show", "loading");
            };
        </script>
        <!-- Loading Javascript -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
    @endpush


</x-app-layout>
