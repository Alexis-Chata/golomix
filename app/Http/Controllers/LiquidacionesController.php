<?php

namespace App\Http\Controllers;

use App\Models\ScrHcom20;
use Illuminate\Http\Request;

class LiquidacionesController extends Controller
{
    public function liquidaciones()
    {
        $liquidaciones = ScrHcom20::select('femi')
            ->selectRaw('COUNT(*) AS cantidad_pedidos')
            ->selectRaw('SUM(qimpvta) AS importe_ventas')
            ->where('cesdoc', '04')
            ->groupBy('femi')
            ->orderByDesc('femi')
            ->limit(27)
            ->get();
        return view('liquidaciones', compact('liquidaciones'));
    }
}
