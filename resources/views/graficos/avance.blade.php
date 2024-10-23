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
                                    <x-filtrochart :com10s="$com10s" />
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white shadow-xl sm:rounded-lg">
                            <div class="p-2 pb-5 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                                <div id="react-root"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white shadow-xl sm:rounded-lg">
                            <div class="p-2 pb-5 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                                <label>Cod.Producto: <input type="text" id="avance_input_buscar"
                                        class="form-control bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500" /></label>
                                <button id="avance_btn_buscar"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded form-control">Buscar</button>
                            </div>
                            <div class="p-2 pb-5 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">
                                <div id="react-cod-vendido"></div>
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

    @push('javascriptjs')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

        <script>
            @hasanyrole('Super-Admin')
                const btn = document.getElementById('consultar');
                var cven_slct = document.getElementById('slctcven');

                // btn.addEventListener("click", function() {
                //     console.log(cven_slct.value);
                //     datafecth(cven_slct.value)
                // })
            @endhasanyrole

            const dateto = document.getElementById('to');
            const datefrom = document.getElementById('from');
            const btnaplicar = document.getElementById('aplicar');
            // btnaplicar.addEventListener("click", function() {
            //     datafecthfiltrada()
            // })
            // Obtén la fecha actual
            const hoy = new Date();

            // Formatea la fecha en formato compatible con input date (YYYY-MM-DD)
            const fechaFormateada = hoy.toISOString().split('T')[0];

            // Establece el día al 1 para obtener el primer día del mes
            const primerDiaMes = new Date(hoy.getFullYear(), hoy.getMonth(), 1);

            // Formatea la fecha en formato compatible con input date (YYYY-MM-DD)
            const primerDiaMesfechaFormateada = primerDiaMes.toISOString().split('T')[0];

            // Asigna la fecha formateada al input de tipo date
            dateto.value = fechaFormateada;
            datefrom.value = primerDiaMesfechaFormateada;
        </script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');

            const data = {
                datasets: [{
                    label: 'Venta',
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
                            right: 48 // Añade padding en el lado derecho para evitar que el texto se corte
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
                            formatter: (value) => value.toLocaleString('en-US', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            }), // Formatea el texto para mostrar el valor
                        },
                        title: {
                            display: true,
                            text: 'Avance'
                        }
                    }
                }
            };

            var mychart = new Chart(ctx, config);

            // Función para obtener datos de la API
            const obtenerDatosAPI = async (cven) => {
                try {
                    const response = await fetch('{{ route('api.avancedata') }}', {
                        //const response = await fetch('http://golomix.test/api/avancedata', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(cven ? {
                            cven
                        } : {})
                    });

                    if (!response.ok) {
                        throw new Error('La respuesta de la red no fue correcta ' + response.statusText);
                    }

                    return await response.json();
                } catch (error) {
                    console.error('Hubo un problema al obtener los datos de la API:', error);
                    throw error;
                }
            };

            // Función para procesar los datos
            const procesarDatos = (data) => {
                let totalGeneral = 0;
                const fechas = [];
                const ccliSet = new Set(); // Clientes únicos
                const cvenSet = new Set(); // Vendedores únicos

                // Agregar un conjunto de clientes únicos por marca
                const totalesPorMarca = data.reduce((acc, {
                    ccodmarca,
                    tdesmarca,
                    qimp,
                    ccli, // Clientes
                    cven, // Vendedores
                    femi
                }) => {
                    ccliSet.add(ccli); // Agregamos cliente al conjunto general
                    cvenSet.add(cven); // Agregamos vendedor al conjunto general

                    // Inicializar el objeto de la marca si no existe
                    if (!acc[ccodmarca]) {
                        acc[ccodmarca] = {
                            tdesmarca,
                            total_ventas: 0,
                            clientesUnicos: new Set(), // Aquí guardamos los clientes únicos por marca
                            vendedoresUnicos: new Set() // Aquí guardamos los vendedores únicos por marca
                        };
                    }

                    // Agregar cliente y vendedor al conjunto de la marca
                    acc[ccodmarca].clientesUnicos.add(ccli);
                    acc[ccodmarca].vendedoresUnicos.add(cven);

                    const ventas = parseFloat(qimp) || 0;
                    acc[ccodmarca].total_ventas += ventas;
                    totalGeneral += ventas;

                    if (femi) {
                        fechas.push(new Date(`${femi}T00:00:00`));
                    }

                    return acc;
                }, {});

                // Convertir el resultado en un array y calcular la cantidad de clientes y vendedores únicos
                const resultArray = Object.keys(totalesPorMarca).map(ccodmarca => ({
                    ccodmarca,
                    tdesmarca: totalesPorMarca[ccodmarca].tdesmarca,
                    total_ventas: parseFloat(totalesPorMarca[ccodmarca].total_ventas.toFixed(2)),
                    clientes_unicos: totalesPorMarca[ccodmarca].clientesUnicos.size, // Contar clientes únicos
                    vendedores_unicos: totalesPorMarca[ccodmarca].vendedoresUnicos
                        .size // Contar vendedores únicos
                }));

                // Agregar el total general al final del array
                resultArray.push({
                    ccodmarca: '000',
                    tdesmarca: 'TOTAL VENTA',
                    total_ventas: parseFloat(totalGeneral.toFixed(2)),
                    clientes_unicos: ccliSet.size, // Total de clientes únicos en general
                    vendedores_unicos: cvenSet.size // Total de vendedores únicos en general
                });

                // Ordenar el resultado por código de marca
                resultArray.sort((a, b) => a.ccodmarca.localeCompare(b.ccodmarca));

                // Procesar fechas
                const ccliArrayUnicos = [...ccliSet].sort(); // Lista de clientes únicos
                const cvenArrayUnicos = [...cvenSet].sort(); // Lista de vendedores únicos
                const minFecha = new Date(Math.min(...fechas));
                const maxFecha = new Date(Math.max(...fechas));

                const rangoFechas = [
                    formatearFecha(minFecha),
                    formatearFecha(maxFecha)
                ];

                const array_datosExtras = {
                    ccliArrayUnicos, // Clientes únicos
                    cvenArrayUnicos, // Vendedores únicos
                    rangofecha: `${rangoFechas[0]} al ${rangoFechas[1]}`
                };

                // Devolver el resultado
                return {
                    articulos: resultArray,
                    info: array_datosExtras
                };
            };

            // Función principal que coordina la obtención y procesamiento de datos
            const datafecth = async (cven, setDatosProcesados) => {
                try {
                    console.log("datafecth", cven, "datafecthfin");
                    const datos = await obtenerDatosAPI(cven);

                    // Aquí podrías filtrar por fechas, por ejemplo:
                    const datosFiltrados = filtrarPorFechas(datos, datefrom.value, dateto.value);
                    console.log(datosFiltrados); // Mostrar los datos filtrados por el rango de fechas

                    const datosProcesados = procesarDatos(datosFiltrados);
                    mostrar(datosProcesados);

                    // Aquí actualizas el estado de React con los datos procesados
                    setDatosProcesados(datosProcesados.articulos);

                    return datosfecth = {
                        datos: datos,
                        datosFiltrados: datosFiltrados, // También puedes retornar los datos filtrados si es necesario
                        datosProcesados: datosProcesados,
                    };
                } catch (error) {
                    console.error('Hubo un problema con la operación de búsqueda:', error);
                }
            };

            var codVendedor = "{{ $cven }}";
            //datafecth("{{ $cven }}");

            const datafecthfiltrada = async (setDatosProcesados) => {
                try {
                    //const datos = await obtenerDatosAPI(cven);

                    // Aquí podrías filtrar por fechas, por ejemplo:
                    const datosFiltrados = filtrarPorFechas(datosfecth.datos, datefrom.value, dateto.value);
                    console.log(datosFiltrados); // Mostrar los datos filtrados por el rango de fechas

                    const datosProcesados = procesarDatos(datosFiltrados);
                    mostrar(datosProcesados);

                    // Aquí actualizas el estado de React con los datos procesados
                    setDatosProcesados(datosProcesados.articulos);

                    return datosfecthfiltrada = {
                        datos: datosfecth.datos,
                        datosFiltrados: datosFiltrados, // También puedes retornar los datos filtrados si es necesario
                        datosProcesados: datosProcesados,
                    };
                } catch (error) {
                    console.error('Hubo un problema con la operación de búsqueda:', error);
                }
            };

            const mostrar = (data) => {
                console.log(data);
                console.log(data.info.cvenArrayUnicos);
                var title = "Avance " + data.info.cvenArrayUnicos[0];
                if (data.info.cvenArrayUnicos.length > 1) {
                    title = "Avance";
                }
                if (mychart) {
                    mychart.data.labels = []; // Limpiar etiquetas
                    mychart.data.datasets[0].label = 'Venta'; // Limpiar datasets
                    mychart.data.datasets[0].data = []; // Limpiar datasets
                    mychart.update();
                    mychart.destroy();
                    mychart = new Chart(ctx, config);
                    mychart.config.options.plugins.title.text = title;
                }
                data.articulos.forEach(element => {
                    mychart.data['labels'].push(element.tdesmarca)
                    mychart.data['datasets'][0].data.push(element.total_ventas)
                    mychart.data['datasets'][0].label = "Venta " + data.info.rangofecha;
                    mychart.update()
                });
                return data;
            }

            // Función para convertir la fecha al formato "02 sep"
            function formatearFecha(fecha) {
                return fecha.toLocaleDateString('es-PE', {
                    day: '2-digit',
                    month: 'short'
                });
            }

            // Función para filtrar los datos por un rango de fechas
            const filtrarPorFechas = (datos, fechaInicio, fechaFin) => {
                const fechaInicioObj = new Date(fechaInicio + 'T00:00:00');
                const fechaFinObj = new Date(fechaFin + 'T00:00:00');
                return datos.filter(item => {
                    const fechaItem = new Date(item.femi +
                        'T00:00:00'); // Asegurar que la fecha esté en formato correcto
                    return fechaItem >= fechaInicioObj && fechaItem <= fechaFinObj;
                });
            };
        </script>
    @endpush
    @push('eventsubmit-js')
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

    @push('jsxjs')
        @vite(['resources/js/component.jsx'])
    @endpush

</x-app-layout>
