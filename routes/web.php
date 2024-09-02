<?php

use App\Models\Com10;
use App\Traits\BitacoraTrait;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Com01Controller;
use App\Http\Controllers\Com05Controller;
use App\Http\Controllers\Com07Controller;
use App\Http\Controllers\Com10Controller;
use App\Http\Controllers\Com30Controller;
use App\Http\Controllers\Com31Controller;
use App\Http\Controllers\Com36Controller;
use App\Http\Controllers\Com37Controller;
use App\Http\Controllers\Ugr01Controller;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\TomadorController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScrHcom20Controller;
use App\Http\Controllers\ScrHcom21Controller;
use App\Http\Controllers\ListaclienteController;
use App\Http\Controllers\LiquidacionesController;
use App\Http\Controllers\DistribucionPedidosController;
use App\Http\Controllers\GraficosController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
    Route::resource('scrhcom21', ScrHcom21Controller::class)->only(['store']);

    Route::get('vendedor-rutas', [DistribucionPedidosController::class, 'listaDistribucionRutas'])->name('allVendedorRutas');

    Route::controller(PedidosController::class)->group(function () {
        Route::get('pedidos', 'pedidosall')->name('allpedidos')->middleware(['role_or_permission:Super-Admin']);
        Route::get('pedidos/{cven}', 'pedidos')->name('pedidos');
        Route::get('planilla-carga/{ccon?}', 'planillaCarga')->name('planillaCarga')->middleware(['role_or_permission:Super-Admin']);
        Route::get('distribucion-pedidos', 'pedidosTransporte')->name('allpedidosXtransporte')->middleware(['role_or_permission:Super-Admin']);
    });

    Route::controller(ListaclienteController::class)->group(function () {
        Route::get('listaclientes', 'listaclientesall')->name('listaclientes')->middleware(['role_or_permission:Super-Admin']);
        Route::get('listaclientes/{cven}', 'listaclientes')->name('listaclientesXvendedor');
    });

    Route::get('listaclientes-download-pdf/{cven}/{crut}', [Com10Controller::class, 'listaclientesDownloadPdf'])->name('listaclientesDownload-pdf');
    Route::get('listaclientes-download-excel/{cven?}/{crut?}', [Com10Controller::class, 'listaclientesDownloadExcel'])->name('listaclientesDownload-excel');

    Route::controller(Com01Controller::class)->group(function () {
        Route::get('productos', 'index')->name('allProductos')->middleware(['role_or_permission:Super-Admin']);
        Route::get('listaprecios-download-pdf/{tipoPrecio}', 'listaPreciosDownloadPdf')->name('ProductosDescargarPdf');
        Route::get('listaprecios-download-excel/{tipoPrecio}', 'listaPreciosDownloadExcel')->name('ProductosDescargarExcel');
        Route::get('productos/mayorista', 'precioMayorista')->name('allProductosMayorista');
        Route::get('productos/bodega', 'precioBodega')->name('allProductosBodega');
        Route::post('actualizaTipoProductoId', 'actualizaTipoProductoId')->name('com01.actualizaTipoProductoId');
    });

    Route::get('admin', [AdminController::class, 'admin'])->name('admin')->middleware(['role_or_permission:Super-Admin']);
    Route::get('bitacora', [BitacoraController::class, 'bitacora'])->name('bitacora')->middleware(['role_or_permission:Super-Admin']);
    Route::get('liquidaciones', [LiquidacionesController::class, 'liquidaciones'])->name('liquidaciones')->middleware(['role_or_permission:Super-Admin']);

    Route::get('tomador', [TomadorController::class, 'index'])->name('tomador.index');
    Route::get('tomador/{ccli}', [TomadorController::class, 'show'])->name('tomador.show');

    Route::view('powerbi', 'powerbi.powerbi');
    Route::get('avance', [GraficosController::class, 'avances'])->name('graficos.avances');

    Route::get('/test-query', function () {
        try {
            $results = DB::table('scr_hcom21s')
            ->select(
                'view_ugr01s_045.ccodmarca',
                'view_ugr01s_045.tdes as tdesmarca',
                'com10s.cven',
                'com10s.tven',
                'scr_hcom21s.*',
                'scr_hcom20s.*'
            )
            ->join('scr_hcom20s', 'scr_hcom21s.nfacfull', '=', 'scr_hcom20s.nfacfull')
            ->join('com10s', 'scr_hcom20s.cven', '=', 'com10s.cven')
            ->join('com01s', 'scr_hcom21s.ccodart', '=', 'com01s.ccodud1')
            ->join('view_ugr01s_045', 'com01s.cc04', '=', 'view_ugr01s_045.ccodmarca')
            ->where('cesdoc', '04')
            ->whereYear('femi', 2024)
            ->whereMonth('femi', 8)
            ->get();

            return response()->json($results);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    });
});
