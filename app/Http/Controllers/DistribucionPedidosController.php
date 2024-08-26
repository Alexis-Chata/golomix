<?php

namespace App\Http\Controllers;

use App\Models\Com10;
use App\Traits\BitacoraTrait;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DistribucionPedidosController extends Controller
{
    use BitacoraTrait;

    public function listaDistribucionRutas()
    {
        $com10s = Com10::with(['com30sr1', 'com30sr2', 'com30sr3', 'com30sr4', 'com30sr5', 'com30sr6', 'com30sr7'])->get()->sortBy(['cven']);
        //dd($com10s->firstWhere('cven', '090'));
        if(!auth()->user()->hasRole(['Super-Admin'])){
            $cvens = auth()->user()->codVendedorAsignados->pluck('cven');
            $com10s = $com10s->WhereIn('cven', $cvens);
        }
        //dd($com10s);
        $descripcion = "Distribucion Rutas";
        $this->bitacora($descripcion, __METHOD__);
        return view('vendedorRutas', compact('com10s'));
    }

}
