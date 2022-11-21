<?php

use App\Http\Controllers\Com01Controller;
use App\Http\Controllers\Com07Controller;
use App\Http\Controllers\Com10Controller;
use App\Http\Controllers\Com30Controller;
use App\Http\Controllers\Com31Controller;
use App\Http\Controllers\Com36Controller;
use App\Http\Controllers\Com37Controller;
use App\Http\Controllers\Ugr01Controller;
use App\Models\Com31;
use App\Models\Com36;
use Illuminate\Support\Carbon;
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
    return view('welcome');
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
    Route::resource('com07', Com07Controller::class)->only(['store']);
    Route::resource('com10', Com10Controller::class)->only(['store']);
    Route::resource('com30', Com30Controller::class)->only(['store']);
    Route::resource('com31', Com31Controller::class)->only(['store']);
    Route::resource('com36', Com36Controller::class)->only(['store']);
    Route::resource('com37', Com37Controller::class)->only(['store']);

});

Route::get('/listaclientes', function () {
    $com31s = Com31::with(['com07s', 'com30s'])->get();
    //$pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    return view('listaClientes', compact('com31s'));
})->name('listaclientes');

Route::get('/pedidos', function () {
    $fupgr = Com36::latest('fupgr')->first()->fupgr;
    $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->get();
    $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
    return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fupgr'));
})->name('allpedidos');

Route::get('/pedidos/{cven}', function ($cven) {
    $fupgr = Com36::latest('fupgr')->where('cven', $cven)->first()->fupgr;
    $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->where('cven', $cven)->get();
    $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
    return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fupgr'));
});

Route::controller(Com01Controller::class)->group(function () {
    Route::get('/productos', 'index')->name('allProductos');
    Route::get('/productos/mayorista', 'precioMayorista')->name('allProductosMayorista');
});
