<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="gap-6 grid grid-cols-1 md:grid-cols-2">
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row px-6">
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
                    <div class="row px-6">
                        <form action="{{ route('com37.store') }}" class="py-6" method="post" enctype="multipart/form-data">
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
                    <div class="row px-6">
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
                    <div class="row px-6">
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
    </div>
</x-app-layout>
