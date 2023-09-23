<?php

use App\Http\Controllers\Com01Controller;
use App\Http\Controllers\Com05Controller;
use App\Http\Controllers\Com07Controller;
use App\Http\Controllers\Com10Controller;
use App\Http\Controllers\Com30Controller;
use App\Http\Controllers\Com31Controller;
use App\Http\Controllers\Com36Controller;
use App\Http\Controllers\Com37Controller;
use App\Http\Controllers\ScrHcom20Controller;
use App\Http\Controllers\Ugr01Controller;
use App\Models\Com01;
use App\Models\Com05;
use App\Models\Com10;
use App\Models\Com36;
use App\Models\Com37;
use App\Models\Ugr01;
use Illuminate\Support\Carbon;
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
});

Route::get('/listaclientes', function () {
    //$com31s = Com31::with(['com07s', 'com30s'])->get();
    $com31s = DB::select("SELECT
    `com31s`.`ccli`
    , `com31s`.`crut`
    , `com31s`.`nsecprev`
    , `com31s`.`cmod`
    , `com30s`.`tdes`
    , `com30s`.`czon`
    , `com07s`.`tcli`
    , `com07s`.`tdir`
    , `com07s`.`cruc`
    , `com07s`.`le`
    , `com07s`.`clistpr`
    , `com10s`.`cven`
    , `com10s`.`tven`
    , `scr_hcom20s`.`femi`
    FROM
        `com31s`
        INNER JOIN `com07s`
            ON (`com31s`.`ccli` = `com07s`.`ccli`)
        INNER JOIN `com30s`
            ON (`com31s`.`crut` = `com30s`.`crut`)
        INNER JOIN `com10s`
            ON (`com30s`.`czon` = `com10s`.`czon`)
        LEFT JOIN (SELECT ccli, MAX(femi) AS femi FROM scr_hcom20s GROUP BY ccli) scr_hcom20s
            ON (`com31s`.`ccli` = `scr_hcom20s`.`ccli`)");
    //dd($com31s);
    //$pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    return view('listaClientes', compact('com31s'));
})->name('listaclientes');

Route::get('/listaclientes/{cven}', function ($cven) {
    $com10s = Com10::with('com30sr1', 'com30sr2', 'com30sr3', 'com30sr4', 'com30sr5', 'com30sr6', 'com30sr7')->firstWhere('cven', $cven);
    //dd($com10s->toArray());
    //$com31s = Com31::with(['com07s', 'com30s'])->whereRelation('com30s.com10s', 'cven', '=', $cven)->get();
    $com31s = DB::select("SELECT
    `com31s`.`ccli`
    , `com31s`.`crut`
    , `com31s`.`nsecprev`
    , `com31s`.`cmod`
    , `com30s`.`tdes`
    , `com30s`.`czon`
    , `com07s`.`tcli`
    , `com07s`.`tdir`
    , `com07s`.`cruc`
    , `com07s`.`le`
    , `com07s`.`clistpr`
    , `com10s`.`cven`
    , `com10s`.`tven`
    , `scr_hcom20s`.`femi`
    FROM
        `com31s`
        INNER JOIN `com07s`
            ON (`com31s`.`ccli` = `com07s`.`ccli`)
        INNER JOIN `com30s`
            ON (`com31s`.`crut` = `com30s`.`crut`)
        INNER JOIN `com10s`
            ON (`com30s`.`czon` = `com10s`.`czon`)
        LEFT JOIN (SELECT ccli, MAX(femi) AS femi FROM scr_hcom20s GROUP BY ccli) scr_hcom20s
            ON (`com31s`.`ccli` = `scr_hcom20s`.`ccli`)
    WHERE   cven = $cven");
    //dd($com31s);
    return view('listaClientes', compact('com31s', 'cven', 'com10s'));
})->name('listaclientesXvendedor');

Route::get('listaclientes-download-pdf/{cven}/{crut}', [Com10Controller::class, 'listaclientesDownloadPdf'])->name('listaclientesDownload-pdf');

Route::get('/pedidos', function () {
    $fupgr = Com36::latest('fupgr')->first()->fupgr;
    $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->get();
    $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
    $marcas = Ugr01::where('cind', '045')->get();
    $com01s = Com01::all(['id', 'cequiv', 'tcor', 'qfaccon', 'cc04'])->keyBy('cequiv')->sort();
    //return $com01s;
    $com37s = Com37::whereIn('nped', $com36s->pluck('nped'))->get(['id', 'nped', 'ccodart', 'tdes', 'qcanped', 'qpreuni', 'qimp', 'cprom'])->sortBy('ccodart');
    $com37s = $com37s->groupBy('ccodart');
    $com37s->each(function ($item, $key) use ($com01s, $marcas) {
        $unidadMedida = $com01s[substr($key, -3)]->qfaccon;

        $sumaunidads = $item->sum('qcanpedunidads');
        $sumaunidadsAbultos = intval($sumaunidads / $unidadMedida);
        $sumaunidadsAbultosRestoenunidad = $sumaunidads % $unidadMedida;

        $item->marcacod = ($com01s[substr($key, -3)]->cc04);
        $item->marca = $marcas->where('ccod', $com01s[substr($key, -3)]->cc04)->first()->tdes;
        $item->totalqcanpedbultos = $item->sum('qcanpedbultos') + $sumaunidadsAbultos;
        $item->totalqcanpedunidads = str_pad($sumaunidadsAbultosRestoenunidad, 2, 0, STR_PAD_LEFT);
    });
    //return dd($com37s->first());
    return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fupgr'));
})->name('allpedidos');

Route::get('/pedidos/transporte', function () {
    $fupgr = Com36::latest('fupgr')->first()->fupgr;
    $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->get();
    //dd($com36s->first());
    $pedidosAgrupados = $com36s->sortBy(['ccon', 'crut', 'cven', 'ccli'])->groupBy(['ccon', 'crut', 'com30s.tdes', 'cven', 'tven'], $preserveKeys = true);
    //dd($pedidosAgrupados);
    $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
    $com05 = Com05::all();
    return view('pedidosxtransporte', compact('com36s', 'pedidosAgrupados', 'fupgr', 'com05'));
})->name('allpedidosXtransporte');

Route::get('/pedidos/{cven}', function ($cven) {
    $fupgr = Com36::latest('fupgr')->where('cven', $cven)->first()->fupgr;
    $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->where('cven', $cven)->get();
    $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
    $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
    //return $com36s->pluck('nped');
    $marcas = Ugr01::where('cind', '045')->get();
    $com01s = Com01::all(['id', 'cequiv', 'tcor', 'qfaccon', 'cc04'])->keyBy('cequiv')->sort();
    //return $com01s;
    $com37s = Com37::whereIn('nped', $com36s->pluck('nped'))->get(['id', 'nped', 'ccodart', 'tdes', 'qcanped', 'qpreuni', 'qimp', 'cprom'])->sortBy('ccodart');
    $com37s = $com37s->groupBy('ccodart');
    $com37s->each(function ($item, $key) use ($com01s, $marcas) {
        $unidadMedida = $com01s[substr($key, -3)]->qfaccon;

        $sumaunidads = $item->sum('qcanpedunidads');
        $sumaunidadsAbultos = intval($sumaunidads / $unidadMedida);
        $sumaunidadsAbultosRestoenunidad = $sumaunidads % $unidadMedida;

        $item->marcacod = ($com01s[substr($key, -3)]->cc04);
        $item->marca = $marcas->where('ccod', $com01s[substr($key, -3)]->cc04)->first()->tdes;
        $item->totalqcanpedbultos = $item->sum('qcanpedbultos') + $sumaunidadsAbultos;
        $item->totalqcanpedunidads = str_pad($sumaunidadsAbultosRestoenunidad, 2, 0, STR_PAD_LEFT);
    });
    //return dd($com37s->first());
    return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fupgr', 'cven', 'com37s'));
});

Route::controller(Com01Controller::class)->group(function () {
    Route::get('/productos', 'index')->name('allProductos');
    Route::get('listaclientes-download-pdf/{tipoPrecio}', 'listaPreciosDownloadPdf')->name('ProductosDescargarPdf');
    Route::get('/productos/mayorista', 'precioMayorista')->name('allProductosMayorista');
    Route::post('/actualizaTipoProductoId', 'actualizaTipoProductoId')->name('com01.actualizaTipoProductoId');
});
