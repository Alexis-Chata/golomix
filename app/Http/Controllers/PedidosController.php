<?php

namespace App\Http\Controllers;

use App\Models\Com01;
use App\Models\Com05;
use App\Models\Com36;
use App\Models\Com37;
use App\Models\ugr01;
use App\Traits\BitacoraTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class PedidosController extends Controller
{
    Use BitacoraTrait;

    public function pedidosall()
    {
        $com36s = collect();
        $pedidosAgrupados = collect();
        $fmov = '';
        $com37s = [];

        if (Com36::latest('fmov')->exists()) {
            $fmov = Com36::latest('fmov')->first()->fmov;
            $com36s = Com36::with(['com37s', 'com30s'])->where('fmov', $fmov)->get();
            $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
            $fmov = Carbon::parse($fmov)->format('d-m-Y');
            $com37s = $this->sumarCantidades($com36s);
        }

        return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fmov', 'com37s'));
    }

    public function pedidos($cven)
    {
        (Gate::denies('verpedidos', $cven) ? abort(401, auth()->user()->codVendedorAsignados->pluck('cven')->first() ?? '') : 'Allowed');

        $com36s = collect();
        $pedidosAgrupados = collect();
        $fmov = '';
        $com37s = [];
        $descripcion = "Pedidos ".$cven;

        if (Com36::latest('fmov')->where('cven', $cven)->exists()) {
            $fmov = Com36::latest('fmov')->where('cven', $cven)->first()->fmov;
            $com36s = Com36::with(['com37s', 'com30s'])->where('fmov', $fmov)->where('cven', $cven)->get();
            $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
            $fmov = Carbon::parse($fmov)->format('d-m-Y');
            $com37s = $this->sumarCantidades($com36s);
            $descripcion .= " - ".$com36s->first()->tven;
        }

        $this->bitacora($descripcion, __METHOD__);
        return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fmov', 'cven', 'com37s'));
    }

    public function planillaCarga($ccon = null)
    {
        $com36s = collect();
        $pedidosAgrupados = collect();
        $fmov = '';
        $com37s = [];

        if (Com36::latest('fmov')->exists() && is_null($ccon)) {
            $fmov = Com36::latest('fmov')->first()->fmov;
            $com36s = Com36::with(['com37s', 'com30s'])->where('fmov', $fmov)->get();
            $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
            $fmov = Carbon::parse($fmov)->format('d-m-Y');
            $com37s = $this->sumarCantidades($com36s);
        }

        if (Com36::latest('fmov')->where('ccon', $ccon)->exists()) {
            $fmov = Com36::latest('fmov')->where('ccon', $ccon)->first()->fmov;
            $com36s = Com36::with(['com37s', 'com30s'])->where('fmov', $fmov)->where('ccon', $ccon)->get();
            $pedidosAgrupados = $com36s->sortBy(['cven', 'ccli'])->groupBy(['cven', 'tven', 'crut'], $preserveKeys = true);
            $fmov = Carbon::parse($fmov)->format('d-m-Y');
            $com37s = $this->sumarCantidades($com36s);
        }

        return view('pedidos', compact('com36s', 'pedidosAgrupados', 'fmov', 'ccon', 'com37s'));
    }

    public function sumarCantidades($com36s)
    {
        $marcas = ugr01::where('cind', '045')->get();
        $com01s = Com01::all(['id', 'cequiv', 'tcor', 'qfaccon', 'cc04', 'qprecio'])->keyBy('cequiv')->sort();

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

            $item->qfaccon = ($com01s[substr($key, -3)]->qfaccon);
            $item->qprecio = ($com01s[substr($key, -3)]->qprecio);
            $importe = ($item->totalqcanpedbultos*$item->qprecio) + ($item->qprecio*$item->totalqcanpedunidads)/$item->qfaccon;
            $item->importe = ($importe);
        });

        return $com37s;
    }

    public function pedidosTransporte()
    {
        $com36s = collect();
        $pedidosAgrupados = collect();
        $fmov = '';
        $com05 = collect();

        if (Com36::latest('fmov')->exists()) {
            $fmov = Com36::latest('fmov')->first()->fmov;
            $com36s = Com36::with(['com37s', 'com30s'])->where('fmov', $fmov)->get();
            //dd($com36s->first());
            $pedidosAgrupados = $com36s->sortBy(['ccon', 'crut', 'cven', 'ccli'])->groupBy(['ccon', 'crut', 'com30s.tdes', 'cven', 'tven'], $preserveKeys = true);
            //dd($pedidosAgrupados);
            $fmov = Carbon::parse($fmov)->format('d-m-Y');
            $com05 = Com05::all();
        }

        return view('pedidosxtransporte', compact('com36s', 'pedidosAgrupados', 'fmov', 'com05'));
    }
}
