<x-app-layout>

    @push('title')
    <title>Dashboard {{ config('app.name', 'Laravel') }}</title>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Pedidos">
                                    <form action="{{ route('com36.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_com36" class="m-4">Subir archivo Com36 </label>
                                        <input type="file" name="arch_com36" id="arch_com36" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Detalle Pedidos">
                                    <form action="{{ route('com37.store') }}" class="py-6" method="post" enctype="multipart/form-data" >
                                        @csrf
                                        <label for="arch_com37" class="m-4">Subir archivo Com37 </label>
                                        <input type="file" name="arch_com37" id="arch_com37" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Rutas">
                                    <form action="{{ route('com30.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_com30" class="m-4">Subir archivo Com30 </label>
                                        <input type="file" name="arch_com30" id="arch_com30" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Productos">
                                    <form action="{{ route('com01.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_com01" class="m-4">Subir archivo Com01 </label>
                                        <input type="file" name="arch_com01" id="arch_com01" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Marca de Productos">
                                    <form action="{{ route('ugr01.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_ugr01" class="m-4">Subir archivo Ugr01 </label>
                                        <input type="file" name="arch_ugr01" id="arch_ugr01" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Clientes">
                                    <form action="{{ route('com07.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_com07" class="m-4">Subir archivo Com07 </label>
                                        <input type="file" name="arch_com07" id="arch_com07" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Cliente-Ruta">
                                    <form action="{{ route('com31.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_com31" class="m-4">Subir archivo Com31 </label>
                                        <input type="file" name="arch_com31" id="arch_com31" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Vendedor-Rutas-Zona">
                                    <form action="{{ route('com10.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_com10" class="m-4">Subir archivo Com10 </label>
                                        <input type="file" name="arch_com10" id="arch_com10" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Consesioranio">
                                    <form action="{{ route('com05.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_com05" class="m-4">Subir archivo Com05 </label>
                                        <input type="file" name="arch_com05" id="arch_com05" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Actualiza Tipo Producto">
                                    <form action="{{ route('com01.actualizaTipoProductoId') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="com01_actualizaTipoProducto" class="m-4">Actualizar Tipo Producto </label>
                                        <input type="file" name="com01_actualizaTipoProducto" id="com01_actualizaTipoProducto" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Actualiza el Tipo Producto">
                                    <form action="{{ route('scrhcom20.store') }}" class="py-6" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="arch_scr_hcom20" class="m-4">Subir archivo ScrHcom20 </label>
                                        <input type="file" name="arch_scr_hcom20" id="arch_scr_hcom20" required class="m-4">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 m-4">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
