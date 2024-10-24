<?php

use App\Http\Controllers\Com01Controller;
use App\Http\Controllers\Com05Controller;
use App\Http\Controllers\Com07Controller;
use App\Http\Controllers\Com10Controller;
use App\Http\Controllers\Com30Controller;
use App\Http\Controllers\Com31Controller;
use App\Http\Controllers\Com36Controller;
use App\Http\Controllers\Com37Controller;
use App\Http\Controllers\ListaclienteController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ScrHcom20Controller;
use App\Http\Controllers\Ugr01Controller;
use App\Models\Com10;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('allpedidos');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('ugr01', Ugr01Controller::class)->only(['store']);
    Route::resource('com01', Com01Controller::class)->only(['store']);
    Route::resource('com05', Com05Controller::class)->only(['store']);
    Route::resource('com07', Com07Controller::class)->only(['store']);
    Route::resource('com10', Com10Controller::class)->only(['store']);
    Route::resource('com30', Com30Controller::class)->only(['store']);
    Route::resource('com31', Com31Controller::class)->only(['store']);
    Route::resource('com36', Com36Controller::class)->only(['store']);
    Route::resource('com37', Com37Controller::class)->only(['store']);
    Route::resource('scrhcom20', ScrHcom20Controller::class)->only(['store']);

    Route::get('/vendedor-rutas', function () {
        $com10s = Com10::with(['com30sr1', 'com30sr2', 'com30sr3', 'com30sr4', 'com30sr5', 'com30sr6', 'com30sr7'])->get()->sortBy(['cven']);
        //dd($com10s->firstWhere('cven', '090'));
        //dd($com10s);
        return view('vendedorRutas', compact('com10s'));
    })->name('allVendedorRutas');

    Route::controller(PedidosController::class)->group(function () {
        Route::get('/pedidos', 'pedidosall')->name('allpedidos');
        Route::get('/pedidos/transporte', 'pedidosTransporte')->name('allpedidosXtransporte');
        Route::get('/pedidos/{cven}', 'pedidos')->name('pedidos');
    });

    Route::controller(ListaclienteController::class)->group(function () {
        Route::get('/listaclientes', 'listaclientesall')->name('listaclientes');
        Route::get('/listaclientes/{cven}', 'listaclientes')->name('listaclientesXvendedor');
    });

    Route::get('listaclientes-download-pdf/{cven}/{crut}', [Com10Controller::class, 'listaclientesDownloadPdf'])->name('listaclientesDownload-pdf');

    Route::controller(Com01Controller::class)->group(function () {
        Route::get('/productos', 'index')->name('allProductos');
        Route::get('listaclientes-download-pdf/{tipoPrecio}', 'listaPreciosDownloadPdf')->name('ProductosDescargarPdf');
        Route::get('/productos/mayorista', 'precioMayorista')->name('allProductosMayorista');
        Route::post('/actualizaTipoProductoId', 'actualizaTipoProductoId')->name('com01.actualizaTipoProductoId');
    });

});
