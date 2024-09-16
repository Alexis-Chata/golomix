<?php

namespace App\Http\Controllers;

use App\Models\Com10;
use App\Traits\BitacoraTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    Use BitacoraTrait;

    public function avances()
    {
        $cven = auth()->user()->codVendedorAsignados->firstWhere('tipo', 'main')->cven;
        $com10s = Com10::where("ccargo",1)->get();
        if(auth()->user()->hasAnyRole('Super-Admin')){
            $cven = null;
        }
        // $descripcion = "Avance ".auth()->user()->codVendedorAsignados->firstWhere('tipo', 'main')->cven;
        // $this->bitacora($descripcion, __METHOD__);
        return view('graficos.avance', compact("cven", "com10s"));
    }
}
