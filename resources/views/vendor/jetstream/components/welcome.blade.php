<div class="row px-6 py-4">
    <form action="{{ route('com36.store') }}" class="py-12 pt-1" method="post" enctype="multipart/form-data">
        @csrf
        <label for="arch_com36">Subir archivo Com36 </label>
        <input type="file" name="arch_com36" id="arch_com36" required>
        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">Subir
            Archivo</button>
    </form>

    <form action="{{ route('storecom37') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="arch_com37">Subir archivo Com37 </label>
        <input type="file" name="arch_com37" id="arch_com37" required>
        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">Subir
            Archivo</button>
    </form>
</div>
