<x-app-layout>

    @push('title')
        <title>No Autorizado {{ config('app.name', 'Golomix') }}</title>
    @endpush

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                    401
                </div>

                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                    No Autorizado
                </div>
            </div>
            @if (request()->routeIs('listaclientes') || request()->routeIs('listaclientesXvendedor'))
                <br />
                <div class="flex items-center pt-8 sm:justify-center sm:pt-0">
                    <a href="{{ route('listaclientesXvendedor', $exception->getMessage()) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ir
                        a Clientes</a>
                </div>
            @endif

            @if (request()->routeIs('allpedidos') || request()->routeIs('pedidos'))
                <br />
                <div class="flex items-center pt-8 justify-center sm:pt-0">
                    <a href="{{ route('pedidos', $exception->getMessage()) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ir
                        a Pedidos</a>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
