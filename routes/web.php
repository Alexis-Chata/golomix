<?php

use App\Http\Controllers\Com36Controller;
use App\Models\Com36;
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

    Route::resource('com36', Com36Controller::class)->only(['store']);
    Route::post('com37', [Com36Controller::class, 'storecom37'])->name('storecom37');

});

Route::get('/pedidos', function () {
    $com36s = Com36::all();
    $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    return view('pedidos', compact('com36s', 'pedidosAgrupados'));
});

Route::get('/pedidos/{cven}', function ($cven) {
    $com36s = Com36::all();
    if(isset($cven)){
        $com36s = $com36s->where('cven', $cven);
    }
    $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    return view('pedidos', compact('com36s', 'pedidosAgrupados'));
});
