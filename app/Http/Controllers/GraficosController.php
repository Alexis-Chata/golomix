<?php

namespace App\Http\Controllers;

use App\Traits\BitacoraTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{
    Use BitacoraTrait;

    public function avances()
    {
        $descripcion = "Avance ".auth()->user()->codVendedorAsignados->firstWhere('tipo', 'main')->cven;
        $this->bitacora($descripcion, __METHOD__);
        return view('graficos.avance');
    }
}