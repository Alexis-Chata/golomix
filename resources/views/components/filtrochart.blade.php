<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    @hasanyrole('Super-Admin')
    <div class="row">
        <div class="flex justify-start col-md-3 gap-4 p-2.5 ">
            <label for="slctcven" class="flex items-center">Vendedor: </label>
            <select id="slctcven"
                class="bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
                <option>Opción 1</option>
                <option>Opción 2</option>
                <option>Opción 3</option>
            </select>
            <button id="aplicar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded form-control">Consultar</button>
        </div>
    </div>
    @endhasanyrole
    <div class="row flex justify-start col-md-3 gap-4 p-2.5 content-center flex items-center">
        <div class="col-md-3">
            <label for="from">De:</label>
            <input type="date" id="from" name="from" class="form-control bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">

        </div>
        <div class="col-md-3">
            <label for="to">AL</label>
            <input type="date" id="to" name="to" class="form-control bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500">
        </div>
        <div class="col-md-3">
            <button id="aplicar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded form-control">Aplicar</button>
        </div>
    </div>
</div>
