@props(['com10s'])

<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    @hasanyrole('Super-Admin')
        <div class="flex flex-wrap justify-start col-md-3 p-2.5 gap-2 sm:gap-4">
            <label for="slctcven" class="flex items-center">Vendedor: </label>
            <select id="slctcven"
                class="w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                <option>--- Seleccionar ---</option>
                <option value="">TODOS</option>
                @forelse ($com10s as $com10)
                    <option value="{{ $com10->cven }}">{{ $com10->cven ." - ". $com10->tven }}</option>
                @empty

                @endforelse
            </select>
            <button id="consultar"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded form-control">Consultar</button>
        </div>
    @endhasanyrole
    <div class="flex justify-start col-md-3 gap-2 sm:gap-4 p-2.5 content-center items-center flex-wrap">
        <div class="col-md-3">
            <label for="from">De:</label>
            <input type="date" id="from" name="from"
                class="form-control bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">

        </div>
        <div class="col-md-3">
            <label for="to">Al: </label>
            <input type="date" id="to" name="to"
                class="form-control bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
        </div>
        <div class="col-md-3">
            <button id="aplicar"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded form-control">Aplicar</button>
        </div>
    </div>
</div>
