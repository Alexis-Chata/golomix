<?php

namespace App\Http\Controllers;

use App\Models\Com01;
use App\Models\Com05;
use App\Models\Com36;
use App\Models\Com37;
use App\Models\Ugr01;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    public function pedidosall()
    {
        $fupgr = Com36::latest('fupgr')->first()->fupgr;
        $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->get();
        $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
        $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
        $com37s = $this->sumarCantidades($com36s);

        return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fupgr', 'com37s'));
    }

    public function pedidos($cven)
    {
        $fupgr = Com36::latest('fupgr')->where('cven', $cven)->first()->fupgr;
        $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->where('cven', $cven)->get();
        $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
        $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
        $com37s = $this->sumarCantidades($com36s);

        return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fupgr', 'cven', 'com37s'));
    }

    public function sumarCantidades($com36s)
    {
        $marcas = Ugr01::where('cind', '045')->get();
        $com01s = Com01::all(['id', 'cequiv', 'tcor', 'qfaccon', 'cc04'])->keyBy('cequiv')->sort();

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

        return $com37s;
    }

    public function pedidosTransporte()
    {
        $fupgr = Com36::latest('fupgr')->first()->fupgr;
        $com36s = Com36::with(['com37s', 'com30s'])->where('fupgr', $fupgr)->get();
        //dd($com36s->first());
        $pedidosAgrupados = $com36s->sortBy(['ccon', 'crut', 'cven', 'ccli'])->groupBy(['ccon', 'crut', 'com30s.tdes', 'cven', 'tven'], $preserveKeys = true);
        //dd($pedidosAgrupados);
        $fupgr = Carbon::parse($fupgr)->format('d-m-Y');
        $com05 = Com05::all();
        return view('pedidosxtransporte', compact('com36s', 'pedidosAgrupados', 'fupgr', 'com05'));
    }
}
